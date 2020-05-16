<?php
$palz = 'Palzbum';
$group_id = 0;
    if(isset($palzname)){
       $palz = $palzname;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <title> Palbum {{($palz)? ' - '.$palz : ''}}</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Travis - Responsive HTML5 Template">
    <meta name="author" content="pixel-mafia.com">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img\favicon.ico')}}">

    <!-- Apple Touch -->
    <link rel="apple-touch-icon" href="{{asset('img\apple57.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('img\apple72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('img\apple114.png')}}">

    <!-- Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Responsive -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Handlee' rel='stylesheet' type='text/css'>

    <!-- CSS -->
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/grid.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/pm-icons.css')}}" rel="stylesheet" type="text/css" media="all">
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" type="text/css" media="all">

    <!-- JS -->
    <script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    
    
</head>

<body class="pm_dark_type album_scattered_page">
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
            <a target="_blank" class="pm_share_facebook" href="{{url('http://www.facebook.com/SuprixTech')}}">
                <i class="fa fa-facebook-square"></i>
            </a>
            <a target="_blank" class="pm_share_twitter" href="{{url('http://www.twitter.com/SuprixTech')}}">
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
            {{($palz)? $palz : ''}}
        </div><!-- pm_fleft -->
        <div class="pm_fright">
            <div class="pm_innerpadding_menu">
                <div class="pm_menu_cont">
                    <ul class="menu">
                        <li class="menu-item">
                            <a class="pm_icon_menu_item" href="{{url('/register')}}" title="Sign up/Login">
                                <i class="pmicon-006"></i>
                            </a>
                            <a class="pm_menu_mobile_item" href="{{url('/register')}}">Register/Login</a>
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