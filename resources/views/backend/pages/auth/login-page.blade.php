@extends('backend.layouts.app')

@section('per_page_title')
    {{ __('Login | Ecommerce') }}
@endsection


@push('per_page_css')
  
@endpush



@section('content')


    @include('backend.components.auth.login-form')

    {{-- <script>
            (async () => {
                $(".preloader").delay(90).fadeOut(100).addClass('loaded');
            })()
    </script> --}}

@endsection



@push('per_page_js')



@endpush

