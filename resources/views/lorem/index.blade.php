@extends('layouts.master')

@section('title')
    Generate Lorem Ipsum
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="title">Lorem Ipsum Generator</h1>
                <h5 class="title">Generate dummy text content for your application.</h5>
                <hr>
            </div>
        </div>
        <div class="row">
            {!! Form::open(array('url' => 'lorem'))  !!}
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                {{ Form::label('numberOfParagraphs', 'Number of Paragraphs (max 10)') }}
                                {{ Form::number('numberOfParagraphs', 1) }}<br>
                                <span class="error">
                                    {{ $errors->first('numberOfParagraphs') }}
                                </span>
                            </div>
                        </div>
                        <div class="col-md-1">
                        </div>
                    </div>
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
        @if (isset($loremData))
            <div class="row" >
                <div class="col-md-2 col-md-offset-5">
                    {{ Form::open(array('url' => 'lorem/download'))  }}
                        {{ Form::hidden('jsonFile',$jsonFile)}}
                    {{ Form::submit('Download Json File', array('class' => 'btn btn-default btn-xs btn-block')) }}
                </div>
                <br><br>
            </div>

            @for ($i = 0 ; $i < count($loremData) ; $i++)
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        {{ $loremData[$i] }}<br>
                    </div>
                </div>
                <br>
            @endfor
        @endif
    </div>
@stop
