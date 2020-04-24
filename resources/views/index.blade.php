@extends('layouts.app')

@section('title','Index')

@section('content')
    @include('home.row_status')
    @include('home.preloader')
    <div class="page">
    @include('home.header')
    @include('home.preview')
    @include('home.project')
    @include('home.award')
    @include('home.work')
    @include('home.swiper')
    @include('home.team')
    @include('home.footer')
    </div>
{{--    <div class="container marketing">--}}
{{--        @include('home.workers')--}}
{{--        @include('home.articles')--}}
{{--    </div><!-- /.container -->--}}

@endsection
