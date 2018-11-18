@extends('layouts.main')

        @section('content')
       @include('templates.menu.standardMenu',array('menuPositions'=> Helpers::menu('menu_glowne')))
        @endsection
