@extends('layouts.master')

@section('content')
    <left-nav url="{{asset('')}}" nav="{{$nav}}" preload="{{json_encode($data)}}"></left-nav>

    <newsfeed url="{{asset('')}}" width="col-xs-6"></newsfeed>


@stop


@section('modals')




@stop