@extends('layouts.main')

@section('content')
    @include('templates.form.form_template_table',array('header'=>'Zarejestruj się','headerText'=>'Utwóz konto by w pełni korzystać z serwisu','form'=>$form,'url'=>'/register'))

@endsection



