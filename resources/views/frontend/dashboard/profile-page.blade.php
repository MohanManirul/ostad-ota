

@extends('frontend.dashboard.layouts.master')


@section('per_page_title')
    {{ __('Home | Student Profile') }}
@endsection


@push('per_page_css')
  
@endpush



@section('content')
    @include('frontend.components.dashboard.profile')
   
<!-- End Page-content -->



 {{-- <script>
        (async () => {
            $(".preloader").delay(90).fadeOut(100).addClass('loaded');
        })()
</script> --}}

@endsection



@push('per_page_js')



@endpush

