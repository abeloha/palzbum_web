@extends('layout.main-bum-frame')

@section('title', 'Home')

@section('page-content')
<div>
    
     <div class="pm_blog_listing_container pm_columns_4 pm_with_margin">
        <div class="pm_blog_listing blog_isotope">

            <?php 
            $shown = 0;
            $images = get_all_imgs($id);
           ?>
            @if($images)
            @foreach($images as $image)
                <?php $shown = 1; ?>
                <div class="pm_blog_item"><!-- Item 1 -->
                <div class="pm_blog_item_wrapper">
                    <div class="pm_blog_featured_image_wrapper">
                        <a href="{{asset('img/uploads/'.$image->name)}}" target="_blank"><img src="{{asset('img/uploads/'.$image->name)}}" alt="image upload"></a>
                        </div>
                        <div class="pm_blog_post_title">
                           {{$image->description}}
                        </div>
                    </div>
                </div><!-- pm_blog_item -->
                @endforeach
             @endif
          
             @if(!$shown)    
        
                        <div class="pm_gallery_item">
                               <div class="pm_gallery_item_wrapper">
                                  <div class="pm_image_title" style="color: #fff;">
                                       No photo uploaded yet
                                   </div>
                               </div><!-- pm_gallery_item_wrapper -->
                           </div><!-- pm_gallery_item -->
            
           
            @endif
         </div><!-- pm_blog_listing 
        <a href="javascript:void(0)" class="pm_load_more"><span class="pm_load_more_back"></span></a>-->
        <div class="clear"></div>
    </div><!-- pm_blog_listing_container -->
    @include('layout.new-post-button')
</div>        
@endsection