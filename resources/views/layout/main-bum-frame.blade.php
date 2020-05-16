<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <title> Palbum </title>
    <meta name="keywords" content="Palzbum, Suprix Technology, Photo Album">
    <meta name="description" content="alzbum - Photo Album for palz">
    <meta name="author" content="Palzbum">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}"/>

    <!-- Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Responsive -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



    <!-- CSS -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/grid.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/pm-icons.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" type="text/css" media="all">

    <!-- JS -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/isotope.pkgd.min.js')}}"></script>
    
    
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-3941325609727541",
    enable_page_level_ads: true
  });
</script>
</head>

<body class="pm_dark_type page-template-page-blog-ajax blog_masonry_title_page" style="margin-top: 100px;">
    <!-- Preloader 
    <div class="preloader_active">
        <div class="pm_preloader_load_back">
            <div class="pm_preloader_border"></div>
            <div class="pm_preloader_load_line"></div>
        </div>
    </div>-->

    <!-- Sharing Popup -->
    <div class="pm_sharing_back">
        <div class="pm_popup_close" onclick="share_popup_close()"></div>
        <div class="pm_popup_share_wrapper">
            <a target="_blank" class="pm_share_facebook" href="{{url('http://www.facebook.com/suprixtech')}}">
                <i class="fa fa-facebook-square"></i>
            </a>
            <a target="_blank" class="pm_share_twitter" href="{{url('http://www.twitter.com/suprixtech')}}">
                <i class="fa fa-twitter"></i>
            </a>
        </div>
    </div>

    <!-- Header -->
    <header class="pm_header fixed_header">
        <div class="pm_fleft">
            <a href="index.html" class="pm_logo">
                <img class="pm_non_retina" src="{{asset('img/landing_img/logo.png')}}" alt="palbum">
                <img class="pm_retina" src="{{asset('img/landing_img/logo.png')}}" alt="palbum">
            </a>
            <!--{{get_group_name_by_id(get_group_id())}}
            {{get_group_id()}}-->
        </div><!-- pm_fleft -->
        <div class="pm_fright">
            <div class="pm_innerpadding_menu">
                <div class="pm_menu_cont">
                    <ul class="menu">
						
			<li class="menu-item"><!--group.php-->
                            <a class="pm_icon_menu_item" href="{{url('/palz')}}">
                                <i class="pmicon-032"></i>
                            </a>
                            <a class="pm_menu_mobile_item" href="{{url('/palz')}}">Home</a>
                        </li>
						
                        <li class="menu-item menu-item-has-children">
                            <a class="pm_icon_menu_item" href="javascript:void(0)">
                                <i class="pmicon-006"></i>
                            </a>
                            <a class="pm_menu_mobile_item" href="javascript:void(0)">Profile</a>
                            <div class="sub_menu_wrapper">
                                <ul class="sub-menu">
                                    <li class="menu-item">
                                        <a href="{{url('me/upload')}}">Upload Image</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{url('/me')}}">My Profile</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{url('group/join')}}">Join New Group</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="{{url('palz/photos')}}">My Photos</a>
                                    </li>
                                    <li class="menu-item"><!--logout.php-->
                                        <a href="{{url('/logout')}}">Log Out</a>
                                    </li>
                                </ul>
                            </div>
                        </li>

						<li class="menu-item">
                            <a class="pm_icon_menu_item" href="{{url('/palz/album')}}">
                                <i class="pmicon-002"></i>
                            </a><!--friends_picx.php-->
                            <a class="pm_menu_mobile_item" href="{{url('/palz/album')}}">Album</a>
                        </li>
			
                        </li>
                    </ul><!-- menu -->
                </div><!-- pm_menu_cont -->
                
                <a class="pm_menu_mobile_toggler" href="{{url('#')}}"></a>
                <span class="pm_share_button"></span>
            </div><!-- pm_innerpadding_menu -->
        </div><!-- pm_fright -->
        <div class="clear"></div>
    </header>

    <!-- Menu Mobile -->
    <div class="pm_menu_mobile_container_wrapper">
        <div class="pm_menu_mobile_container pm_container"></div>
    </div>
          
         <!-- place holder for contents-->
          @section('page-content')
             @show  
	
    

</body>
</html>
