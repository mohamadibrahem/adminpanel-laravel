@inject('request', 'Illuminate\Http\Request')
@extends('backend.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.projects.title')</h3>
    @can('skill_create')
    <p>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('skill_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.projects.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.projects.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($projects) > 0 ? 'datatable' : '' }} @can('project_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('project_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th style="text-align:right;">@lang('quickadmin.projects.fields.title_ar')</th>
                        <th style="text-align:right;">@lang('quickadmin.projects.fields.title_en')</th>
                        <th style="text-align:right;">@lang('quickadmin.projects.fields.link')</th>
                        <th style="text-align:right;">@lang('quickadmin.projects.fields.main_image')</th>
                        <th style="text-align:right;">@lang('quickadmin.projects.fields.control_itmes')</th>
                        
                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($projects) > 0)
                        @foreach ($projects as $project)
                            <tr data-entry-id="{{ $project->id }}">
                                @can('skill_delete')
									@if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
								@endcan

                                <td field-key='title_ar'>{{ $project->title_ar }}</td>                               
                                <td field-key='title_en'>{{ $project->title_en }}</td>
                                <td field-key='percent'>{{$project->link }}</td>
								<td field-key='main_image'>@if($project->main_image)<a href="{{ asset('images/projects/') }}/{{$project->main_image}}" target="_blank"><img style="width:100px;height:50px;" src="{{ asset('images/projects/') }}/{{$project->main_image}}"/></a>@endif</td>
								
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('project_delete')
                                     {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.projects.restore', $project->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
								@endcan
                                    @can('project_delete')
                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.projects.perma_del', $project->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('project_view')
                                    <a href="{{ route('admin.projects.show',[$project->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('project_edit')
                                    <a href="{{ route('admin.projects.edit',[$project->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('project_delete')
									{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.projects.destroy', $project->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_delete'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                    @endcan
                                </td>
                                @endif
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
@stop

@section('javascript') 
    <script>
        @can('project_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.projects.mass_destroy') }}'; @endif
        @endcan
    </script>
@endsection