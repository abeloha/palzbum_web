@extends('layout.main-bum-frame')

@section('title', 'Home')

@section('page-content')
<div>
    
     <div class="pm_blog_listing_container pm_columns_4 pm_with_margin">
        <div class="pm_blog_listing blog_isotope">
            <?php 
            $palz = get_my_palz_from_my_group();
            $c = 0;
              ?>
              @foreach($palz as $pal)
              <?php
              $c = $c + 1;
              
              $pimg = '';
              if($pal->profile_img)
                    $pimg = 'img/uploads/'.get_photo_name($pal->profile_img); 
                else
                    $pimg = 'img/default_profile.jpg';
              ?>
                <div class="pm_blog_item"><!-- Item 1 -->
                <div class="pm_blog_item_wrapper">
                    <div class="pm_blog_featured_image_wrapper">
                        <a href="{{asset($pimg)}}" target="_blank"><img src="{{asset($pimg)}}" alt="profile image"></a>
                            <div class="pm_post_likes_wrapper">
                                <div class="pm_image_likes_container">
                                   <a class="pm_potrfolio_read_more" href="{{url('palz/profile/'.my_encode($pal->group_member_id).'/'.my_encode(1))}}"></a>
                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="pm_blog_post_title">
                            <a href="{{url('palz/profile/'.my_encode($pal->group_member_id).'/'.my_encode(1))}}"><span style="color:white;"> {{$pal->surname.' '.$pal->firstname.' '.$pal->othername}}</span></a>
                        </div>
                    </div>
                </div><!-- pm_blog_item -->
             @endforeach
          
		  </div><!-- pm_blog_listing 
        <a href="javascript:void(0)" class="pm_load_more"><span class="pm_load_more_back"></span></a>-->
        <div class="clear"></div>
    </div><!-- pm_blog_listing_container -->
    @include('layout.new-post-button')
</div>        
@endsection