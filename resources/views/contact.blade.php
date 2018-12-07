@extends('layouts.main')

@section('content')
   {{Session::get('success')}}
    <a href="{{url()->route('sendemail')}}">Wyślij</a>


@endsection