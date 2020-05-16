@extends('layout.main-bum-frame')

@section('title', 'Home')

@section('page-content')
<div>
    
     <div class="pm_blog_listing_container pm_columns_4 pm_with_margin">
        <div class="pm_blog_listing blog_isotope">

            <?php 
            $images = get_album_group_imgs($album_id);
           ?>
            @if($images)
            @foreach($images as $image)
                <div class="pm_blog_item"><!-- Item 1 -->
                <div class="pm_blog_item_wrapper">
                    <div class="pm_blog_featured_image_wrapper">
                        <a href="{{asset('img/uploads/'.$image->name)}}" target="_blank"><img src="{{asset('img/uploads/'.$image->name)}}" alt="image upload"></a>
                        </div>
                        <div class="pm_blog_post_title">
                            <b><a href="{{url('palz/profile/'.my_encode($image->group_member_id).'/'.my_encode(1))}}">{{get_profile_firstname($image->group_member_id)}}</a> </b> {{$image->description}}
                        </div>
                    </div>
                </div><!-- pm_blog_item -->
                @endforeach
             @endif
          
		  </div><!-- pm_blog_listing 
        <a href="javascript:void(0)" class="pm_load_more"><span class="pm_load_more_back"></span></a>-->
        <div class="clear"></div>
    </div><!-- pm_blog_listing_container -->
    @include('layout.new-post-button')
</div>        
@endsection