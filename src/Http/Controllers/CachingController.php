<?php namespace Edutalk\Base\Caching\Http\Controllers;

use Edutalk\Base\Http\Controllers\BaseAdminController;

class CachingController extends BaseAdminController
{
    protected $module = 'edutalk-caching';

    public function __construct()
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {
            $this->breadcrumbs->addLink(trans('edutalk-caching::base.cache_management'), route('admin::edutalk-caching.index.get'));

            $this->getDashboardMenu($this->module);

            return $next($request);
        });
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $this->setPageTitle(trans('edutalk-caching::base.cache_management'));

        $this->assets->addJavascripts('jquery-datatables');

        return do_filter('edutalk-caching.index.get', $this)->viewAdmin('index');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getClearCmsCache()
    {
        \Artisan::call('cache:clear');

        flash_messages()
            ->addMessages(trans('edutalk-caching::base.messages.cache_cleaned'), 'success')
            ->showMessagesOnSession();

        return redirect()->to(route('admin::edutalk-caching.index.get'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getRefreshCompiledViews()
    {
        \Artisan::call('view:clear');

        flash_messages()
            ->addMessages(trans('edutalk-caching::base.messages.cache_view_refreshed'), 'success')
            ->showMessagesOnSession();

        return redirect()->to(route('admin::edutalk-caching.index.get'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getCreateConfigCache()
    {
        \Artisan::call('config:cache');

        flash_messages()
            ->addMessages(trans('edutalk-caching::base.messages.cache_config_created'), 'success')
            ->showMessagesOnSession();

        return redirect()->to(route('admin::edutalk-caching.index.get'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getClearConfigCache()
    {
        \Artisan::call('config:clear');

        flash_messages()
            ->addMessages(trans('edutalk-caching::base.messages.cache_config_cleaned'), 'success')
            ->showMessagesOnSession();

        return redirect()->to(route('admin::edutalk-caching.index.get'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getOptimizeClass()
    {
        \Artisan::call('optimize');

        flash_messages()
            ->addMessages(trans('edutalk-caching::base.messages.class_loader_optimized'), 'success')
            ->showMessagesOnSession();

        return redirect()->to(route('admin::edutalk-caching.index.get'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getClearCompiledClass()
    {
        \Artisan::call('clear-compiled');

        flash_messages()
            ->addMessages(trans('edutalk-caching::base.messages.class_loader_cleaned'), 'success')
            ->showMessagesOnSession();

        return redirect()->to(route('admin::edutalk-caching.index.get'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getCreateRouteCache()
    {
        \Artisan::call('route:cache');

        flash_messages()
            ->addMessages(trans('edutalk-caching::base.messages.cache_route_created'), 'success')
            ->showMessagesOnSession();

        return redirect()->to(route('admin::edutalk-caching.index.get'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getClearRouteCache()
    {
        \Artisan::call('route:clear');

        flash_messages()
            ->addMessages(trans('edutalk-caching::base.messages.cache_route_cleaned'), 'success')
            ->showMessagesOnSession();

        return redirect()->to(route('admin::edutalk-caching.index.get'));
    }
}
