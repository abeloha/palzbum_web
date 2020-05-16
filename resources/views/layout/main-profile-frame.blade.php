@extends('layout.main-profile-frame-header')



@section('menu-item')
    <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown"><a href="{{url('/palz')}}">Home</a></li>
              <li class="dropdown"><a href="{{url('/me')}}">My Profile</a></li>
              <li class="dropdown"><a href="{{url('/me/upload')}}">Upload Image</a></li>
              <li class="dropdown"><a href="{{url('/palz/photos')}}">My Photos</a></li>
              <li class="dropdown"><a href="{{url('/logout')}}">Logout</a></li>
            </ul>
@endsection

@section('frame-content')

    <div class="container bg_white" >

      <!-- Timeline
      ================================================= -->
<?php
//added
    if(!isset($profile_id)){
        $profile_id = get_member_id();
    }
    if(!isset($user_id)){
        $user_id = get_id();
    }
//added
?>


@if($profile_id == get_member_id())
    <div class="timeline">
      @include('profile.profile-top')
      <div id="page-contents">
        <div class="row">
          @include('profile.profile-left-side')
          <div class="col-md-7">

             <!-- place holder for contents-->
              @section('page-content')
                 @show

          </div>
          <div class="col-md-2 static">

            <!--Sticky Timeline Activity Sidebar-->
            @include('profile.profile-right-side')
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="timeline">
      @include('profile.profile-top') <!-- Changed -->
      <div id="page-contents">
        <div class="row">
          @include('palz.profile-left-side')
          <div class="col-md-7">

             <!-- place holder for contents-->
              @section('page-content')
                 @show

          </div>
          <div class="col-md-2 static">

            <!--Sticky Timeline Activity Sidebar-->
            @include('palz.profile-right-side')
          </div>
        </div>
      </div>
    </div>
    @endif
 
      
      
    </div>

@endsection