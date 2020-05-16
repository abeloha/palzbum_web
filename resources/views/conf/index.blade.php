@extends('layout.conf-main-frame')

@section('title', 'Dashboard')


@section('page-content')

 @foreach ($biodatas as $biodata)
<!-- Quick stats -->
    <div class="col_3">
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-book icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>Application</strong></h5>
                      <span>{{get_student_rank_name($biodata->rank)}}</span>
                    </div>
                </div>
        	</div>
        	<div class="col-md-3 widget widget1">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-info icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>Status</strong></h5>
                      <span>Pending Approval</span>
                    </div>
                </div>
        	</div>
        <a href="{{url('conf/print')}}" target="new">
                   <div class="col-md-6 widget">
        		<div class="r3_counter_box">
                    <i class="pull-left fa fa-print dollar1 icon-rounded"></i>
                    <div class="stats">
                      <h5><strong>Print Application Form</strong></h5>
                    </div>
                </div>
        	 </div>
        </a>
        	<div class="clearfix"> </div>
      </div>

    <div class="alert alert-danger" role="alert">
    <strong>Welcome!</strong> Your application has not yet been approved. Submit completed application form to your coordinator.
   </div>

<?php
    $topic = '';
    $area = '';
        if(!empty($research_details->research_topic)){
            $topic = $research_details->research_topic;
        }
        if(!empty($research_details->research_area)){
            $area = $research_details->research_area;
        }
 ?>

