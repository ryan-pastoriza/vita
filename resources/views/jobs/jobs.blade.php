@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/jobs.css')}}">
@stop

@section('content')

<vita-jobs url="{{asset('')}}" data="{{json_encode($data)}}"></vita-jobs>
        

@stop