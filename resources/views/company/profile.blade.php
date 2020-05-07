<!DOCTYPE html>
<html>
<head>
	<title>Vita</title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/owl_carousel/dist/assets/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/plugins/owl_carousel/dist/assets/owl.theme.default.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('/css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('/css/visit.css')}}">
	<link rel="stylesheet" href="{{asset('/css/profile.css')}}">

	<style>
		.work-suggestions ul li > img {
			max-width: 100px;
			height: auto;
		}
	</style>
</head>
<body>
	<header class="header">
		<div class="container">
			<a href="index.html" class="pull-left">
				<img src="{{asset('/images/logo.png')}}" class="logo">
			</a>
			<!-- <div class="alumni-type pull-left">
				<span class="myriad f-11">Alumni Type: </span>
				<span class="myriad f-11">Under Graduate</span>
			</div> -->
			<ul class="notifs pull-left">
				<li>
					<img src="{{asset('/images/messageico.png')}}" class="messageico">
					<span>2</span>
				</li>
				<li>
					<img src="{{asset('/images/mailico.png')}}" class="mailico">
					<span>10</span>
				</li>
			</ul>
			<div class="sign-out pull-right">
				<a href="{{route('logout')}}" class="myriad f-11 f-white m-5">Sign out</a>
				<img src="{{asset('/images/signout.png')}}">
			</div>
		</div>
	</header>
	<div class="sub-nav">
		<div class="container">
			<ul class="pull-left">
				<li><a href="index.html" class="active">Profile</a></li>
				<li><a href="{{asset('/jobs.html')}}">Post Job</a></li>
				<li><a href="{{asset('/inbox.html')}}">Applicants</a></li>
			</ul>
			<div class="alumnus-search pull-right">
				<div class="dropdown pull-left">
				  <button class="btn btn-default btn-sm dropdown-toggle alumnus-btn" type="button" data-toggle="dropdown">Alumnus
				  <span class="caret"></span></button>
				  <ul class="dropdown-menu">
				    <li><a href="#">Alumnus</a></li>
				    <li><a href="#">Alumni</a></li>
				    <li><a href="#">Aluminum</a></li>
				  </ul>
				</div>
				<div class="search-container pull-right">
					<input type="text" placeholder="Search">
					<i class="fa fa-search"></i>
				</div>
			</div>
		</div>
	</div>
	<div class="greetings-pane myriad">
		<h6><b>Greetings!!:</b> <span>Mr. Del Rosario, you can update your CV for additional information and have a privilege  to be hired...</span></h6>
	</div>

	<div class="main-content" id="app">
		<div class="container">
			<div class="row">
				<div class="col-md-9 s-pad">
					<div class="visit visit-company">
						<div class="head relative">
							<img src="{{asset($data['company_info']->logo)}}" alt="">
							<div class="oh">
								<div class="pull-leftmt-15" style="margin-left:180px;padding-bottom: 52px;">
									<h3 class="mt-0 c-white f-32">{{$data['company_info']->company_name}}</h3>
									<h6 class="mt-0 c-white f-11">{{$data['company_info']->address}}</h6>
									<span class="c-dwhite o-7 f-11 mr-15">Tel: {{$data['company_info']->tel_no}}</span>
									<span class="c-dwhite o-7 f-11">Fax: {{$data['company_info']->fax_no}}</span><br/>
									<h5 class="c-dwhite o-7 f-12">Job Posted: {{sizeof($data['jobs_posted'])}}</h5>
								</div>
								<div class="change-header">
									<form action="">
										<input type="file">
									</form>
									<h6 class="c-bright-green mt-0">Change Header</h6>
									<h6 class="c-bright-green mt-3">Background</h6>
								</div>
							</div>
						</div>

						<div class="main oh">
							
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
											
											<!-- <li>
												<div class="pull-left">
													<h5 class="mt-0"><a href="" class="c-bright-green">Application Support Analyst</a></h5>
													<span class="f-11 c-sdark">Date Posted: 2/25/2017</span>
												</div>
												<h5 class="pull-right c-light-green">7</h5>
											</li>
											<li>
												<div class="pull-left">
													<h5 class="mt-0"><a href="" class="c-bright-green">Application Engineer</a></h5>
													<span class="f-11 c-sdark">Date Posted: 2/25/2017</span>
												</div>
												<h5 class="pull-right c-light-green">18</h5>
											</li>
											<li>
												<div class="pull-left">
													<h5 class="mt-0"><a href="" class="c-bright-green">Project Manager</a></h5>
													<span class="f-11 c-sdark">Date Posted: 3/07/2017</span>
												</div>
												<h5 class="pull-right c-light-green">12</h5>
											</li>
											<li>
												<div class="pull-left">
													<h5 class="mt-0"><a href="" class="c-bright-green">Associate Developer</a></h5>
													<span class="f-11 c-sdark">Date Posted: 3/21/2017</span>
												</div>
												<h5 class="pull-right c-light-green">8</h5>
											</li>
											<li>
												<div class="pull-left">
													<h5 class="mt-0"><a href="" class="c-bright-green">Chief Technology Officer</a></h5>
													<span class="f-11 c-sdark">Date Posted: 3/07/2017</span>
												</div>
												<h5 class="pull-right c-light-green">32</h5>
											</li>
											<li>
												<div class="pull-left">
													<h5 class="mt-0"><a href="" class="c-bright-green">Computer Systems Manager</a></h5>
													<span class="f-11 c-sdark">Date Posted: 3/07/2017</span>
												</div>
												<h5 class="pull-right c-light-green">15</h5>
											</li>
											<li>
												<div class="pull-left">
													<h5 class="mt-0"><a href="" class="c-bright-green">Costumer Support</a></h5>
													<span class="f-11 c-sdark">Date Posted: 3/07/2017</span>
												</div>
												<h5 class="pull-right c-light-green">44</h5>
											</li> -->
										</ul>
										<div class="see-more">
											<!-- <i class="fa fa-angle-down c-light"></i><span class="f-10 c-dark">SEE MORE</span><i class="fa fa-angle-up c-light"></i> -->
										</div>
									</div>
								</div>
								<div class="col-xs-8 s-pad">
									<div class="job-posted bg-white">
										<div class="posts-pane">
											<div class="single-post">
												<div class="single-post-head">
													<img src="{{asset('/images/posts/mittallogo.png')}}" class="pull-left">
													<div class="company-info pull-left">
														<h6>MITTAL Solutions</h6>
														<span>Butuan City, Agusan del Norte, 8600</span>
													</div>
													<span class="pull-right post-time">2 hrs ago</span>
												</div>

												<div class="single-post-body">
													<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
													tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
													quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
													consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
													cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
													proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

													<div class="nice-not">
														<a class="pull-right" href="#">- Not</a>
														<a class="pull-right" href="#">+ Nice</a>		
													</div>
												</div>

												<div class="single-post-footer">
													<a href="#" class="comments-label">Comments</a>
													<div class="comments-section">
														
													</div>	
													<div class="post-box">
														<img src="{{asset('/images/don.jpg')}}" class="pull-left">
														<input type="text" class="pull-left">
														<button class="pull-right">post</button>
													</div>
												</div>
											</div>

											<div class="single-post">
												<div class="single-post-head">
													<img src="{{asset('/images/posts/mittallogo.png')}}" class="pull-left">
													<div class="company-info pull-left">
														<h6>MITTAL Solutions</h6>
														<span>Butuan City, Agusan del Norte, 8600</span>
													</div>
													<span class="pull-right post-time">3 days ago</span>
												</div>

												<div class="single-post-body">
													<img src="{{asset('/images/posts/company-img1.png')}}" class="img-responsive">
													<div class="nice-not">
														<a class="pull-right" href="#">- Not</a>
														<a class="pull-right" href="#">+ Nice</a>		
													</div>
												</div>

												<div class="single-post-footer">
													<a href="#" class="comments-label">Comments</a>
													<div class="comments-section">
														
													</div>	
													<div class="post-box">
														<img src="{{asset('/images/don.jpg')}}" class="pull-left">
														<input type="text" class="pull-left">
														<button class="pull-right">post</button>
													</div>
												</div>
											</div>


											<div class="single-post" data-toggle="modal" data-target="#myModal">
												<div class="single-post-head">
													<img src="{{asset('/images/posts/mittallogo.png')}}" class="pull-left">
													<div class="company-info pull-left">
														<h6>MITTAL Solutions</h6>
														<span>Butuan City, Agusan del Norte, 8600</span>
													</div>
													<span class="pull-right post-time">3 days ago</span>
												</div>

												<div class="single-post-body">
													<img src="{{asset('/images/posts/company-img2.png')}}" class="img-responsive">
													<div class="btn-apply">
														<button class="btn-apply pull-right">Apply</button>
													</div>
													
													<div class="nice-not">
														<a class="pull-right" href="#">- Not</a>
														<a class="pull-right" href="#">+ Nice</a>		
													</div>
												</div>

												<div class="single-post-footer">
													<a href="#" class="comments-label">Comments</a>
													<div class="comments-section">
														
													</div>	
													<div class="post-box">
														<img src="{{asset('/images/don.jpg')}}" class="pull-left">
														<input type="text" class="pull-left">
														<button class="pull-right">post</button>
													</div>
												</div>
											</div>


											<div class="single-post">
												<div class="single-post-head">
													<img src="{{asset('/images/posts/mittallogo.png')}}" class="pull-left">
													<div class="company-info pull-left">
														<h6>MITTAL Solutions</h6>
														<span>Butuan City, Agusan del Norte, 8600</span>
													</div>
													<span class="pull-right post-time">3 days ago</span>
												</div>

												<div class="single-post-body">
													<div>
														<h5>
															<span>Position	: </span><a href="#" class="c-green">Database Administrator</a>
														</h5>
														<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
														tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
														quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
														consequat.</p>
														<h5>
															<span>Salary	: </span><a href="#" class="c-green">PHP 30k - 50k</a>
														</h5>
													</div>
													
													<div class="btn-apply">
														<button class="btn-apply pull-right">Apply</button>
													</div>
													
													<div class="nice-not">
														<a class="pull-right" href="#">- Not</a>
														<a class="pull-right" href="#">+ Nice</a>		
													</div>
												</div>

												<div class="single-post-footer">
													<a href="#" class="comments-label">Comments</a>
													<div class="comments-section">
														<div class="single-post">
															<div class="single-post-head">
																<img src="{{asset('/images/dale.jpg')}}" class="pull-left">
																<div class="company-info pull-left">
																	<h6>Dale P. Blanco</h6>
																	<span>Bachelor of Science in Information Technology</span>
																</div>
																<span class="pull-right post-time">5 mins ago</span>
															</div>

															<div class="single-post-body">
																<div>
																	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
																	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
																	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
																	consequat.</p>
																</div>											
																<div class="nice-not">
																	<a class="pull-right" href="#">- Not</a>
																	<a class="pull-right" href="#">+ Nice</a>		
																</div>
															</div>

															<div class="single-post-footer hide">
																<a href="#" class="comments-label">Comments</a>
																<div class="comments-section">
																	
																</div>	
																<div class="post-box">
																	<img src="{{asset('/images/don.jpg')}}" class="pull-left">
																	<input type="text" class="pull-left">
																	<button class="pull-right">post</button>
																</div>
															</div>
														</div>
													</div>	
													<div class="post-box">
														<img src="{{asset('/images/don.jpg')}}" class="pull-left">
														<input type="text" class="pull-left">
														<button class="pull-right">post</button>
													</div>
												</div>
											</div>


										</div>
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>

					
				<div class="col-xs-3 s-pad bg-white">
					<div class="right-pane">
						<!-- <div class="recent-graduates mb-15 border-bot pb-15">
							<h5><span class="c-green">ACLC</span> RECENT GRADUATES</h5>
							<div class="grad-carousel">
								<span class="fa fa-chevron-left cnav-prev"></span>								
								<div class="owl-carousel g-carousel">
								  <div class="owl-content"> <img src="{{asset('/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/don.jpg')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/don.jpg')}}"> </div>
								</div>
								<div class="grad-info">
									<h5>Don J. Del Rosario</h5>
									<h6><span class="c-green">Graduate: </span>Bachelor of Science in Information...</h6>
								</div>
								<span class="fa fa-chevron-right cnav-next"></span>
							</div>
						</div> -->
						<app-recentalumnus url="{{asset('')}}"></app-recentalumnus>


						

						<div class="work-suggestions rel mb-24">
							<h5 class="bold f-11 mb-10 c-sdark">Visitors</h5>
							<div class="recent-visit">
								<div class="owl-carousel rv-carousel mb-15">
								  <div class="owl-content"> <img src="{{asset('/images/ads/callcenter2.png')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/ads/callcenter2.png')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/ads/callcenter2.png')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/ads/callcenter2.png')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/ads/callcenter2.png')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/ads/callcenter2.png')}}"> </div>
								  <div class="owl-content"> <img src="{{asset('/images/ads/callcenter2.png')}}"> </div>
								</div>
								<div class="footer">
									<h5 class="c-bright-green f-12 bold mb-5">Call Center Agent</h5>
									<p class="f-11 c-dark">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus atque labore soluta odit consequuntur adipisci consectetur culpa sequi exercitationem molestias dolores saepe, aut, ratione quam recusandae nulla. Beatae eius, voluptas.</p>
								</div>
								<span class="fa fa-caret-right rvnav-next"></span>
								<span class="fa fa-caret-left rvnav-prev"></span>
							</div>
						</div>

						<div class="chart-pane p-15 mb-24">
							<h5 class="mt-0 mb-15 c-light f-13">Job Application Summary</h5>
							<img src="{{asset('/images/posts/chart.png')}}" alt="" class="img img-responsive">
						</div>

						<div class="partners-pane">
							<h5>Partners</h5>
							<ul>
								<li><a href="#"><img src="{{asset('/images/ads/engtech.png')}}" class="img img-responsive"></a></li>
								<li><a href="#"><img src="{{asset('/images/ads/aclc.png')}}" class="img img-responsive"></a></li>
							</ul>
						</div>


						<div class="ads-pane">
							<h5>Vita Members Ads</h5>
							<ul>
								<li><a href="#"><img src="{{asset('/images/ads/onlinerevo.png')}}" class="img img-responsive"></a></li>
								<li><a href="#"><img src="{{asset('/images/ads/juicy.png')}}" class="img img-responsive"></a></li>
								<li><a href="#"><img src="{{asset('/images/ads/laz.png')}}" class="img img-responsive"></a></li>
								<li><a href="#"><img src="{{asset('/images/ads/bpi.png')}}" class="img img-responsive"></a></li>
								<li><a href="#"><img src="{{asset('/images/ads/accenture.png')}}" class="img img-responsive"></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer>
		<div class="container">
			<div class="row">
				<div class="col-xs-3 s-pad">
					<a href="#"><span class="c-green">Virtual Information Tracer for Alumnus</span> <span class="c-dark">VITA&trade;</span></a>
					<p class="f-10 c-light" style="margin-top:2px;">Developed and Manufactured by Engtech Global Solutions Inc.</p>
				</div>
				<div class="col-xs-9 s-pad">
					<ul class="pull-left">
						<li><a href="#">User Agreement</a></li>
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Copyright Policy</a></li>
						<li><a href="#">Feedback</a></li>
						<li><a href="#">Account</a></li>
					</ul>
					<div class="f-socials pull-right">
						<a href="#"><i class="fa fa-facebook-square"></i></a>
						<a href="#"><i class="fa fa-twitter-square"></i></a>
					</div>
					<br><p class="all-rights">All rights reserve 2017</p>
				</div>
			</div>
		</div>
	</footer>





<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::: MODALS AND ALERTS ::::::::::::::::::::::::::::::::::::::: -->







<script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/plugins/owl_carousel/dist/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

<script>
	$(document).ready(function(){
	  	$('.owl-carousel.g-carousel').owlCarousel({
		    loop:true,
		    margin:-40,
		    // nav:true,  
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:3
		        },
		        1000:{
		            items:5
		        }
		    }, 
		});

		$('.owl-carousel.c-carousel').owlCarousel({
		    loop:true,
		    margin:5,
		    // nav:true,  
		    responsive:{
		        0:{
		            items:1
		        },
		        600:{
		            items:2
		        },
		    }, 
		});

		$('.owl-carousel.rv-carousel').owlCarousel({
		    loop:true,
		    margin:5,
		    // nav:true,  
		    responsive:{
		        0:{
		            items:4
		        },
		        600:{
		            items:4
		        },
		    }, 
		});
	});

	$(".cnav-next").click(function(){
		let nextbtn = document.getElementsByClassName('owl-next')[0];
		nextbtn.click();
	});

	$(".cnav-prev").click(function(){
		let prevbtn = document.getElementsByClassName('owl-prev')[0];
		prevbtn.click();
	});

	

	$(".rvnav-next").click(function(){
		let nextbtn = document.getElementsByClassName('owl-next')[1];
		nextbtn.click();
	});

	$(".rvnav-prev").click(function(){
		let prevbtn = document.getElementsByClassName('owl-prev')[1];
		prevbtn.click();
	});
</script>
</body>
</html>