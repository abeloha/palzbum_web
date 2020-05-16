<div class="col-md-3">
    <!--Edit Profile Menu-->
    <ul class="edit-menu">
      <li class="<?php if ($data == 'basic'){ echo 'active';} ?>"><i class="icon ion-ios-information-outline"></i><a href="{{url('palz/profile/'.my_encode($profile_id).'/'.my_encode(1))}}">Basic Information</a></li>
      <li class="<?php if ($data == 'edu'){ echo 'active';} ?>"><i class="icon ion-ios-briefcase-outline"></i><a href="{{url('palz/profile/'.my_encode($profile_id).'/'.my_encode(2))}}">Education and Work</a></li>
    </ul>
  </div>