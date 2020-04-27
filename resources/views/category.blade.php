@extends('layouts.app')

@section('title','Category')

@section('content')
    @include('home.row_status')
    @include('home.preloader')
    <div class="page">
    @include('home.header')
    @include('lessons.category')
    @include('home.footer')
    </div>
@endsection
