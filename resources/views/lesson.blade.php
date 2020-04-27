@extends('layouts.app')

@section('title','Lesson')

@section('content')
    @include('home.row_status')
    @include('home.preloader')
    <div class="page">
    @include('home.header')
    @include('lessons.lesson')
    @include('home.footer')
    </div>
@endsection
