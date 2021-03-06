@extends('edutalk-core::admin._master')

@section('css')

@endsection

@section('js')

@endsection

@section('js-init')

@endsection

@section('content')
    <div class="layout-1columns">
        <div class="column main">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        <i class="icon-layers font-dark"></i>
                        {{ trans('edutalk-caching::base.cache_commands') }}
                    </h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered vertical-middle table-hover">
                        <colgroup>
                            <col width="70%">
                            <col width="30%">
                        </colgroup>
                        <tbody>
                        <tr>
                            <td>
                                {{ trans('edutalk-caching::base.commands.clear_cms_cache.description') }}
                            </td>
                            <td>
                                <a href="{{ route('admin::edutalk-caching.clear-cms-cache.get') }}"
                                   data-toggle="confirmation"
                                   data-placement="left"
                                   title="{{ trans('edutalk-core::messages.are_you_sure') }}"
                                   class="btn btn-danger btn-block">
                                    {{ trans('edutalk-caching::base.commands.clear_cms_cache.title') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ trans('edutalk-caching::base.commands.refresh_compiled_views.description') }}
                            </td>
                            <td>
                                <a href="{{ route('admin::edutalk-caching.refresh-compiled-views.get') }}"
                                   data-toggle="confirmation"
                                   data-placement="left"
                                   title="{{ trans('edutalk-core::messages.are_you_sure') }}"
                                   class="btn btn-warning btn-block">
                                    {{ trans('edutalk-caching::base.commands.refresh_compiled_views.title') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ trans('edutalk-caching::base.commands.create_config_cache.description') }}
                            </td>
                            <td>
                                <a href="{{ route('admin::edutalk-caching.create-config-cache.get') }}"
                                   data-toggle="confirmation"
                                   data-placement="left"
                                   title="{{ trans('edutalk-core::messages.are_you_sure') }}"
                                   class="btn green btn-block">
                                    {{ trans('edutalk-caching::base.commands.create_config_cache.title') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ trans('edutalk-caching::base.commands.clear_config_cache.description') }}
                            </td>
                            <td>
                                <a href="{{ route('admin::edutalk-caching.clear-config-cache.get') }}"
                                   data-toggle="confirmation"
                                   data-placement="left"
                                   title="{{ trans('edutalk-core::messages.are_you_sure') }}"
                                   class="btn green-meadow btn-block">
                                    {{ trans('edutalk-caching::base.commands.clear_config_cache.title') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ trans('edutalk-caching::base.commands.optimize_class_loader.description') }}
                            </td>
                            <td>
                                <a href="{{ route('admin::edutalk-caching.optimize-class.get') }}"
                                   data-toggle="confirmation"
                                   data-placement="left"
                                   title="{{ trans('edutalk-core::messages.are_you_sure') }}"
                                   class="btn purple btn-block">
                                    {{ trans('edutalk-caching::base.commands.optimize_class_loader.title') }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                {{ trans('edutalk-caching::base.commands.clear_optimized_class_loader.description') }}
                            </td>
                            <td>
                                <a href="{{ route('admin::edutalk-caching.clear-compiled-class.get') }}"
                                   data-toggle="confirmation"
                                   data-placement="left"
                                   title="{{ trans('edutalk-core::messages.are_you_sure') }}"
                                   class="btn red-haze btn-block">
                                    {{ trans('edutalk-caching::base.commands.clear_optimized_class_loader.title') }}
                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @php do_action(BASE_ACTION_META_BOXES, 'main', Edutalk_CACHING . '.index', null) @endphp
        </div>
    </div>
@endsection
