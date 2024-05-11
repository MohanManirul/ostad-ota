

@extends('frontend.dashboard.layouts.master')


@section('per_page_title')
    {{ __('Home | Student Dashboard') }}
@endsection


@push('per_page_css')
  
@endpush



@section('content')
    @include('frontend.components.dashboard.dashboard')
   
<!-- End Page-content -->



 {{-- <script>
        (async () => {
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })()
</script> --}}

@endsection



@push('per_page_js')



@endpush

