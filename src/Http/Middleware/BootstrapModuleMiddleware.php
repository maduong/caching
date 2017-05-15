<?php namespace Edutalk\Base\Caching\Http\Middleware;

use \Closure;

class BootstrapModuleMiddleware
{
    public function __construct()
    {

    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  array|string $params
     * @return mixed
     */
    public function handle($request, Closure $next, ...$params)
    {
        dashboard_menu()->registerItem([
            'id' => 'edutalk-caching',
            'priority' => 2,
            'parent_id' => 'Edutalk-configuration',
            'heading' => null,
            'title' => trans('edutalk-caching::base.admin_menu.caching'),
            'font_icon' => 'fa fa-circle-o',
            'link' => route('admin::edutalk-caching.index.get'),
            'css_class' => null,
            'permissions' => ['view-cache'],
        ]);

        return $next($request);
    }
}
