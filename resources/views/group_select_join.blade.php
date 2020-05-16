@extends('layout.main-group-frame')

@section('title', 'Home')


@section('page-content')
<div>    
    
    <div class="edit-profile-container" style='margin-top: 30px;'>
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-book-outline"></i>Select a photo album group</h4>
                  
                </div>
                <div class="edit-block">
                  
                    <?php
                        if(isset($_GET['e'])){
                           $e = my_decode($_GET['e']);
                            ?>
                                <div class="form-group col-xs-12" style="margin-top: 15px; background-color: #F3F3F3; color:red; border-radius: 10px;"> 
                                    <b><?php echo $e; ?></b>
                                </div>
                            <?php
                        }
                    ?>
                </div>
                <div class="block-title">
                  <div class="line"></div>
                    <p>Select the photo album group for your friends to join.</p>
                  <div class="line"></div>
                </div>
        
                  <!-- Friend List
            ================================================= -->
            <div class="friend-list">
            	<div class="row">
                    
                <div class="col-md-6 col-sm-6">
                                <div class="friend-card">
                                    <?php
                                       $img = '';
                                       if($group->logo){
                                           $img = $group->logo;
                                       }else{
                                           $img = 'default.jpg';
                                       }
                                    ?>
                                    <a href="{{url('/group/jselect/'.$group->name)}}" class="profile-link">
                                    <img src="{{asset('img/group_logo/'.$img)}}" alt="group logo" class="img-responsive cover" style="max-width: 200px; max-height: 200px;" />
                                    <div class="friend-info">
                                        <h5>{{$group->name}}</h5>
                                      <p>{{$group->description}}</p>
                                    </div>
                                    </a>
                                </div>
                            </div>
                            
            	</div>
            </div>
    </div>
    
    
</div>        
@endsection