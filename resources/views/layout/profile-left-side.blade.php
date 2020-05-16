<div class="col-md-3">
    <!--Edit Profile Menu-->
    <ul class="edit-menu">
      <li class="<?php if ($data == 'basic'){ echo 'active';} ?>"><i class="icon ion-ios-information-outline"></i><a href="{{url('palz/profile/basic')}}">Basic Information</a></li>
      <li class="<?php if ($data == 'edu'){ echo 'active';} ?>"><i class="icon ion-ios-briefcase-outline"></i><a href="{{url('palz/profile/edu')}}">Education and Work</a></li>
      <li class="<?php if ($data == 'interest'){ echo 'active';} ?>"><i class="icon ion-ios-heart-outline"></i><a href="{{url('palz/profile/interest')}}">My Interests</a></li>
      <li class="<?php if ($data == 'pword'){ echo 'active';} ?>"><i class="icon ion-ios-locked-outline"></i><a href="{{url('palz/profile/pword')}}">Change Password</a></li>
    </ul>
  </div>