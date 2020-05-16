@extends('layout.main-bum-frame')

@section('title', 'Album')

@section('page-content')
<div>
    
     <div class="pm_album_grid pm_columns_4 pm_with_margin">
        <div class="pm_gallery_container gallery_grid">
            <div class="pm_gallery isotope">
              
            <?php 
            $c = 0;
            $latest_img = '';
            $shown = 0;
            
            $group_albums = get_group_albums();
            if ($group_albums){
                foreach($group_albums as $group_album){
                    $images = get_album_imgs($group_album->id);
                   if($images){
                        $c = 0;
                        $latest_img = '';
                        $shown = 1;
                        foreach($images as $image){
                            $c++;
                            if(!$latest_img)
                                $latest_img = $image->name;
                        }
              ?>
                            <div class="pm_gallery_item" style='max-width:250px;'>
                               <div class="pm_gallery_item_wrapper">
                                   <div class="pm_image_wrapper">
                                       <a href="{{url('palz/album/'.my_encode($group_album->id))}}"><img src="{{asset('img/uploads/'.$latest_img)}}" alt="" ></a>
                                       <div class='pm_image_likes_wrapper' style="visibility: visible; opacity:1;">
                                           <div class='pm_image_likes_container'>
                                               <div class="pm_add_like_button" style="opacity: 0.5;">
                                                   <span class="">{{$c}}</span>
                                               </div>
                                               <div class='clear'></div>
                                           </div>
                                       </div>
                                   </div>
                                   <div class="pm_image_title" style="color: #fff;">
                                       {{$group_album->name}}
                                   </div>
                               </div><!-- pm_gallery_item_wrapper -->
                           </div><!-- pm_gallery_item -->
             <?php
                    }
                }
            }
            
            $images = get_group_photos_others();
            //fetching for general
            if($images){
                 $c = 0;
                 $latest_img = '';
                 $shown = 1;
                 foreach($images as $image){
                     $c++;
                     if(!$latest_img)
                         $latest_img = $image->name;
                 }
       ?>
                     <div class="pm_gallery_item" style='max-width:250px;'>
                        <div class="pm_gallery_item_wrapper">
                            <div class="pm_image_wrapper">
                                <a href="{{url('palz/album/others')}}"><img src="{{asset('img/uploads/'.$latest_img)}}" alt=""></a>
                                <div class='pm_image_likes_wrapper' style="visibility: visible; opacity:1;">
                                    <div class='pm_image_likes_container'>
                                        <div class="pm_add_like_button" style="opacity: 0.5;">
                                            <span class="">{{$c}}</span>
                                        </div>
                                        <div class='clear'></div>
                                    </div>
                                </div>
                            </div>
                            <div class="pm_image_title" style="color: #fff;">
                                Others
                            </div>
                        </div><!-- pm_gallery_item_wrapper -->
                    </div><!-- pm_gallery_item -->
      <?php
             }
             
            ?>
        @if(!$shown)    
        
                        <div class="pm_gallery_item">
                               <div class="pm_gallery_item_wrapper">
                                  <div class="pm_image_title" style="color: #fff;">
                                       No album in this group
                                   </div>
                               </div><!-- pm_gallery_item_wrapper -->
                           </div><!-- pm_gallery_item -->
            
           
        @endif
         </div>
           <!-- isotope <a href="javascript:void(0)" class="pm_load_more"><span class="pm_load_more_back"></span></a>
            <div class="clear"></div>-->
        </div><!-- pm_gallery_container -->
    </div><!-- pm_album_grid -->
    
</div>        
@endsection