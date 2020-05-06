@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/profile.css')}}">
@stop

@section('content')

<vita-profile data="{{json_encode($data)}}" url="{{asset('')}}"></vita-profile>

@stop
