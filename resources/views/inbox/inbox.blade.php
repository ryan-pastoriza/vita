@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/inbox.css')}}">
@stop

@section('content')

<app-inbox url="{{asset('')}}" data="{{json_encode($data)}}"></app-inbox>
        
@stop