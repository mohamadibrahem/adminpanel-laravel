@extends('backend.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.projects.title')</h3>

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_view')
        </div>

        <div class="panel-body table-responsive">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>@lang('quickadmin.projects.fields.title_ar')</th>
                            <td field-key='title_ar'>{{ $project->title_ar }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.projects.fields.title_en')</th>
                            <td field-key='title_en'>{{ $project->title_en }}</td>
                        </tr>
                        
                        <tr>
                            <th>@lang('quickadmin.projects.fields.description_ar')</th>
                            <td field-key='description_ar'>{{ $project->description_ar }}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.projects.fields.description_en')</th>
                            <td field-key='description_en'>{!! $project->description_en !!}</td>
                        </tr>
                        <tr>
                            <th>@lang('quickadmin.projects.fields.main_image')</th>
                            <td field-key='main_image'>@if($project->main_image)<a href="{{ asset('images/projects/') }}/{{$project->main_image}}" target="_blank"><img style="width:100px;height:50px;" src="{{ asset('images/projects/') }}/{{$project->main_image}}"/></a>@endif</td>
                        </tr>
                    </table>
                </div>
            </div>

            <p>&nbsp;</p>

            <a href="{{ route('admin.projects.index') }}" class="btn btn-default">@lang('quickadmin.qa_back_to_list')</a>
        </div>
    </div>
@stop