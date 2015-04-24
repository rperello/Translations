<div ng-app="typicms" ng-cloak ng-controller="ListController">

    <h1>
        <a href="{{ route('admin.' . $module . '.create') }}" class="btn-add"><i class="fa fa-plus-circle"></i><span class="sr-only" translate>New</span></a>
        <span translate translate-n="models.length" translate-plural="@{{ models.length }} translations">@{{ models.length }} translation</span>
    </h1>

    <div class="btn-toolbar" role="toolbar" ng-include="'/views/partials/btnLocales.html'"></div>

    <div class="table-responsive">

        <table st-table="displayedModels" st-safe-src="models" st-order st-filter class="table table-condensed table-main">
            <thead>
                <tr>
                    <th class="delete"></th>
                    <th class="edit"></th>
                    <th st-sort="key" st-sort-default="true" class="key st-sort" translate>Key</th>
                    <th st-sort="translation" class="translation st-sort" translate>Translation</th>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td>
                        <input st-search="key" class="form-control input-sm" placeholder="@{{ 'Search' | translate }}…" type="text">
                    </td>
                    <td>
                        <input st-search="translation" class="form-control input-sm" placeholder="@{{ 'Search' | translate }}…" type="text">
                    </td>
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="model in displayedModels">
                    <td typi-btn-delete action="delete(model, model.key)"></td>
                    <td>
                        @include('core::admin._button-edit')
                    </td>
                    <td>@{{ model.key }}</td>
                    <td contentEditable highlighter="model.translation" ng-model="model.translation" ng-blur="update(model)">
                        @{{ model.translation }}
                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" typi-pagination></td>
                </tr>
            </tfoot>
        </table>

    </div>

</div>