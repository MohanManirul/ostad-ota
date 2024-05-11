

@extends('frontend.layouts.app')

@section('content')


@include('frontend.components.PageMenuBar')


<main id="main">

    @include('frontend.components.auth.registration-form')
      
      
    </main><!-- End #main -->
    @include('frontend.components.Footer')


@endsection