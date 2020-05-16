<?php
    $data = get_profile_data_basic($profile_id);
    $user_detail = get_user_details($user_id);
?>

<div class="about-profile">
                <div class="about-content-block">
                  @if($data->quote)
                    <h4 class="grey"><i class="ion-ios-list icon-in-title"></i>Quote</h4>
                    <p>
                      {{$data->quote}}
                    </p>
                   @elseif($data->about)
                     <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>About Me</h4>
                    <p>
                      {{$data->about}}
                    </p>
                   @endif
                </div>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>Personal Information</h4>
                  <div class="organization">
                    <div class="work-info">
                        <p><b>Name: </b><label style='text-transform: uppercase;'>{{$data->surname}}</label> <span class="text-grey">{{$data->firstname}}</span></p>
                    </div>
                  </div>
                  <div class="organization">
                    <div class="work-info">
                        <p><b>Phone: </b><span class="text-grey">{{$user_detail->phone}}</span></p>
                    </div>
                  </div>
                  <div class="organization">
                    <div class="work-info">
                        <p><b>email: </b><span class="text-grey">{{$user_detail->email}}</span></p>
                    </div>
                  </div>
                </div>



                <div class="">
                  <h4 class="grey"><i class="ion-ios-briefcase-outline icon-in-title"></i>More About Me</h4>
                    
                  <div class="col-xs-6"> 
                      <div class="organization">
                        <div class="work-info">
                            <p><b>Class Crush: </b><span class="text-grey">{{$data->classCrush}}</label> </p>
                        </div>
                      </div>
                      <div class="organization">
                        <div class="work-info">
                            <p><b>Best Lecturer: </b><span class="text-grey">{{$data->bestLecturer}}</span></p>
                        </div>
                      </div>                      
                    </div>

                    <div class="col-xs-6"> 
                      <div class="organization">
                        <div class="work-info">
                            <p><b>Languages: </b><span class="text-grey">{{$data->languagesSpoken}}</span></p>
                        </div>
                      </div>
                      <div class="organization">
                        <div class="work-info">
                            <p><b>Best Food: </b><span class="text-grey">{{$data->bestFood}}</span></p>
                        </div>
                      </div>                                            
                    </div>

                </div>

    
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-location-outline icon-in-title"></i>Location</h4>
                  <p>{{$user_detail->address}}</p>
                  <p><b>City, Country: </b><span class="text-grey">{{$user_detail->city.', '.$user_detail->country}}</span></p>
                </div>
                <?php
                    $interests = get_profile_data_interest($user_id);
                    ?>
                <div class="about-content-block">
                  <h4 class="grey"><i class="ion-ios-heart-outline icon-in-title"></i>Interests</h4>
                  <ul class="interests list-inline">
                   @if($interests) 
                        @foreach($interests as $interest)
                        <li><span class="int-icons" title="Bycycle riding"><i class="icon {{get_interest_icon($interest->interest_type_id)}}"></i> </span> {{get_interest_name($interest->interest_type_id)}}</li>
                        @endforeach
                    @endif
                  </ul>
                </div>

                <div class="about-content-block">
                    <h4 class="grey"><i class="ion-ios-list icon-in-title"></i>Quote</h4>
                    <p>
                      {{$data->quote}}
                    </p>
                  
                     <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>About Me</h4>
                    <p>
                      {{$data->about}}
                    </p>

                    <h4 class="grey"><i class="ion-ios-list icon-in-title"></i>Philosophy</h4>
                    <p>
                      {{$data->philosophy}}
                    </p>
                  
                     <h4 class="grey"><i class="ion-ios-information-outline icon-in-title"></i>Parting Words</h4>
                    <p>
                      {{$data->partingWords}}
                    </p>

                </div>
                
                <div class="about-content-block">
                <h4 class="grey"><i class="ion-images icon-in-title"></i>Image Uploads</h4>
                <?php
                    $uploads = get_my_image_uploads(0, $profile_id , 1);
                ?>
                @if($uploads)
                    @foreach($uploads as $upload)
                        <div class="grid-item col-md-6 col-sm-6">
                                <div class="media-grid">
                                    <div class="img-wrapper" data-toggle="modal" data-target=".modal-1">
                                      <img src="{{asset('img/uploads/'.$upload->name)}}" alt="" class="img-responsive post-image" />
                                    </div>
                                    <div class="media-info">
                                      <div class="reaction">
                                        <a class="btn text-green"><i class="fa fa-thumbs-up"></i>{{get_likes($upload->id)}}</a>
                                      </div>
                                      <div class="user-info">
                                        <div class="user">
                                          <h6><a href="#" class="profile-link">{{$upload->description}}</a></h6>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                    @endforeach
                @else
                    <p style='margin-left: 10px;'><i>No images yet</i></p>
                @endif
                </div>
    
  </div>
            