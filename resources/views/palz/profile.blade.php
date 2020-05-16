@extends('layout.main-profile-frame')

@section('title', 'Home')


@section('page-content')
<div>
    
    <?php 
        if ($data == 'basic'){
           ?>  @include('palz.profile_basic') <?php
        }elseif ($data == 'edu'){
             ?>  @include('palz.profile_edu') <?php
        }  elseif ($data == 'interest') {
             ?>  @include('palz.profile_interest') <?php
        }elseif ($data == 'security') {
             ?>  @include('palz.profile_password') <?php
        }  else {
             ?>  @include('palz.profile_basic') <?php
        }
    ?>
    
    
</div>        
@endsection