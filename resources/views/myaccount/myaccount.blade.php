@extends('layouts.master')

@section('css')
    <link rel="stylesheet" href="{{asset('css/inbox.css')}}">
@stop

@section('content')

<app-myaccount url="{{asset('')}}" preloaded="{{json_encode($data)}}"></app-myaccount>  

@stop

@section('modals')



@stop