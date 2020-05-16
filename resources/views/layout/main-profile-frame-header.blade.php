<!DOCTYPE html>
<html lang="en">
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="alzbum - Photo Album for palz" />
		<meta name="keywords" content="Palzbum, Suprix Technology, Photo Album" />
		<meta name="robots" content="index, follow" />
		<title> Palbum | @yield('title')</title>

    <!-- Stylesheets
    ================================================= -->
		<link rel="stylesheet" href="{{asset('profile/css/bootstrap.min.css')}}"  />
		<link rel="stylesheet" href="{{asset('profile/css/style.css')}}"  />
		<link rel="stylesheet" href="{{asset('profile/css/ionicons.min.css')}}"  />
                <link rel="stylesheet" href="{{asset('profile/css/font-awesome.min.css')}}"  />
                <link rel="stylesheet" href="{{asset('profile/css/emoji.css')}}"  />
   
    
   
    
    <!--Favicon-->
    <link rel="shortcut icon" type="image/png" href="{{asset('img/favicon.ico')}}"/>
    
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
      (adsbygoogle = window.adsbygoogle || []).push({
        google_ad_client: "ca-pub-3941325609727541",
        enable_page_level_ads: true
      });
    </script>
	</head>
  <body>

    <!-- Header
    ================================================= -->
    <header id="header" >
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container" style="background-color: #111314;">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">Palzbum</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <!-- place holder for menu-->
                @section('menu-item')
                   @show
            
            <!--<form class="navbar-form navbar-right hidden-sm">
              <div class="form-group">
                <i class="icon ion-android-search"></i>
                <input type="text" class="form-control" placeholder="Search friends, photos, videos">
              </div>
            </form>-->
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
      </nav>
    </header>
    
    
    @section('frame-content')
        @show
        
    @include('layout.main-profile-frame-footer')
