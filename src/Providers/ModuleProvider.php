<?php namespace Edutalk\Base\Caching\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Edutalk\Base\Caching\Services\CacheService;
use Edutalk\Base\Caching\Services\Contracts\CacheServiceContract;
use Edutalk\Base\Caching\Http\Middleware\BootstrapModuleMiddleware;

class ModuleProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Load views*/
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'edutalk-caching');
        /*Load translations*/
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'edutalk-caching');

        \Event::listen(['cache:cleared'], function () {
            \File::delete(config('edutalk-caching.repository.store_keys'));
            \File::delete(storage_path('framework/cache/cache-service.json'));
        });

        $this->publishes([
            __DIR__ . '/../../resources/views' => config('view.paths')[0] . '/vendor/edutalk-caching',
        ], 'views');
        $this->publishes([
            __DIR__ . '/../../resources/lang' => base_path('resources/lang/vendor/edutalk-caching'),
        ], 'lang');
        $this->publishes([
            __DIR__ . '/../../config' => base_path('config'),
        ], 'config');

        app()->booted(function () {
            $this->app->register(BootstrapModuleServiceProvider::class);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        load_module_helpers(__DIR__);

        $this->app->register(RouteServiceProvider::class);

        $this->mergeConfigFrom(__DIR__ . '/../../config/edutalk-caching.php', 'edutalk-caching');

        //Bind some services
        $this->app->bind(CacheServiceContract::class, CacheService::class);

        /**
         * @var Router $router
         */
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', BootstrapModuleMiddleware::class);
    }
}
