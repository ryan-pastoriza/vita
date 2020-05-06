@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/help.css')}}">
@stop

@section('content')

<app-help url="{{asset('')}}" preloaded="{{json_encode($data['help'])}}"></app-help>

@stop