<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="This is social network html5 template available in themeforest......" />
		<meta name="keywords" content="Social Network, Social Media, Make Friends, Newsfeed, Profile Page" />
		<meta name="robots" content="index, follow" />
		<title>Palbum</title>

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
		<header id="header-inverse">
      <nav class="navbar navbar-default navbar-fixed-top menu">
        <div class="container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            
            <a href="{{url('/')}}" class="pm_logo">
                <img class="pm_non_retina" src="{{asset('img/landing_img/logo.png')}}" alt="palbum">
            </a>
              
          </div>
          
        </div><!-- /.container -->
      </nav>
                    
    </header>
    
    <!--Header End-->
    
    <!-- Landing Page Contents
    ================================================= -->
    <div id="lp-register">
        
        <?php 
        $l = 0;
        if(isset($ln)){
            $l = 1;
        }else{
            if(!empty($_GET['l'])){
                $l = 1;
             }
        }
        ?>
        
        
    	<div class="container wrapper">
        <div class="row">
            <div class="col-sm-5">
            @if(0)
        	
                    <p><img class="pm_non_retina" src="{{asset('img/logo.png')}}" alt="palbum" style="margin-top: -70px;margin-bottom: -170px;"></p>
                    <div class="intro-texts">
                        <h1 class="text-white" style="padding-left: 40px;margin-bottom: 80px;">U13/U14 SET</h1>
                  </div>
                  <div class="intro-texts">
                      <h1 class="text-white">Connect with palz !!!</h1>
                      <p>Meet. Create. Connect.</p>
                  </div>
            @else
                <div class="intro-texts">
                    <h1 class="text-white">Connect with palz !!!</h1>
                    <p>
                        Palzbum allows you to create photo album with your friends, family, team, classmates etc. You can set up different photo album groups and connect with your palz. <br /> <br />
                        What are you waiting for? sign up to begin.
                    </p>
                    <a href="{{url('/')}}"><button class="btn btn-primary">Learn More</button></a>
                </div>
            @endif
            </div>
            
        	<div class="col-sm-6 col-sm-offset-1">
            <div class="reg-form-container"> 
            
              <!-- Register/Login Tabs-->
              <div class="reg-options">
                <ul class="nav nav-tabs">
                  <li class="{{($l)? '' : 'active'}}"><a href="{{url('#register')}}" data-toggle="tab">Register</a></li>
                  <li class="{{($l)? 'active' : ''}}"><a href="{{url('#login')}}" data-toggle="tab">Login</a></li>
                </ul><!--Tabs End-->
              </div>
              
              <!--Registration Form Contents-->
              <div class="tab-content">
                <div class="tab-pane {{($l)? '' : 'active'}}" id="register">
                  <h3>Create an account</h3>
                   @if ($errors->any())
                    <p class="text-muted text-red">Oops! Seems all is not right</p>
                  @else
                    <p class="text-muted">Create an account to join your community of friends</p>
                  @endif
                  <!--Register Form-->
                  <form name="registration_form" id="registration_form" class="form-inline" action="/register" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                      
                    <div class="row">
                        <p class="birth"><strong>Phone</strong></p>
                      <div class="form-group col-xs-12">
                        <label for="email" class="sr-only">Phone</label>
                        <input id="email" class="form-control input-group-lg" type="text" name="phone" value="{{ (Input::old('phone'))? Input::old('phone'): ''}}" title="Enter Phone Number" placeholder="e.g 07012345678" required="required" />
                        @if($errors->has('phone'))
                            <li class="text text-red">{{$errors->first('phone')}}</li>
                        @endif
                      </div>
                    </div>
                    <div class="row">
                        <p class="birth"><strong>Email</strong></p>
                      <div class="form-group col-xs-12">
                        <label for="email" class="sr-only">Email</label>
                        <input id="email" class="form-control input-group-lg" type="email" name="email" value="{{ (Input::old('email'))? Input::old('email'): ''}}" title="Enter Email" placeholder="Email" required="required" />
                        @if($errors->has('email'))
                            <li class="text text-red">{{$errors->first('email')}}</li>
                        @endif
                      </div>
                    </div>
                    <div class="row">
                        <p class="birth"><strong>Password</strong></p>
                      <div class="form-group col-xs-12">
                        <label for="password" class="sr-only">Password</label>
                        <input id="password" name="password" class="form-control input-group-lg" type="text" name="password" title="Enter password" placeholder="Password" required="required" />
                        @if($errors->has('password'))
                            <li class="text text-red">{{$errors->first('password')}}</li>
                        @endif
                      </div>
                    </div>
                    
                <!--Register Now Form Ends

                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="city" class="sr-only">City</label>
                        <input id="city" class="form-control input-group-lg reg_name" type="text" name="city" title="Enter city" placeholder="Your city" />
                      </div>
                      <div class="form-group col-xs-6">
                        <label for="country" class="sr-only"></label>
                        <select class="form-control" id="country">
                          <option value="country" disabled selected>Country</option>
                          <option value="AFG">Afghanistan</option>
                          <option value="ALB">Albania</option>
                          <option value="DZA">Algeria</option>
                          <option value="AGO">Angola</option>
                          <option value="ARG">Argentina</option>
                          <option value="ARM">Armenia</option>
                          <option value="AUS">Australia</option>
                          <option value="AUT">Austria</option>
                          <option value="AZE">Azerbaijan</option>
                          <option value="BLR">Belarus</option>
                          <option value="BEL">Belgium</option>
                          <option value="BEN">Benin</option>
                          <option value="BOL">Bolivia</option>
                          <option value="BIH">Bosnia</option>
                          <option value="BWA">Botswana</option>
                          <option value="BRA">Brazil</option>
                          <option value="BGR">Bulgaria</option>
                          <option value="BFA">Burkina Faso</option>
                          <option value="CMR">Cameroon</option>
                          <option value="CAN">Canada</option>
                          <option value="CPV">Cape Verde</option>
                          <option value="TCD">Chad</option>
                          <option value="CHL">Chile</option>
                          <option value="CHN">China</option>
                          <option value="COL">Colombia</option>
                          <option value="COG">Congo</option>
                          <option value="COK">Cook Islands</option>
                          <option value="CRI">Costa Rica</option>
                          <option value="CIV">Cote d'Ivoire</option>
                          <option value="HRV">Croatia</option>
                          <option value="CYP">Cyprus</option>
                          <option value="CZE">Czech Republic</option>
                          <option value="DNK">Denmark</option>
                          <option value="ECU">Ecuador</option>
                          <option value="EGY">Egypt</option>
                          <option value="GNQ">Equatorial Guinea</option>
                          <option value="EST">Estonia</option>
                          <option value="ETH">Ethiopia</option>
                          <option value="FIN">Finland</option>
                          <option value="FRA">France</option>
                          <option value="GAB">Gabon</option>
                          <option value="GMB">Gambia</option>
                          <option value="GEO">Georgia</option>
                          <option value="DEU">Germany</option>
                          <option value="GHA">Ghana</option>
                          <option value="GRC">Greece</option>
                          <option value="GIN">Guinea</option>
                          <option value="GNB">Guinea-Bissau</option>
                          <option value="HND">Honduras</option>
                          <option value="HKG">Hong Kong</option>
                          <option value="HUN">Hungary</option>
                          <option value="ISL">Iceland</option>
                          <option value="IND">India</option>
                          <option value="IDN">Indonesia</option>
                          <option value="IRN">Iran</option>
                          <option value="IRQ">Iraq</option>
                          <option value="IRL">Ireland</option>
                          <option value="ISR">Israel</option>
                          <option value="ITA">Italy</option>
                          <option value="JAM">Jamaica</option>
                          <option value="JPN">Japan</option>
                          <option value="KAZ">Kazakhstan</option>
                          <option value="KEN">Kenya</option>
                          <option value="PRK">Korea</option>
                          <option value="LVA">Latvia</option>
                          <option value="LBR">Liberia</option>
                          <option value="LBY">Libya</option>
                          <option value="LTU">Lithuania</option>
                          <option value="LUX">Luxembourg</option>
                          <option value="MKD">Macedonia</option>
                          <option value="MDG">Madagascar</option>
                          <option value="MWI">Malawi</option>
                          <option value="MYS">Malaysia</option>
                          <option value="MLI">Mali</option>
                          <option value="MLT">Malta</option>
                          <option value="MRT">Mauritania</option>
                          <option value="MUS">Mauritius</option>
                          <option value="MEX">Mexico</option>
                          <option value="MCO">Monaco</option>
                          <option value="MAR">Morocco</option>
                          <option value="MOZ">Mozambique</option>
                          <option value="NAM">Namibia</option>
                          <option value="NPL">Nepal</option>
                          <option value="NLD">Netherlands</option>
                          <option value="NZL">New Zealand</option>
                          <option value="NER">Niger</option>
                          <option value="NGA">Nigeria</option>
                          <option value="NOR">Norway</option>
                          <option value="PAK">Pakistan</option>
                          <option value="PRY">Paraguay</option>
                          <option value="PER">Peru</option>
                          <option value="POL">Poland</option>
                          <option value="PRT">Portugal</option>
                          <option value="QAT">Qatar</option>
                          <option value="ROU">Romania</option>
                          <option value="RUS">Russia</option>
                          <option value="RWA">Rwanda</option>
                          <option value="SAU">Saudi Arabia</option>
                          <option value="SEN">Senegal</option>
                          <option value="SRB">Serbia</option>
                          <option value="SLE">Sierra Leone</option>
                          <option value="SGP">Singapore</option>
                          <option value="SVK">Slovakia</option>
                          <option value="SVN">Slovenia</option>
                          <option value="SOM">Somalia</option>
                          <option value="ZAF">South Africa</option>
                          <option value="SSD">South Sudan</option>
                          <option value="ESP">Spain</option>
                          <option value="SDN">Sudan</option>
                          <option value="SWZ">Swaziland</option>
                          <option value="SWE">Sweden</option>
                          <option value="CHE">Switzerland</option>
                          <option value="SYR">Syrian Arab Republic</option>
                          <option value="TWN">Taiwan</option>
                          <option value="TJK">Tajikistan</option>
                          <option value="TZA">Tanzania</option>
                          <option value="THA">Thailand</option>
                          <option value="TGO">Togo</option>
                          <option value="TUN">Tunisia</option>
                          <option value="TUR">Turkey</option>
                          <option value="UGA">Uganda</option>
                          <option value="UKR">Ukraine</option>
                          <option value="ARE">United Arab Emirates</option>
                          <option value="GBR">United Kingdom</option>
                          <option value="USA">United States</option>
                          <option value="URY">Uruguay</option>
                          <option value="UZB">Uzbekistan</option>
                          <option value="VUT">Vanuatu</option>
                          <option value="VEN">Venezuela, Bolivarian Republic of</option>
                          <option value="VNM">Viet Nam</option>
                          <option value="VGB">Virgin Islands, British</option>
                          <option value="VIR">Virgin Islands, U.S.</option>
                          <option value="WLF">Wallis and Futuna</option>
                          <option value="ESH">Western Sahara</option>
                          <option value="YEM">Yemen</option>
                          <option value="ZMB">Zambia</option>
                          <option value="ZWE">Zimbabwe</option>
                        </select>
                      </div>
                    </div
                -->
                    <p><a href="{{url('#login')}}" data-toggle="tab">Already have an account?</a></p>
                      <button class="btn btn-primary">Register Now</button>
                  </form><!--Register Now Form Ends-->
                  
                </div><!--Registration Form Contents Ends-->
                
                <!--Login-->
                <div class="tab-pane {{($l)? 'active' : ''}}" id="login">
                  <h3>Login</h3>
                  <p class="text-muted">Login to connect with your palz</p>
                  
                 <?php 
                  if($l){
                      if(isset($_GET['l']) && $_GET['l'] == 'failed'){
                    echo '<h6 class="form-heading" style="color: green;">Your email and password combination does not match.</h6>';
                    }
                  }
                 ?>
                  <!--Login Form-->
                   <form name="Login_form" id="Login_form" class="form-inline" action="/login" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                     <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-email" class="sr-only">Email</label>
                        <input id="my-email" class="form-control input-group-lg" type="text" name="email" title="Enter Email" placeholder="Your Email" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <label for="my-password" class="sr-only">Password</label>
                        <input id="my-password" class="form-control input-group-lg" type="password" name="password" title="Enter password" placeholder="Password" />
                      </div>
                    </div>
                   <p><a href="{{url('#register')}}" data-toggle="tab">I need a new account?</a> <a href="{{url('#')}}" style="margin-left: 30px;">Forgot Password?</a></p>
                   <button class="btn btn-primary">Login Now</button>
                  </form><!--Login Form Ends--> 
                  
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-sm-offset-6">
          
            <!--Social Icons-->
            <ul class="list-inline social-icons">
              <li><a href="{{url('http://www.fb.com/SuprixTech')}}"><i class="icon ion-social-facebook"></i></a></li>
              <li><a href="{{url('http://www.twitter.com/SuprixTech')}}"><i class="icon ion-social-twitter"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <!--preloader
    <div id="spinner-wrapper">
      <div class="spinner"></div>
    </div>-->

        </body> 
 <!-- Scripts
    ================================================= -->
    <script src="profile/js/jquery-3.1.1.min.js"></script>
    <script src="profile/js/bootstrap.min.js"></script>
    <script src="profile/js/jquery.appear.min.js"></script>
		<script src="profile/js/jquery.incremental-counter.js"></script>
    <script src="profile/js/script.js"></script>
    
	</body>
</html>
