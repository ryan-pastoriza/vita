@extends('company.master')


@section('main')

<div class="row">
	<div class="col-xs-4 s-pad bg-white">
		<div class="profile-nav">
			<h5 class="c-bright-green f-13 border-bot pb-15 mb-10" style="padding-left:40px;padding-top:5px;">Profile</h5>
			<company-leftnav url="{{asset('')}}" nav="{{$subnav}}"></company-leftnav>
			<div class="profile-social" style="padding-left:40px;">
				<img src="../images/facebook-ico.png">
				<img src="../images/twitter-ico.png">
			</div>
		</div>
	</div>
	<app-help url="{{asset('')}}" preloaded="{{json_encode($data['help'])}}" width="col-md-8" help="1"></app-help>
</div>			

@stop