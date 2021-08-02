
@extends('layouts.master')

@section('title')
    My wall
@endsection

@section('content')

    @include('posts.alert')

    @include('posts.new-post')

    <hr>

    @include('posts.my-posts')
    @include('posts.modal')

    <br>
    <br>

@endsection
