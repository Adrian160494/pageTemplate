@extends('layouts.main')

@section('content')
    @include('messages.messages')
    <div class="container-mine">
        <div class="background"></div>
        @include('templates.navigation.navigation')
    <main>
        @yield('main-section')
    </main>
    @endsection
</div>