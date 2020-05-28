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
					<h4 class="mt-0 c-bright-green">Update Contacts</h4>
					
				</div>
				
				<div class="business-info-content">
                    <form action="{{route('company.contact.store', ['company_id'=>$data['company_info']->company_id])}}" method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label for="">Tel No.</label>
							<input type="text" name="tel_no" class="form-control" required value="{{$data['company_info']->tel_no}}">
						</div>
						<div class="form-group">
							<label for="">Fax No.</label>
							<input type="text" name="fax_no" class="form-control" value="{{$data['company_info']->fax_no}}">
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="email" name="email" class="form-control" required value="{{$data['company_info']->email}}">
						</div>
						<div class="form-group">
							<label for="">Description</label>
							<textarea class="mb-15 form-control" name="contact_description" id="" rows="12" value="">
								{{$data['company_info']->contact_description}}
							</textarea>
						</div>
                        
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