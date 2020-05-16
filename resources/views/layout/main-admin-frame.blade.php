@extends('layout.main-profile-frame-header')



@section('menu-item')
    <ul class="nav navbar-nav navbar-right main-menu">
              <li class="dropdown"><a href="{{url('/admin/code/generate')}}">Generate Code</a></li>
              <li class="dropdown"><a href="{{url('/admin/code/unsed')}}">Unused Codes</a></li>
              <li class="dropdown"><a href="{{url('/admin/code/all')}}">All Codes</a></li>
              <li class="dropdown"><a href="{{url('/palz')}}">Out</a></li>
            </ul>
@endsection

@section('frame-content')

    
    <div id="page-contents">
    	<div class="container bg_white" style="padding-top:25px; margin-top:-25px; min-height: 550px;">
    	<div class="row">

    	<!-- Newsfeed Common Side Bar Left
          ================================================= -->
    	<div class="col-md-2 static">
            
          </div>
    			
         <div class="col-md-8">

            <!-- Media
            ================================================= -->
            <div class="media">
            	@section('page-content')
                   @show
            </div>
          </div>

    	</div>
    	</div>
    </div>

@endsection

