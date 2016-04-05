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
                <h5 class="title">Generate up to 100 test users for your application with profile photos that you can download.</h5>
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
                                {{ Form::number('numberOfUsers',1) }}<br>
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
                                    {!! Form::label('homeAddress', 'Include home Address') !!}
                                    {!! Form::checkbox('homeAddress', 1, true) !!}<br>
                                    <span class="error">
                                        {{ $errors->first('homeAddress') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('emailAddress', 'Include Email Address') }}
                                    {{ Form::checkbox('emailAddress',1, true) }}<br>
                                    <span class="error">
                                        {{ $errors->first('emailAddress') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('phoneNumber', 'Include Phone') }}
                                    {{ Form::checkbox('phoneNumber', 1, true ) }}<br>
                                    <span class="error">
                                        {{ $errors->first('phoneNumber') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('gender', 'Include Gender') }}
                                    {{ Form::checkbox('gender', 1, true) }}<br>
                                    <span class="error">
                                        {{ $errors->first('gender') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('photoUrl', 'Include Photo') }}
                                    {{ Form::checkbox('photoUrl', 1, true) }}<br>
                                    <span class="error">
                                        {{ $errors->first('photoUrl') }}
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    {{ Form::label('birthday', 'Include Birthdate') }}
                                    {{ Form::checkbox('birthday', 1, true) }}<br>
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
                    {{ Form::submit('Generate', array('class' => 'btn btn-success btn-md btn-block')) }}
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

    <div class="container results">
        @if (isset($fakeUsers))
            <div class="row" >
                <div class="col-md-2 col-md-offset-5">
                    {!! Form::open(array('url' => 'users/download'))  !!}
                        {{ Form::hidden('jsonFile',$jsonFile)}}
                    {{ Form::submit('Download Json File', array('class' => 'btn btn-default btn-xs btn-block')) }}
                </div>


                <br>
            </div>

            @for ($i = 0 ; $i < count($fakeUsers) ; $i++)
                <div class="row">
                    <div class="col-md-3">
                    </div>
                    <div class="col-md-5">
                        {!!$fakeUsers[$i]['FirstName']!!} {!!$fakeUsers[$i]['LastName']!!}<br>
                        @if (isset($fakeUsers[$i]['Gender']))
                            {!!$fakeUsers[$i]['Gender']!!}<br>
                        @endif
                        @if (isset($fakeUsers[$i]['Address']))
                            {!!$fakeUsers[$i]['Address']!!}<br>
                        @endif
                        @if (isset($fakeUsers[$i]['EmailAddress']))
                            {!!$fakeUsers[$i]['EmailAddress']!!}<br>
                        @endif
                        @if (isset($fakeUsers[$i]['PhoneNumber']))
                            {!!$fakeUsers[$i]['PhoneNumber']!!}<br>
                        @endif
                        @if (isset($fakeUsers[$i]['Birthday']))
                            {!!$fakeUsers[$i]['Birthday']!!}<br>
                        @endif
                    </div>
                    <div class="col-md-1">
                        @if (isset($fakeUsers[$i]['PhotoUrl']))
                            <img src={!!$fakeUsers[$i]['PhotoUrl']!!}>
                        @endif
                    </div>
                    <div class="col-md-3">
                    </div>
                </div>
                <br>
            @endfor
        @endif
    </div>
@stop
