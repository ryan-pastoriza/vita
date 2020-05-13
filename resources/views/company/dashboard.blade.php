@extends('company.master')


@section('main')

					<div class="row">
						<div class="col-xs-4 s-pad bg-white">
							<div class="job-posted bg-white p-15" style="padding-left:25px">
								<h5 class="mt-0 c-light-green f-13 border-bot p-bot-10">Jobs Posted</h5>
								<ul class="oh mb-10">
									
									@foreach($data['jobs_posted'] as $job)

										<li>
											<div class="pull-left">
												<h5 class="mt-0"><a href="" class="c-bright-green">{{$job->title}}</a></h5>
												<span class="f-11 c-sdark">Date Posted: {{$job->datePosted()}}</span>
											</div>
											<h5 class="pull-right c-light-green">{{sizeof($job->applicants)}}</h5>

										</li>

									@endforeach
									
								</ul>
								<div class="see-more">
									<!-- <i class="fa fa-angle-down c-light"></i><span class="f-10 c-dark">SEE MORE</span><i class="fa fa-angle-up c-light"></i> -->
								</div>
							</div>
						</div>
						<newsfeed url="{{asset('')}}" width="col-xs-8"></newsfeed>
					</div>


@stop