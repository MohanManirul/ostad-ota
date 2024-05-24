@extends('backend.layouts.master')

@section('per_page_title')
    {{ __('Basic Crud | Super Admin Dashboard') }}
@endsection


@push('per_page_css')

@endpush

 

@section('content')
    
    @include('backend.components.air-ticket-module.date-range-crud.List')
    @include('backend.components.air-ticket-module.date-range-crud.Add')
    @include('backend.components.air-ticket-module.date-range-crud.Update')

@endsection





