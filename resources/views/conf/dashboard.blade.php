@extends('layout.pg-main-frame')

@section('title', 'Dashboard')


@section('page-content')
<div>
     	<!-- Quick starts -->
        @include('layout.pg-stats')
          
     
      <div class="content_bottom">
           <div class="col-md-4 span_3">
		 <div class="col_2">
		 
		 <div class="box_1">
		   <div class="col-md-6 col_1_of_2 span_1_of_2">
                    <a href="{{url('pg/forms/generate')}}" class="tiles_info">
			    <div class="tiles-head fb1">
			        <div class="text-center">Forms</div>
			    </div>
			    <div class="tiles-body fb2" style="font-size: 25px;">Generate</div>
			 </a>
		   </div>
		   <div class="col-md-6 col_1_of_2 span_1_of_2">
              <a href="{{url('pg/forms/view')}}" class="tiles_info tiles_blue">
			    <div class="tiles-head tw1">
			        <div class="text-center">Forms</div>
			    </div>
			    <div class="tiles-body tw2" style="font-size: 25px;">View</div>
			  </a>
		   </div>
		   <div class="clearfix"> </div>
		   </div>
		  </div>
		  <div class="cloud">
			<div class="cal1 cal_2"><div class="clndr"><div class="clndr-controls"><div class="clndr-control-button"><p class="clndr-previous-button">previous</p></div><div class="month">July 2015</div><div class="clndr-control-button rightalign"><p class="clndr-next-button">next</p></div></div><table class="clndr-table" border="0" cellspacing="0" cellpadding="0"><thead><tr class="header-days"><td class="header-day">S</td><td class="header-day">M</td><td class="header-day">T</td><td class="header-day">W</td><td class="header-day">T</td><td class="header-day">F</td><td class="header-day">S</td></tr></thead><tbody><tr><td class="day adjacent-month last-month calendar-day-2015-06-28"><div class="day-contents">28</div></td><td class="day adjacent-month last-month calendar-day-2015-06-29"><div class="day-contents">29</div></td><td class="day adjacent-month last-month calendar-day-2015-06-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-01"><div class="day-contents">1</div></td><td class="day calendar-day-2015-07-02"><div class="day-contents">2</div></td><td class="day calendar-day-2015-07-03"><div class="day-contents">3</div></td><td class="day calendar-day-2015-07-04"><div class="day-contents">4</div></td></tr><tr><td class="day calendar-day-2015-07-05"><div class="day-contents">5</div></td><td class="day calendar-day-2015-07-06"><div class="day-contents">6</div></td><td class="day calendar-day-2015-07-07"><div class="day-contents">7</div></td><td class="day calendar-day-2015-07-08"><div class="day-contents">8</div></td><td class="day calendar-day-2015-07-09"><div class="day-contents">9</div></td><td class="day calendar-day-2015-07-10"><div class="day-contents">10</div></td><td class="day calendar-day-2015-07-11"><div class="day-contents">11</div></td></tr><tr><td class="day calendar-day-2015-07-12"><div class="day-contents">12</div></td><td class="day calendar-day-2015-07-13"><div class="day-contents">13</div></td><td class="day calendar-day-2015-07-14"><div class="day-contents">14</div></td><td class="day calendar-day-2015-07-15"><div class="day-contents">15</div></td><td class="day calendar-day-2015-07-16"><div class="day-contents">16</div></td><td class="day calendar-day-2015-07-17"><div class="day-contents">17</div></td><td class="day calendar-day-2015-07-18"><div class="day-contents">18</div></td></tr><tr><td class="day calendar-day-2015-07-19"><div class="day-contents">19</div></td><td class="day calendar-day-2015-07-20"><div class="day-contents">20</div></td><td class="day calendar-day-2015-07-21"><div class="day-contents">21</div></td><td class="day calendar-day-2015-07-22"><div class="day-contents">22</div></td><td class="day calendar-day-2015-07-23"><div class="day-contents">23</div></td><td class="day calendar-day-2015-07-24"><div class="day-contents">24</div></td><td class="day calendar-day-2015-07-25"><div class="day-contents">25</div></td></tr><tr><td class="day calendar-day-2015-07-26"><div class="day-contents">26</div></td><td class="day calendar-day-2015-07-27"><div class="day-contents">27</div></td><td class="day calendar-day-2015-07-28"><div class="day-contents">28</div></td><td class="day calendar-day-2015-07-29"><div class="day-contents">29</div></td><td class="day calendar-day-2015-07-30"><div class="day-contents">30</div></td><td class="day calendar-day-2015-07-31"><div class="day-contents">31</div></td><td class="day adjacent-month next-month calendar-day-2015-08-01"><div class="day-contents">1</div></td></tr></tbody></table></div></div>
		  </div>
		</div>
          
                <div class="col-md-8 span_4">
                    <div class="pg_dash_scrollbar" id="style-2">
                            <div class="bs-example1" data-example-id="contextual-table">
		    <table class="table">
		      <thead>
		        <tr>
		          <th>#</th>
		          <th>Type</th>
		          <th>Date</th>
		          <th>Remarks</th>
		        </tr>
		      </thead>
		      <tbody>
                        <tr class="success">
		          <th scope="row">1</th>
		          <td>Proposal</td>
		          <td>12/03/2018</td>
		          <td>Proceed</td>
		        </tr>
		        <tr class="active">
		          <th scope="row">2</th>
		          <td>progress</td>
		          <td>15/03/2018</td>
		          <td>Approved</td>
		        </tr>
		        
		        <tr class="info">
		          <th scope="row">3</th>
		          <td>Progress</td>
		          <td>20/03/2018</td>
		          <td>Change topic</td>
		        </tr>
		       
		        <tr class="warning">
		          <th scope="row">4</th>
		          <td>Internal</td>
		          <td>20/03/2018</td>
		          <td>Repeat</td>
		        </tr>
		        <tr>
		          <th scope="row">5</th>
		          <td>External</td>
		          <td>20/04/2018</td>
		          <td>Pending</td>
		        </tr>
		        
		      </tbody>
		    </table>
		   </div>
                        </div>
                      </div>
	  
        <div class="clearfix"> </div>
    </div>
           
            
  </div>          
@endsection