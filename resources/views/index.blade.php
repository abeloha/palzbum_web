<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Palzbum - Photo Album for palz" />
		<meta name="keywords" content="Palzbum, Photo Album" />
		<meta name="robots" content="index, follow" />
		<title> Palbum </title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="{{asset('profile/css/bootstrap.min.css')}}"  />
		<link rel="stylesheet" href="{{asset('profile/css/style.css')}}"  />
		<link rel="stylesheet" href="{{asset('profile/css/ionicons.min.css')}}"  />
    <link rel="stylesheet" href="{{asset('profile/css/font-awesome.min.css')}}"  />
    
    <!--Google Ads-->
	<!--
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-3941325609727541",
        enable_page_level_ads: true
      });
    </script>
	-->
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}"/>
	</head>
  <body>

    <!-- Header
    ================================================= -->
		<header id="header" class="lazy-load">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="{{asset('img/landing_img/logo.png')}}" alt="logo" /></a>
          </div>
        </div><!-- /.container -->
      </nav>
    </header>
    <!--Header End-->

    <!-- Top Banner
    ================================================= -->
		<section id="banner">
			<div class="container">

        <!-- Sign Up Form
        ================================================= -->
        <div class="sign-up-form">
					<a href="index.html" class="logo"><img src="{{asset('img/landing_img/logo.png')}}" alt="Friend"/></a>
					<h2 class="text-white">Palz Photo Album</h2>
					<div class="line-divider"></div>
					<div class="form-wrapper">
						<p class="signup-text">Sign up now and create phot album with your Friends</p>
						<form action="/register" method="post" enctype="multipart/form-data">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
							<fieldset class="form-group">
                                                            <input type="text" name="phone" class="form-control" id="example-name" value="{{ (Input::old('phone'))? Input::old('phone'): ''}}" placeholder="e.g 07012345678" required="required">
							</fieldset>
                                                        @if($errors->has('phone'))
                                                            <li class="text text-danger">{{$errors->first('phone')}}</li>
                                                        @endif
							<fieldset class="form-group">
								<input type="email" name="email" class="form-control" id="example-email" value="{{ (Input::old('email'))? Input::old('email'): ''}}" placeholder="Enter email" required="required">
							</fieldset>
                                                        @if($errors->has('email'))
                                                            <li class="text text-danger">{{$errors->first('email')}}</li>
                                                        @endif
							<fieldset class="form-group">
								<input type="text" name="password" class="form-control" id="example-password" value="{{ (Input::old('password'))? Input::old('password'): ''}}" placeholder="Enter a password" required="required">
							</fieldset>
                                                        @if($errors->has('password'))
                                                            <li class="text text-danger">{{$errors->first('password')}}</li>
                                                        @endif
                                                    <p>By signning up you agree to the terms</p>
                                                    <button class="btn-secondary">Signup</button>
						</form>
						
					</div>
					<a href="{{url('/login')}}">Already have an account?</a>
					<img class="form-shadow" src="{{asset('img/landing_img/bottom-shadow.png')}}" alt="" />
				</div><!-- Sign Up Form End -->

        <svg class="arrows hidden-xs hidden-sm">
          <path class="a1" d="M0 0 L30 32 L60 0"></path>
          <path class="a2" d="M0 20 L30 52 L60 20"></path>
          <path class="a3" d="M0 40 L30 72 L60 40"></path>
        </svg>
			</div>
		</section>

  
		<footer id="footer">
      <div class="container">
      	</div>
      <div class="copyright">
        <p>copyright @palzbum-team 2018. All rights reserved</p>
      </div>
		</footer>

    <!--preloader
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>-->

   
    
    
    <script src="{{asset('profile/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('profile/bootstrap.min.js')}}"></script>
    <script src="{{asset('profile/jquery.appear.min.js')}}"></script>
        <script src="{{asset('profile/jquery.incremental-counter.js')}}"></script>
    <script src="{{asset('profile/script.js')}}"></script>
    
	</body>
</html>
