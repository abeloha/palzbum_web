<div class="timeline-cover">
<?php
    $data = get_user_profile_header($profile_id);
    $work = get_profile_data_work($user_id);
?>
@if($data)
          <!--Timeline Menu for Large Screens-->
          <div class="timeline-nav-bar hidden-sm hidden-xs">
            <div class="row">
              <div class="col-md-3">
                <div class="profile-info">
                    <img src="{{asset('img/profile_picx/1.jpg')}}" alt="" class="img-responsive profile-photo" />
                  <h3>{{$data->firstname.' '.$data->surname}}</h3>
                  <p class="text-muted">
                     @if($work) 
                     <a href="#">{{$work->designation}}</a>
                     @else
                     <a href="#"></a>
                     @endif
                  </p>
                </div>
              </div>
              <div class="col-md-9">
                <ul class="list-inline profile-menu">
                  <li><a href="{{url('palz/chat')}}" class="btn-primary">Messages</a></li>
                </ul>
                <ul class="follow-me list-inline">
                  <li><a href="{{url('palz/photos')}}" class="btn-primary">My Photos</a></li>
                </ul>
              </div>
            </div>
          </div><!--Timeline Menu for Large Screens End-->

          <!--Timeline Menu for Small Screens-->
          <div class="navbar-mobile hidden-lg hidden-md">
            <div class="profile-info">
              <img src="{{asset('img/profile_picx/1.jpg')}}" alt="" class="img-responsive profile-photo" />
                  <h4>Jibril Aisha</h4>
                  <p class="text-muted">Computer Engineer</p>
            </div>
            <div class="mobile-menu">
              <ul class="list-inline">
                <li><a href="chat.php" class="btn-primary">Messages</a></li>
              </ul>
              <button class="btn-primary">My Album Picx</button>
            </div>
          </div><!--Timeline Menu for Small Screens End-->
@endif
        </div>