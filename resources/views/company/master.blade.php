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
	<link rel="stylesheet" href="{{asset('css/help.css')}}">
	<script src="http://cloud.tinymce.com/stable/tinymce.min.js?apiKey=eplqq2bh36kh5c0hmf2gb7pi3vuowkbs2rvs8mtpsxaopdii"></script>
  	<script>tinymce.init({selector:'textarea'});</script>

	<style>
		.work-suggestions ul li > img {
			max-width: 100px;
			height: auto;
		}
	</style>
</head>
<body>
<div id="app">

	<header class="header">
		<div class="container">
			<a href="{{url('')}}" class="pull-left">
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
			<company-topnav url="{{asset('')}}" nav="{{$nav}}"></company-topnav>
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

	<div class="main-content">
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
								<div class="change-header" id="changeHeader">
									<h6 class="c-bright-green mt-0">Change Header</h6>
									<h6 class="c-bright-green mt-3">Background</h6>
								</div>
								<form action="">
									<input type="file" class="hide" id="headerFile">
								</form>
							</div>
						</div>

						<div class="main oh">
							
							@yield('main')

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

						<app-partners url="{{asset('')}}" data="{{json_encode($data['partners'])}}"></app-partners>


						<app-ads url="{{asset('')}}" data="{{json_encode($data['ads'])}}"></app-ads>
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
    </div>




<!-- ::::::::::::::::::::::::::::::::::::::::::::::::::::::: MODALS AND ALERTS ::::::::::::::::::::::::::::::::::::::: -->







<script type="text/javascript" src="{{asset('/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/plugins/owl_carousel/dist/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>

<script>
	function myMap() {
	var mapProp= {
	    center:new google.maps.LatLng(8.940366299999999, 125.51579170000002),
	    zoom:15,
	};
	var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
	}
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

	$('#changeHeader').click(function(){
		document.getElementById('headerFile').click();
	});
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxXg0aQhrnee_xVc80byQSbtJ2hElwoEA&callback=myMap"></script>

@yield('js')
</body>
</html>