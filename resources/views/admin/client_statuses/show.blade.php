@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.client-statuses.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.client-statuses.fields.title')</th>
                            <td field-key='title'>{{ $client_status->title }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#clients" aria-controls="clients" role="tab" data-toggle="tab">Clientes</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="clients">
<table class="table table-bordered table-striped {{ count($clients) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.clients.fields.first-name')</th>
                        <th>@lang('quickadmin.clients.fields.last-name')</th>
                        <th>@lang('quickadmin.clients.fields.company-name')</th>
                        <th>@lang('quickadmin.clients.fields.email')</th>
                        <th>@lang('quickadmin.clients.fields.phone')</th>
                        <th>@lang('quickadmin.clients.fields.website')</th>
                        <th>@lang('quickadmin.clients.fields.skype')</th>
                        <th>@lang('quickadmin.clients.fields.country')</th>
                        <th>@lang('quickadmin.clients.fields.client-status')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($clients) > 0)
            @foreach ($clients as $client)
                <tr data-entry-id="{{ $client->id }}">
                    <td field-key='first_name'>{{ $client->first_name }}</td>
                                <td field-key='last_name'>{{ $client->last_name }}</td>
                                <td field-key='company_name'>{{ $client->company_name }}</td>
                                <td field-key='email'>{{ $client->email }}</td>
                                <td field-key='phone'>{{ $client->phone }}</td>
                                <td field-key='website'>{{ $client->website }}</td>
                                <td field-key='skype'>{{ $client->skype }}</td>
                                <td field-key='country'>{{ $client->country }}</td>
                                <td field-key='client_status'>{{ $client->client_status->title or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('clients.show',[$client->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('clients.edit',[$client->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['clients.destroy', $client->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="14">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.client_statuses.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
