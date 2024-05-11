@extends('backend.layouts.master')

@section('per_page_title')
    {{ __('User List | Super Admin Dashboard') }}
@endsection


@push('per_page_css')
<link href="{{asset('assets/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
@endpush

 

@section('content')

    @include('components.dashboard.profileForm')


    {{-- <script>
        (async () => {
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })()
    </script> --}}

@endsection



@push('per_page_js')

    <script src="{{asset('assets/js/toastify-js.js')}}"></script>
    <script src="{{asset('assets/js/config.js')}}"></script>

@endpush




