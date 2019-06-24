@extends('backend.app')

@section('content')
    <h3 class="page-title">@lang('quickadmin.skills.title')</h3>
    {!! Form::open(['method' => 'POST', 'route' => ['admin.skills.store'], 'files' => true,]) !!}

    <div class="panel panel-default">
        <div class="panel-heading">
            @lang('quickadmin.qa_create')
        </div>
        
        <div class="panel-body">
            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('title_ar', trans('quickadmin.skills.fields.title_ar').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('title_en', trans('quickadmin.skills.fields.title_en').'', ['class' => 'control-label']) !!}
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
                    {!! Form::label('percent', trans('quickadmin.skills.fields.percent').'', ['class' => 'control-label']) !!}
                    {!! Form::text('percent', old('percent'), ['class' => 'form-control', 'placeholder' => '']) !!}
                    @if($errors->has('percent'))
                        <p class="help-block">
                            {{ $errors->first('percent') }}
                        </p>
                    @endif
                </div>
            </div>
			
			
            
            
        </div>
    </div>

    {!! Form::submit(trans('quickadmin.qa_save'), ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop