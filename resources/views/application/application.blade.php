@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/applications.css')}}">
@stop

@section('content')

<app-application url="{{asset('')}}" preloaded="{{json_encode($data)}}"></app-application>

@stop

@section('modals')



@stop