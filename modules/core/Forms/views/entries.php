{{ $app->assets(['forms:assets/forms.js','forms:assets/js/entries.js']) }}

<style>
    td .uk-grid+.uk-grid { margin-top: 5px; }
</style>

<div data-ng-controller="entries" data-form='{{ json_encode($form) }}'>

    <nav class="uk-navbar uk-margin-bottom" data-ng-show="entries && entries.length">
        <span class="uk-navbar-brand"><a href="@route("/forms")">@lang('Forms')</a> / {{ $form['name'] }}</span>
        <ul class="uk-navbar-nav">
            <li><a href="@route('/forms/form/'.$form["_id"])" title="@lang('Edit form')" data-uk-tooltip="{pos:'bottom'}"><i class="uk-icon-pencil"></i></a></li>
        </ul>
    </nav>

    <div class="app-panel uk-margin uk-text-center" data-ng-show="entries && !entries.length">
        <h2>{{ $form['name'] }}</h2>
        <p class="uk-text-large">
            @lang('It seems you don\'t have any form entries.')
        </p>
    </div>

    <div class="uk-grid" data-uk-grid-margin data-ng-show="entries && entries.length">

        <div class="uk-width-medium-4-5">
            <div class="app-panel">
                <table class="uk-table uk-table-striped">
                    <thead>
                        <tr>
                            <th width="10">&nbsp;</th>
                            <th>
                                @lang('Form data')
                            </th>
                            <th width="20%">@lang('Created')</th>
                            <th width="5%">&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr data-ng-repeat="entry in entries">
                            <td><i class="uk-icon-envelope"></i></td>
                            <td>
                                <div class="uk-grid uk-grid-preserve uk-text-small" data-ng-repeat="(key, value) in entry.data">
                                    <div class="uk-width-medium-1-5">
                                        <strong>@@ key @@</strong>
                                    </div>
                                    <div class="uk-width-medium-4-5">
                                        @@ value @@
                                    </div>
                                </div>
                            </td>
                            <td>@@ entry.created | fmtdate:'d M, Y H:m' @@</td>
                            <td class="uk-text-right">
                                <a href="#" data-ng-click="remove($index, entry._id)" title="@lang('Delete entry')"><i class="uk-icon-trash-o"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="uk-width-medium-1-5 uk-hidden-small">
            
        </div>
</div>