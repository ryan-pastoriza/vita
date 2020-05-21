@extends('company.master')


@section('main')

<div class="row">
	<div class="col-xs-4 s-pad bg-white">
		<div class="profile-nav">
			<h5 class="c-bright-green f-13 border-bot pb-15 mb-10" style="padding-left:40px;padding-top:5px;">Profile</h5>
			<company-leftnav url="{{asset('')}}" nav="{{$subnav}}"></company-leftnav>
			<div class="profile-social" style="padding-left:40px;">
				<img src="{{asset('images/facebook-ico.png')}}">
				<img src="{{asset('images/twitter-ico.png')}}">
			</div>
		</div>
	</div>
	<div class="col-xs-8 s-pad">
		<div class="job-posted bg-white">
			<div class="business-info p-15">
				<div class="heading border-bot" style="margin:0 0 20px 0;padding-bottom:16px;display:flex;align-items:center;justify-content:space-between;">
					<h4 class="mt-0 c-bright-green">Update Business Information</h4>
					
				</div>
				
				<div class="business-info-content">
                    <form action="{{route('company.profile.store', ['company_id'=>$data['company_info']->company_id])}}" method="POST">
                        {{csrf_field()}}
                        <textarea class="mb-15" name="business_info" id="" rows="20"></textarea>
                        <button id="submitBtn" type="submit" class="btn btn-primary" style="margin-top:16px;">Submit</button>
                    </form>
				</div>	
			</div>
		</div>
	</div>
</div>			

@stop



@section('js')

<script>
    tinyMCE.init({
        selector: '#tinymce-div',

        // Disable branding message, remove "Powered by TinyMCE"
        branding: false
    });

</script>


@stop