@extends('backend.layouts.master')

@section('per_page_title')
    {{ __('App Settings | Super Admin Dashboard') }}
@endsection


@push('per_page_css')
<link href="{{asset('assets/css/jquery.dataTables.min.css')}}" rel="stylesheet" />
@endpush

 

@section('content')
    
    @include('backend.components.page_module.appSettingsUpdate')

@endsection





