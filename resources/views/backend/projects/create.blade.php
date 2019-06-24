@extends('backend.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.projects.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.projects.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
		
			
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title_ar', trans('quickadmin.projects.fields.title_ar').'', ['class' => 'control-label']) !!}
                    {!! Form::text('title_ar', old('title_ar'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if($errors->has('title_ar'))
                        <p class="help-block">
                            {{ $errors->first('title_ar') }}
                        </p>
                    @endif
                </div>
            </div>
            
            
			
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title_en', trans('quickadmin.projects.fields.title_en').'', ['class' => 'control-label']) !!}
                    {!! Form::text('title_en', old('title_en'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if($errors->has('title_en'))
                        <p class="help-block">
                            {{ $errors->first('title_en') }}
                        </p>
                    @endif
                </div>
            </div>
			
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description_ar', trans('quickadmin.projects.fields.description_ar').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description_ar', old('description_ar'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    @if($errors->has('description_ar'))
                        <p class="help-block">
                            {{ $errors->first('description_ar') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('description_en', trans('quickadmin.projects.fields.description_en').'', ['class' => 'control-label']) !!}
                    {!! Form::textarea('description_en', old('description_en'), ['class' => 'form-control ', 'placeholder' => '']) !!}
                    @if($errors->has('description_en'))
                        <p class="help-block">
                            {{ $errors->first('description_en') }}
                        </p>
                    @endif
                </div>
            </div>
			
			<div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('link', trans('quickadmin.projects.fields.link').'', ['class' => 'control-label']) !!}
                    {!! Form::text('link', old('link'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if($errors->has('link'))
                        <p class="help-block">
                            {{ $errors->first('link') }}
                        </p>
                    @endif
                </div>
            </div>
			
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('main_image', trans('quickadmin.projects.fields.main_image').'', ['class' => 'control-label']) !!}
                    {!! Form::hidden('main_image', old('main_image')) !!}
                    {!! Form::file('main_image', ['class' => 'form-control', 'style' => 'margin-top: 4px;']) !!}
                    @if($errors->has('main_image'))
                        <p class="help-block">
                            {{ $errors->first('main_image') }}
                        </p>
                    @endif
                </div>
            </div>
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop