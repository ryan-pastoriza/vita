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
	<div class="col-xs-8 s-pad">
        <div class="job-posted bg-white">
            <div class="business-info p-15">
            <div class="heading border-bot" style="margin:0 0 20px 0;padding-bottom:16px;display:flex;align-items:center;justify-content:space-between;">
					<h4 class="mt-0 c-bright-green">Mision, Vision, Goals</h4>
					<div class="update-info" style="position:relative;margin-top:0;">
						<img src="{{asset('images/profile/pencil.png')}}" style="margin-top:0" alt="" class="pull-left">
						<a href="{{route('company.mission.update')}}" class="f-10 c-green pull-left" style="margin-top:3px;">Update your information</a>
					</div>
				</div>
                <div class="business-info-content">
                    <div class="mb-24">
                        <h4 class="mt-0 c-light mb-10">Mission</h4>
                        {!!$data['company_info']->mission!!}
                    </div>
                    <div class="mb-24">
                        <h4 class="mt-0 c-light mb-10">Vision</h4>
                        {!!$data['company_info']->vision!!}
                    </div>
                    <div class="mb-24">
                        <h4 class="mt-0 c-light mb-10">Goals</h4>
                        {!!$data['company_info']->goals!!}
                    </div>
                </div>	
            </div>
        </div>
    </div>
</div>			

@stop