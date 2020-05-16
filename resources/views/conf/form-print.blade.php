@extends('layout.conf-print-frame')

@section('title', 'Dashboard')


@section('page-content')
 @foreach ($biodatas as $biodata)

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
      
      <div class="well1 white" id="dataForm">
          <div class="col-md-12">
                  <img style="width:100%; height:auto; margin-top: -18px; margin-left:-18px;" src="{{asset('images/header.png')}}" />
	</div>
          
          <h3>{{$biodata->regno}}/{{get_student_rank_name($biodata->rank)}}</h3>
         
                        <div class="tab-content">
                                <div class="tab-pane active" id="horizontal-form">
                                    <form class="form-horizontal">
                                         
                                        <h4><u>Academic details</u></h4>
                                        
                                                <div class="form-group">
                                                    
                                                <div class="col-sm-8">    
                                                    <div class="col-sm-12">
                                                        <label for="disabledinput" class="col-sm-4 control-label">Surname:</label>
                                                        <div class="col-sm-8">
                                                            <label class="control-label">{{$biodata->surname}} </label>
                                                        </div>
                                                    </div>    
                                                    
                                                    <div class="col-sm-12">
                                                         <label for="disabledinput" class="col-sm-4 control-label">First Name:</label>
                                                         <div class="col-sm-8">
                                                        <label class="control-label">{{$biodata->firstname}} </label>
                                                         </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-12">
                                                         <label for="disabledinput" class="col-sm-4 control-label">Program:</label>
                                                        <div class="col-sm-8">
                                                        <label class="control-label">{{$ranks->title}} </label>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                   
                                                <div class="col-sm-4"> 
                                                    <div style="width:150px; height:150px; border:solid black; margin-top:-40px;">
                                                        <img style="width:100%; height:100%;" src="{{asset(get_profile_pix())}}" />
                                                    </div> 
                                                </div>
                                                    
                                                </div>
                                                
                                        
                                         <div class="well">
                                            <h4><u>Research Area</u></h4>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Research Topic:</label>
                                                <div class="col-sm-8">
                                                    <label class="control-label">{{$topic}}</label>
                                                </div>
                                            </div>
                                              <div class="form-group">
                                                <label class="col-sm-2 control-label">Research Area:</label>
                                                <div class="col-sm-8">
                                                    <label class="control-label">{{$area}}</label>
                                                </div>
                                               </div>
                                         </div>
                                            <div class="form-group" style="border:solid black;">
                                                    <div class="col-sm-6" style="border-right:solid black;">
                                                    <h4><u>Basic details</u></h4>
                                                        <div class="form-group">
                                                                <label for="smallinput" class="col-sm-3 control-label label-input-sm">Gender:</label>
                                                                <div class="col-sm-7">
                                                                    <label class="control-label">{{$biodata->gender}}</label>
                                                                </div>
                                                        </div>

                                                        <div class="form-group">
                                                                <label for="smallinput" class="col-sm-3 control-label label-input-sm">Date of Birth:</label>
                                                                <div class="col-sm-7">
                                                                    <label class="control-label">{{$biodata->dob}}</label>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="smallinput" class="col-sm-3 control-label label-input-sm">State of Origin:</label>
                                                                <div class="col-sm-7">
                                                                    <label class="control-label">{{$biodata->state}}</label>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="smallinput" class="col-sm-3 control-label label-input-sm">Local Gov. Area:</label>
                                                                <div class="col-sm-7">
                                                                    <label class="control-label">{{$biodata->lga}}</label>
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="smallinput" class="col-sm-3 control-label label-input-sm">Nationality:</label>
                                                                <div class="col-sm-7">
                                                                    <label class="control-label">{{$biodata->country}}</label> 
                                                                </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-sm-6">
                                                    <h4><u>Contact details</u></h4>
                                                        <div class="form-group">
                                                                <label for="smallinput" class="col-sm-3 control-label label-input-sm">email</label>
                                                                <div class="col-sm-7">
                                                                   <label class="control-label">{{$biodata->email}}</label>    
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="smallinput" class="col-sm-3 control-label label-input-sm">Phone</label>
                                                                <div class="col-sm-7">
                                                                    <label class="control-label">{{$biodata->phone}}</label> 
                                                                </div>
                                                        </div>
                                                        <div class="form-group">
                                                                <label for="smallinput" class="col-sm-3 control-label label-input-sm">Contact Address:</label>
                                                                <div class="col-sm-7">
                                                                   <label class="control-label">{{$biodata->address}}</label>     
                                                                </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </form>
                                </div>
			</div>
					
  

      </div>
    </div>
    
 </div>  
 
 @endforeach
 
 
 <script type="text/javascript">
     
    jQuery(document).ready(function($) {
            window.print();
    });
</script>
 
@endsection