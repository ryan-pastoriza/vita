@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/help.css')}}">
@stop

@section('content')

<app-help url="{{asset('')}}" preloaded="{{json_encode($data['help'])}}" width="col-md-9"></app-help>

@stop