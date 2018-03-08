@extends('layouts.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.clients.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.clients.fields.first-name')</th>
                            <td field-key='first_name'>{{ $client->first_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.last-name')</th>
                            <td field-key='last_name'>{{ $client->last_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.company-name')</th>
                            <td field-key='company_name'>{{ $client->company_name }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.email')</th>
                            <td field-key='email'>{{ $client->email }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.phone')</th>
                            <td field-key='phone'>{{ $client->phone }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.website')</th>
                            <td field-key='website'>{{ $client->website }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.skype')</th>
                            <td field-key='skype'>{{ $client->skype }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.country')</th>
                            <td field-key='country'>{{ $client->country }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.clients.fields.client-status')</th>
                            <td field-key='client_status'>{{ $client->client_status->title or '' }}</td>
                        </tr>
                    </table>
                </div>
            </div><!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
    
<li role="presentation" class="active"><a href="#clientprojects" aria-controls="clientprojects" role="tab" data-toggle="tab">Proyectos</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    
<div role="tabpanel" class="tab-pane active" id="clientprojects">
<table class="table table-bordered table-striped {{ count($client_projects) > 0 ? 'datatable' : '' }}">
    <thead>
        <tr>
            <th>@lang('quickadmin.client-projects.fields.title')</th>
                        <th>@lang('quickadmin.client-projects.fields.client')</th>
                        <th>@lang('quickadmin.client-projects.fields.description')</th>
                        <th>@lang('quickadmin.client-projects.fields.date')</th>
                        <th>@lang('quickadmin.client-projects.fields.budget')</th>
                        <th>@lang('quickadmin.client-projects.fields.project-status')</th>
                                                <th>&nbsp;</th>

        </tr>
    </thead>

    <tbody>
        @if (count($client_projects) > 0)
            @foreach ($client_projects as $client_project)
                <tr data-entry-id="{{ $client_project->id }}">
                    <td field-key='title'>{{ $client_project->title }}</td>
                                <td field-key='client'>{{ $client_project->client->first_name or '' }}</td>
                                <td field-key='description'>{!! $client_project->description !!}</td>
                                <td field-key='date'>{{ $client_project->date }}</td>
                                <td field-key='budget'>{{ $client_project->budget }}</td>
                                <td field-key='project_status'>{{ $client_project->project_status->title or '' }}</td>
                                                                <td>
                                    @can('view')
                                    <a href="{{ route('client_projects.show',[$client_project->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('edit')
                                    <a href="{{ route('client_projects.edit',[$client_project->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('delete')
{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['client_projects.destroy', $client_project->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="11">@lang('quickadmin.qa_no_entries_in_table')</td>
            </tr>
        @endif
    </tbody>
</table>
</div>
</div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.clients.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop
