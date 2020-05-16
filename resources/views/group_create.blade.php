@extends('layout.main-group-frame')

@section('title', 'Create')


@section('page-content')
<div>    
    
    <div class="edit-profile-container" style='margin-top: 130px;'>
                <div class="block-title">
                  <h4 class="grey"><i class="icon ion-ios-book-outline"></i>Create a photo album group for your palz</h4>
                  
                </div>
                    
                <div class="edit-block">
                  <form name="education" class="form-inline" action="/group/create" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="row">
                      <div class="form-group col-xs-12">
                        <input id="school" class="form-control input-group-lg" type="text" name="name" title="Enter Palz Group Name" placeholder="Group Name"  />
                        @if($errors->has('name'))
                            <li class="text text-red">{{$errors->first('name')}}</li>
                        @endif
                      </div>
                    </div>
                    <button class="btn btn-primary">Create</button>
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
                    <p>If you have a photo album group with your friends you would like to join, <a href="{{url('/group/join')}}">you can join by clicking here</a></li>.</p>
                  <div class="line"></div>
                </div>
    </div>
    
    
</div>        
@endsection