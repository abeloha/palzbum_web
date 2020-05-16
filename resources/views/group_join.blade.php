@extends('layout.main-group-frame')

@section('title', 'Home')


@section('page-content')
<div>    
    
    <div class="edit-profile-container" style='margin-top: 130px;'>
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-book-outline"></i>Join photo album group where your palz are already</h4>
                  
                </div>
                    
                <div class="edit-block">
                  <form name="education" class="form-inline" action="/group/join" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <input id="school" class="form-control input-group-lg" type="text" name="groupName" title="Enter Palz Group Name" placeholder="Group Name"  />
                        @if($errors->has('groupName'))
                            <li class="text text-red">{{$errors->first('groupName')}}</li>
                        @endif
                      </div>
                    </div>
                    <button class="btn btn-primary">Join</button>
                  </form>
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
                    <p>If you do not have a photo album group yet for your friends, <a href="{{url('/group/create')}}">you can create one by clicking here</a></li>.</p>
                  <div class="line"></div>
                </div>
    </div>
    
    
</div>        
@endsection