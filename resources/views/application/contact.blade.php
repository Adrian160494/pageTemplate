@extends('layouts.main')

@section('content')
    @include('templates.form.form_template_table',array('header'=>'Skontaktuj się z nami','headerText'=>'cos','form'=>$form,'url'=>'/kontakt'))

@endsection



