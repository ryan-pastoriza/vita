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
                <h4 class="mt-0 c-bright-green border-bot pb-10 mb-24">Help</h4>
                <div class="business-info-content">
                    <form action="{{route('company.help.store', ['company_id'=>$data['company_info']->company_id])}}" method="POST">
                        {{csrf_field()}}

                        @foreach($data['help'] as $help)
                            <div class="help-pane" style="
                                padding:12px;
                                background-color:#c1fcc1;
                                margin-bottom:16px;">

                                <div class="form-group">
                                    <label for="">Title</label>
                                    <input name="data[{{$help->help_id}}][title]" class="form-control" type="text" value="{{$help->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Body</label>
                                    <textarea class="mb-15 form-control" name="data[{{$help->help_id}}][body]" id="" rows="4" value="">
                                        {{$help->content}}
                                    </textarea>
                                </div>
                            </div>

                        @endforeach
                       
                        <button id="submitBtn" type="submit" class="btn btn-primary" style="margin-top:16px;">Submit</button>
                    </form>
                </div>	
            </div>
        </div>
    </div>
</div>			

@stop