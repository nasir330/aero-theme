@extends('admin.layout.main')
@section('title', 'admin')


@section('script')
    <script src="{{ asset('backend/assets/bundles/libscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js --> 
    <script src="{{ asset('backend/assets/bundles/vendorscripts.bundle.js') }}"></script> <!-- Lib Scripts Plugin Js --> 

    <script src="{{ asset('backend/assets/bundles/mainscripts.bundle.js') }}"></script>
@endsection