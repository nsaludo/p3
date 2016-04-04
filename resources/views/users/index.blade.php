@extends('layouts.master')


@section('title')
    Generate Users
@stop

@section('head')
@stop


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="title">Random User Generator</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            {!! Form::open(array('url' => 'users'))  !!}
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                {{ Form::label('numberOfUsers','Number of users (max 100)')}}<br>
                                {{ Form::number('numberOfUsers') }}<br>
                                <span class="error">
                                    {{ $errors->first('numberOfUsers') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-6 col-md-offset-3">
                    <fieldset>
                        <legend>Options</legend>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {!! Form::checkbox('homeAddress', 1, true) !!}
                                    {!! Form::label('homeAddress', 'Include home Address') !!}<br>
                                    <span class="error">
                                        {{ $errors->first('homeAddress') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::checkbox('emailAddress',1, true) }}
                                    {{ Form::label('emailAddress', 'Include Email Address') }}<br>
                                    <span class="error">
                                        {{ $errors->first('emailAddress') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::checkbox('phoneNumber', 1, false) }}
                                    {{ Form::label('phoneNumber', 'Include Phone') }}<br>
                                    <span class="error">
                                        {{ $errors->first('phoneNumber') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::checkbox('gender', 1, false) }}
                                    {{ Form::label('gender', 'Include Gender') }}<br>
                                    <span class="error">
                                        {{ $errors->first('gender') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::checkbox('photoUrl', 1, false) }}
                                    {{ Form::label('photoUrl', 'Include Photo') }}<br>
                                    <span class="error">
                                        {{ $errors->first('photoUrl') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::checkbox('birthday', 1, false) }}
                                    {{ Form::label('birthday', 'Include Birthdate') }}<br>
                                    <span class="error">
                                        {{ $errors->first('birthday') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
            <div class="row" >
                <div class="col-md-8 col-md-offset-2">
                    {{ Form::submit('Generate', array('class' => 'btn btn-success btn-lg btn-block')) }}
                    @if(count($errors) > 0)
                    <div class="error">
                        *Please correct errors above and try again.
                    </div>
                    @endif
                </div>

            </div>

            {!! Form::close() !!}

        </div>
    </div>





@stop

@section('results')

@stop

@section('body')
@stop
