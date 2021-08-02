
@extends('layouts.master')

@section('title')
    Welcome to My Social Network!
@endsection

@section('content')

    @include('welcome.alert')

    <div class="columns">

        <div class="column">
            @include('welcome.signup')
        </div>

        <div class="column">
            @include('welcome.signin')
        </div>

    </div>

@endsection
