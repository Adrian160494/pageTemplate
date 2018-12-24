@extends('layouts.main')

@section('content')
    @include('templates.form.form_template_table',array('header'=>'Kontakt','headerText'=>'Masz pytania? Napisz, chętnie pomożemy!','form'=>$form,'url'=>'/kontakt'))

@endsection



