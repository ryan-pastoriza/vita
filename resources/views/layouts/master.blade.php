<!DOCTYPE html>
<html>
<head>
	<title>Vita</title>
	<meta charset="utf-8"> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/owl_carousel/dist/assets/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('plugins/owl_carousel/dist/assets/owl.theme.default.css')}}">
    @yield('css')
	<link rel="stylesheet" type="text/css" href="{{asset('css/custom.css')}}">
</head>
<body>
    <div id="app">
    
        <header class="header">
            <div class="container">
                <a href="{{route('dashboard')}}" class="pull-left">
                    <img src="{{asset('images/logo.png')}}" class="logo">
                </a>
                <div class="alumni-type pull-left">
                    <span class="myriad f-11">Alumni Type: </span>
                    <span class="myriad f-11">Under Graduate</span>
                </div>
                <ul class="notifs pull-left">
                    <li>
                        <img src="{{asset('images/messageico.png')}}" class="messageico">
                        <span>2</span>
                    </li>
                    <li>
                        <img src="{{asset('images/mailico.png')}}" class="mailico">
                        <span>10</span>
                    </li>
                </ul>
                <div class="sign-out pull-right">
                    <a href="{{route('logout')}}">
                        <span class="myriad f-11 f-white m-5">Sign out</span>
                        <img src="{{asset('images/signout.png')}}">
                    </a>
                </div>
            </div>
        </header>
        <div class="sub-nav">
            <div class="container">
                <top-nav url="{{asset('')}}" nav="{{$nav}}"></top-nav>
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
                    
                    @yield('content')

                    <div class="col-md-3 s-pad bg-white">
                        <div class="right-pane">
                            <!-- <div class="recent-graduates">
                                <h5><span class="c-green">ACLC</span> RECENT GRADUATES</h5>
                                <div class="grad-carousel">
                                    <span class="fa fa-chevron-left cnav-prev"></span>								
                                    <div class="owl-carousel">
                                    <div class="owl-content"> <img src="{{asset('images/don.jpg')}}" data-name="done1"> </div>
                                    <div class="owl-content"> <img src="{{asset('images/don.jpg')}}" data-name="done1"> </div>
                                    <div class="owl-content"> <img src="{{asset('images/don.jpg')}}" data-name="done1"> </div>
                                    <div class="owl-content"> <img src="{{asset('images/don.jpg')}}" data-name="done1"> </div>
                                    <div class="owl-content"> <img src="{{asset('images/don.jpg')}}" data-name="done1"> </div>
                                    <div class="owl-content"> <img src="{{asset('images/don.jpg')}}" data-name="done1"> </div>
                                    <div class="owl-content"> <img src="{{asset('images/don.jpg')}}" data-name="done1"> </div>
                                    </div>
                                    <div class="grad-info">
                                        <h5>Don J. Del Rosario</h5>
                                        <h6><span class="c-green">Graduate: </span>Bachelor of Science in Information...</h6>
                                    </div>
                                    <span class="fa fa-chevron-right cnav-next"></span>
                                </div>
                            </div> -->

                            <app-recentalumnus url="{{asset('')}}"></app-recentalumnus>

                            <div class="profile-status">
                                <h5>Profile Status</h5>
                                <ul>
                                    <li>
                                        <img src="{{asset('images/info/pinfo.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Personal Information</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/info/finfo.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Family Information</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/info/edu.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Education</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/info/eli.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Eligibility</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/info/work.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Work Experience</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/info/service.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Services</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/info/training.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Trainings & Certificates</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/info/affi.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Affiliations</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/info/awards.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Awards</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/info/skills.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Skills</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                    <li>
                                        <img src="{{asset('images/info/ref.png')}}" class="pull-left">
                                        <div class="status-item pull-right">
                                            <a href="#" class="pull-left">Reference</a>
                                            <span class="status-strength pull-right"><span class="c-green">30%</span> Strength</span>
                                        </div>
                                    </li>
                                </ul>
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


         @yield('modals')
</div>
    
	
<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- <script type="text/javascript" src="{{asset('plugins/owl_carousel/dist/owl.carousel.min.js')}}"></script> -->
<script type="text/javascript" src="{{asset('js/app.js')}}"></script>



</body>
</html>