<div>
     <div class="xs">
  	       <h3>Biodata</h3>
               @if ($errors->any())
                <h5 style="color: red;">Oops!!! It seems something went wrong.</h5>
                @endif
  	         <div class="tab-content">
                                <div class="tab-pane active" id="horizontal-form">
                                    <form action="/conf/biodata" method="post" class="form-horizontal">
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        
                                    <?php
                                        if($biodata->rank != 4){                                        
                                        ?><div>
                                        <h4><u>Research Area</u></h4>
                                            
                                            <div class="form-group">
                                                    <label class="col-sm-2 control-label">Research Topic:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" name="research_topic" value="{{$topic}}">
                                                            @if($errors->has('research_topic'))
                                                            <li class="text">• {{$errors->first('research_topic')}}</li>
                                                            @endif
                                                        </div>
                                            </div>
                                            <div class="form-group">
                                                            <label class="col-sm-2 control-label">Research Area:</label>
                                                            <div class="col-sm-8">
                                                                <input type="text" class="form-control1 ng-invalid ng-invalid-required ng-touched" ng-model="model.name" name="research_area" value="{{$area}}">
                                                                @if($errors->has('research_area'))
                                                                <li class="text">• {{$errors->first('research_area')}}</li>
                                                                @endif
                                                            </div>
                                            </div>
                                             
                                        </div>
                                        <?php
                                        }
                                    ?>    
                                            <h4><u>Academic details</u></h4>
                                            
                                                <div class="form-group">
                                                    
                                                    <div class="col-sm-8">
                                                            <div class="col-sm-12 form-group">
                                                            <label for="disabledinput" class="col-sm-3 control-label">Registration Number:</label>
                                                            <div class="col-sm-9">
                                                                <input readonly="" type="text" class="form-control1" id="disabledinput" name="regno" value="{{$biodata->regno}}" placeholder="Registration Number">
                                                                    @if($errors->has('regno'))
                                                                    <li class="text">• {{$errors->first('regno')}}</li>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="col-sm-12 form-group">
                                                            <label for="disabledinput" class="col-sm-3 control-label">Surname:</label>
                                                                <div class="col-sm-9">
                                                                    <input readonly="" type="text" class="form-control1" id="disabledinput" name="surname" value="{{$biodata->surname}}" placeholder="Surname">
                                                                        @if($errors->has('surname'))
                                                                        <li class="text">• {{$errors->first('surname')}}</li>
                                                                        @endif
                                                                </div>
                                                        </div>
                                                        
                                                        <div class="col-sm-12 form-group">
                                                            <label for="disabledinput" class="col-sm-3 control-label">First Name:</label>
                                                            <div class="col-sm-9">
                                                                <input readonly="" type="text" class="form-control1" id="disabledinput" name="firstname" value="{{$biodata->firstname}}" placeholder="First Name">
                                                                    @if($errors->has('firstname'))
                                                                    <li class="text">• {{$errors->first('firstname')}}</li>
                                                                    @endif
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class="col-sm-4">
                                                        <div style="width:150px; height:150px; border:solid black; margin-top:-25px;">
                                                            <img style="width:100%; height:100%; margin-bottom:13px;" src="{{asset(get_profile_pix())}}" />

                                                            <input  type="file" name="profile_image" >
                                                        </div> 
                                                    </div>
                                                </div>
                                                
                                                 
                                                <div class="form-group">
                                                        <label for="disabledinput" class="col-sm-2 control-label">Other Name:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control1" id="disabledinput" name="othername" value="{{$biodata->othername}}" placeholder="Other Name">
                                                                @if($errors->has('othername'))
                                                                <li class="text">• {{$errors->first('othername')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                                
                                             
                                             
                                             <div class="form-group">
                                                        <label for="disabledinput" class="col-sm-2 control-label">Program:</label>
                                                        <div class="col-sm-8">
                                                            <input readonly="" type="text" class="form-control1" id="disabledinput" name="rank" value="{{$ranks->title}}" placeholder="Program">
                                                                @if($errors->has('rank'))
                                                                <li class="text">• {{$errors->first('rank')}}</li>
                                                                @endif
                                                        </div>
                                                </div>

                                            <h4><u>Basic details</u></h4>
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">Gender:</label>
                                                        <div class="col-sm-8">
                                                            <select class="form-control1 ng-invalid ng-invalid-required" ng-model="model.select" name="gender" required="">
                                                                <option value="">Select Gender</option>
                                                                <option value="Male" <?php if (($biodata->gender) == 'Male') echo 'selected'; ?>>Male</option>
                                                                <option value="Female" <?php if (($biodata->gender) == 'Female') echo 'selected'; ?>>Female</option>
                                                             </select>
                                                                @if($errors->has('gender'))
                                                                <li class="text">• {{$errors->first('gender')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                             
                                             
                                             
                                             
                                             
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">Marital Status:</label>
                                                       <div class="col-sm-8">
                                                           <select class="form-control1 ng-invalid ng-invalid-required" ng-model="model.select" name="marital_status"r equired="">
                                                                <option value="">Marital Status</option>
                                                                <option value="Single" <?php if (($biodata->marital_status) == 'Single') echo 'selected'; ?>>Single</option>
                                                                <option value="Married" <?php if (($biodata->marital_status) == 'Married') echo 'selected'; ?>>Married</option>
                                                             </select>
                                                                @if($errors->has('marital_status'))
                                                                <li class="text">• {{$errors->first('marital_status')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">Date of Birth:</label>
                                                        <div class="col-sm-8">
                                                            <input type="date" class="form-control1" ng-model="model.date" name="dob" value ="{{$biodata->dob}}">
                                                            
                                                                @if($errors->has('dob'))
                                                                <li class="text">• {{$errors->first('dob')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">State of Origin:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control1 input-sm" name="state" value ="{{$biodata->state}}" id="disabledinput" placeholder="State">
                                                                @if($errors->has('state'))
                                                                <li class="text">• {{$errors->first('state')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">Local Gov. Area:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control1 input-sm" name="lga" value ="{{$biodata->lga}}" id="disabledinput" placeholder="LGA">
                                                                @if($errors->has('lga'))
                                                                <li class="text">• {{$errors->first('lga')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">Nationality:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control1 input-sm" name="country" value ="{{$biodata->country}}" id="disabledinput" placeholder="Nationality">
                                                                @if($errors->has('country'))
                                                                <li class="text">• {{$errors->first('country')}}</li>
                                                                @endif
                                                        </div>
                                                </div>

                                            <h4><u>Contact details</u></h4>
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">email</label>
                                                        <div class="col-sm-8">
                                                            <input readonly="" type="text" class="form-control1 input-sm" name="email" value ="{{$biodata->email}}" id="disabledinput" placeholder="email">
                                                                @if($errors->has('email'))
                                                                <li class="text">• {{$errors->first('email')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">Phone</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control1 input-sm" name="phone" value ="{{$biodata->phone}}" id="disabledinput" placeholder="phone">
                                                                @if($errors->has('phone'))
                                                                <li class="text">• {{$errors->first('phone')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">Contact Address:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control1 input-sm" name="address" value ="{{$biodata->address}}" id="disabledinput" placeholder="address">
                                                                @if($errors->has('address'))
                                                                <li class="text">• {{$errors->first('address')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">Next of Kin:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control1 input-sm" name="kin_name" value ="{{$biodata->kin_name}}" id="disabledinput" placeholder="next of kin">
                                                                @if($errors->has('kin_name'))
                                                                <li class="text">• {{$errors->first('kin_name')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                                <div class="form-group">
                                                        <label for="smallinput" class="col-sm-2 control-label label-input-sm">Next of Kin Address:</label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control1 input-sm" name="kin_address" value ="{{$biodata->kin_address}}" id="disabledinput" placeholder="email">
                                                                @if($errors->has('kin_address'))
                                                                <li class="text">• {{$errors->first('kin_address')}}</li>
                                                                @endif
                                                        </div>
                                                </div>
                                            
                                            <div class="form-group">
                                                <div style="text-align: center;">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                </div>
                                             </div>

                                        </form>
                                </div>
			</div>
					
  </div>
 
 </div> 

@endforeach

@endsection