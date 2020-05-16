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

<?php
    $group_albums = get_group_albums();
    $basicdata = get_user_profile_header();
    
    $album_name = get_album_name_by_id($album_id);
?>
    <div id="page-contents">
    	<div class="container bg_white" style="padding-top:25px; margin-top:-25px;">
    	<div class="row">

    	<!-- Newsfeed Common Side Bar Left
          ================================================= -->
    	<div class="col-md-3 static">
            <?php 
                            
                            
                            $pimg = '';
                            $cimg = '';
                            if($basicdata && $basicdata->profile_img)
                                $pimg = 'img/uploads/'.get_photo_name($basicdata->profile_img); 
                            else
                                $pimg = 'img/default_profile.jpg';
                            
                            if($basicdata && $basicdata->cover_img)
                                $cimg = '../../img/uploads/'.get_photo_name($basicdata->cover_img); 
                            else
                                $cimg = '../../img/default_cover.jpg';
            ?>
            
            <div class="profile-card" style="background: linear-gradient(to bottom, rgba(39,170,225,.8), rgba(28,117,188,.8)), url({{$cimg}}) no-repeat;
                background-size: cover;
                width: 100%;
                min-height: 90px;
                border-radius: 4px;
                padding: 10px 20px;
                color: #fff;
                margin-bottom: 40px;">
                        
            	<img src="{{asset($pimg)}}" alt="user" class="profile-photo" />
                        <h5><a href="{{url('/me')}}" class="text-white">
                            @if($basicdata && $basicdata->firstname)
                                {{$basicdata->firstname}}
                            @else
                                name
                            @endif
                    </a></h5>
            	<a href="{{url('#')}}" class="text-white"><i class="ion ion-android-person-add"></i> {{$album_name}}</a>
            </div><!--profile card ends-->
            <ul class="nav-news-feed">
                
              @if($group_albums)
                @foreach($group_albums as $group_album)
                    <li><i class="icon ion-ios-paper"></i><div><a href="{{url('me/upload/'.my_encode($group_album->id))}}">{{$group_album->name}}</a></div></li>
                @endforeach
              @endif
              <li><i class="icon ion-ios-paper"></i><div><a href="{{url('me/upload')}}">Others</a></div></li>
            </ul><!--news-feed links ends-->
			<a href="{{url('me/albumcreate')}}"><button class="btn btn-primary">Add New Album</button></a>
        </div>
    			
         <div class="col-md-7">

            <!-- Post Create Box
            ================================================= -->
            <div class="create-post">
            	<div class="row">
               <form name="basic-info" id="basic-info" class="form-inline" action="/me/upload" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="col-md-7 col-sm-7">
                      <div class="form-group">
                        <img src="{{asset($pimg)}}" alt="" class="profile-photo-md" />
                        <textarea name="description" id="exampleTextarea" cols="30" rows="1" class="form-control" placeholder="Upload new image to {{$album_name}} (Max 40 charaters)">{{ (Input::old('description'))? Input::old('description'): ''}}</textarea>
                        @if($errors->has('description'))
                                <li class="text text-red">{{$errors->first('description')}}</li>
                        @endif
                      </div>
                        <input type='hidden' name='album_id' value='{{$album_id}}' />
                    </div>
                    <div class="col-md-5 col-sm-5">
                      <div class="tools">
                        <ul class="publishing-tools list-inline">
                          <input type='file' name='file[]' id='filesToUpload' multiple accept='image/*' />
                          @if($errors->has('file'))
                                <li class="text text-red">{{$errors->first('file')}}</li>
                            @endif
                        </ul>
                        <button class="btn btn-primary pull-right">Upload</button>
                      </div>
                    </div>
                </form>
               
                    <!--<form enctype="multipart/form-data" method="post" action="upload.php">
                        <div class="row">
                          <label for="fileToUpload">Select Files to Upload</label><br />
                          <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" />
                          <output id="filesInfo"></output>
                        </div>
                        <div class="row">
                          <input type="submit" value="Upload" />
                        </div>
                      </form>-->
                    
                    
            	</div>
            <div class="media">
                <output id="filesInfo"></output>
            </div>
            </div>
            
            <!-- Media
            ================================================= -->
            <div class="media">
            	<div class="row js-masonry" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": ".grid-sizer", "percentPosition": true }'>
                
                
                @section('page-content')
                   @show
                
            	</div>
            </div>
          </div>

    	</div>
    	</div>
    </div>
@endsection
