@extends('layouts.frontend')

@section('frontend')
<div class="container-xxl bg-white p-0">
    @include('layouts.components-frontend.header')
    @yield('main-frontend')
    @include('layouts.components-frontend.footer')
</div>


@endsection