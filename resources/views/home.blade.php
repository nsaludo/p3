@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-sm-6 col-md-offset-3">
                    <h2>Developer's Best Friend</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h3 class="project_title">Lorem Ipsum Generator</h3>
                <p>Looking for content to fill in your website for a demo? This Lorem Ipsum Generator comes in handy when you need to fill in blank spaces for your demo website!</p>
                <a href="http://p3.donengs.com/lorem" class="btn btn-default" role="button">Get me Lorem Ipsum!</a>
            </div>
            <div class="col-sm-4">
                <h3 class="project_title"> <h3>Random User Generator</h3>
                <p>Surely you will need to populate your demo website with users. Random User Generator to the rescue! Generate test users complete with profiles!</p>
                <a href="http://p3.donengs.com/users" class="btn btn-default" role="button">Get Me Users!</a>
            </div>
            <div class="col-sm-4">
                <h3 class="project_title">Password Generator</h3>
                <p>Can't come up with a good password? Try out this xkcd inspired password generator! You can mix-and-match simple words to generate a unique password!</p>
                <a href="http://p2.donengs.com" class="btn btn-default" role="button">Get me a Password!</a>
            </div>
        </div>
    </div>
@stop
