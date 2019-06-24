@inject('request', 'Illuminate\Http\Request')
@extends('backend.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.skills.title')</h3>
    @can('skill_create')
    <p>
        <a href="{{ route('admin.skills.create') }}" class="btn btn-success">@lang('quickadmin.qa_add_new')</a>
        
    </p>
    @endcan

    @can('skill_delete')
    <p>
        <ul class="list-inline">
            <li><a href="{{ route('admin.skills.index') }}" style="{{ request('show_deleted') == 1 ? '' : 'font-weight: 700' }}">@lang('quickadmin.qa_all')</a></li> |
            <li><a href="{{ route('admin.skills.index') }}?show_deleted=1" style="{{ request('show_deleted') == 1 ? 'font-weight: 700' : '' }}">@lang('quickadmin.qa_trash')</a></li>
        </ul>
    </p>
    @endcan


    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_list')
        </div>

        <div class="panel-body table-responsive">
            <table class="table table-bordered table-striped {{ count($skills) > 0 ? 'datatable' : '' }} @can('skill_delete') @if ( request('show_deleted') != 1 ) dt-select @endif @endcan">
                <thead>
                    <tr>
                        @can('skill_delete')
                            @if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
                        @endcan

                        <th style="text-align:right;">@lang('quickadmin.skills.fields.title_ar')</th>
                        <th style="text-align:right;">@lang('quickadmin.skills.fields.title_en')</th>
                        <th style="text-align:right;">@lang('quickadmin.skills.fields.percent')</th>
                        <th style="text-align:right;">@lang('quickadmin.projects.fields.control_itmes')</th>

                        @if( request('show_deleted') == 1 )
                        <th>&nbsp;</th>
                        @else
                        <th>&nbsp;</th>
                        @endif
                    </tr>
                </thead>
                
                <tbody>
                    @if (count($skills) > 0)
                        @foreach ($skills as $skill)
                            <tr data-entry-id="{{ $skill->id }}">
                                @can('skill_delete')
									@if ( request('show_deleted') != 1 )<th style="text-align:center;"><input type="checkbox" id="select-all" /></th>@endif
								@endcan

                                <td field-key='title_ar'>{{ $skill->title_ar }}</td>                               
                                <td field-key='title_en'>{{ $skill->title_en }}</td>
                                <td field-key='percent'>{{$skill->percent }}</td>
                                @if( request('show_deleted') == 1 )
                                <td>
                                    @can('skill_delete')
                                     {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'POST',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.skills.restore', $skill->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_restore'), array('class' => 'btn btn-xs btn-success')) !!}
                                    {!! Form::close() !!}
								@endcan
                                    @can('skill_delete')
                                        {!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.skills.perma_del', $skill->id])) !!}
                                    {!! Form::submit(trans('quickadmin.qa_permadel'), array('class' => 'btn btn-xs btn-danger')) !!}
                                    {!! Form::close() !!}
                                @endcan
                                </td>
                                @else
                                <td>
                                    @can('skill_view')
                                    <a href="{{ route('admin.skills.show',[$skill->id]) }}" class="btn btn-xs btn-primary">@lang('quickadmin.qa_view')</a>
                                    @endcan
                                    @can('skill_edit')
                                    <a href="{{ route('admin.skills.edit',[$skill->id]) }}" class="btn btn-xs btn-info">@lang('quickadmin.qa_edit')</a>
                                    @endcan
                                    @can('skill_delete')
									{!! Form::open(array(
                                        'style' => 'display: inline-block;',
                                        'method' => 'DELETE',
                                        'onsubmit' => "return confirm('".trans("quickadmin.qa_are_you_sure")."');",
                                        'route' => ['admin.skills.destroy', $skill->id])) !!}
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
        @can('skill_delete')
            @if ( request('show_deleted') != 1 ) window.route_mass_crud_entries_destroy = '{{ route('admin.skills.mass_destroy') }}'; @endif
        @endcan
    </script>
@endsection