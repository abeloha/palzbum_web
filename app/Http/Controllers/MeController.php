<?php 
namespace App\Http\Controllers;


use App\Classes\ImageManipulator;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;

//for redirect
use Illuminate\Support\Facades\Redirect;

class MeController extends Controller {

        public function __construct()
	{
                $this->middleware('auth');
				$this->middleware('group');
	}
    
	/**
        * Responds to requests to GET /pg
        */
        public function getIndex()
        {
           $profile_id = get_member_id();
           
           return view('profile.profile',['profile_id'=>$profile_id,'data'=>'basic']);
        }
        
        public function getBasic()
        {
           $profile_id = get_member_id();
           
           return view('profile.profile',['profile_id'=>$profile_id,'data'=>'basic']);
        }
        
        public function getEdu()
        {
          $profile_id = get_member_id();
           
           return view('profile.profile',['profile_id'=>$profile_id,'data'=>'edu']);
        }
        
        public function getWork()
        {
          $profile_id = get_member_id();
           
           return view('profile.profile',['profile_id'=>$profile_id,'data'=>'work']);
        }
        
        public function getInterest()
        {
           $profile_id = get_member_id();
           
           return view('profile.profile',['profile_id'=>$profile_id,'data'=>'interest']);
        }
        
        public function getSecurity()
        {
           $profile_id = get_member_id();
           
           return view('profile.profile',['profile_id'=>$profile_id,'data'=>'security']);
        }
        
        public function getAlbumcreate()
        {
            return view('profile.album_create');
        }
        
        public function postAlbumcreate(Request $request)
        {
            
           $this->validate($request,[
            'albumName'=>'required'
            ]);
           
            $name     = $request->input('albumName'); 
            $group_id = get_group_id();
            $id = get_member_id();
            $albums = DB::selectOne('select id from album where name = ? AND group_id = ?', [$name, $group_id]);  
            
                if($albums){
                    return redirect('/me/albumcreate?e='.my_encode('The album you entered already exists.'));
                }else{
                     DB:: insert('insert into album (name, group_id, group_member_id) value(?,?,?)', [$name, $group_id, $id]);
                }                
                return redirect('/me/albumcreate');
        }
        
        
        public function getUpload($album_id = 0)
        {
            
           if(!get_profile_id()){
               return redirect('me/create?e='.my_encode('Create profile for your group first before uploading images'));
           }
            
            if($album_id){
                $album_id = my_decode($album_id);
            }
           return view('profile.profile_upload',['album_id'=>$album_id]);
        }
		
        public function postUpload(Request $request) 
            {
            
               $name = '';
                $this->validate($request,[
                        'description'      =>'max:60',                      
                 ]);
                $f = 0; $s = 0;
                $destination = 'img/uploads/';
                $description     = $request->input('description');
                $album_id     = $request->input('album_id');
                $ext_array = array("jpeg","jpg","bmp","png","JPEG","JPG","BMP","PNG");
                    
                    $files = Input::file('file');
                    foreach($files as $file) {
                        $extension = $file->getClientOriginalExtension();
                        if (in_array($extension,$ext_array)){
                            $name = get_group_id().'_'.$album_id.'_'.  get_id().'_'.strtotime(date('d-m-y h:i:s')).rand(10,40).'.'.$extension;


                        $manipulator = new ImageManipulator($file->getPathName());
                        $newImage = $manipulator->resample(1080,1080,TRUE);
                        // saving file to uploads folder
                        $manipulator->save(public_path().'/' . $destination . $name);

                            //$file->move(public_path().'/'.$destination.'/',$name);
                            DB:: insert('insert into photo (group_member_id, album_id, name, description) value(?,?,?,?)', [get_member_id(), $album_id, $name, $description]); 
                            $s++;
                        }else{
                            $f++;
                        }
                    }
                    
                        
                     if($f){
                         return Redirect::back()->withInput();
                     }
                    return redirect('me/upload/'.  my_encode($album_id)); 
            } 
        
        public function getChange($type = '', $id = 0, $album_id = 0)
        {
            $mid = get_member_id();
            
            if($id){
                $id = my_decode($id);
            }
            $date = date('Y-m-d H:i:s');
            
            if($type == 'dp' && $id){
               DB:: update('update profile set profile_img = ?, date_updated = ? where group_member_id = ?', [$id,$date, $mid]);
            }elseif($type == 'cp' && $id){
               DB:: update('update profile set cover_img = ?, date_updated = ? where group_member_id = ?', [$id,$date, $mid]);
            }
            
            if($album_id){
                $album_id = my_decode($album_id);
            }
           return view('profile.profile_upload',['album_id'=>$album_id]);
        }
        
        
        /**
        * Handling Post
        */
        
        public function postBasic(Request $request)
        {
               
             $this->validate($request,[
                'surname'      =>'required|alpha',
                'firstName'    =>'required|alpha',
                'email'        =>'required|email:users',
                'phone'        =>'required|numeric:users',
                'address'    =>'required',
                'dob'     =>'required|date',
                'country'    =>'alpha',
         ]);

         $surname     = $request->input('surname');   
         $firstname     = $request->input('firstName');
         $email         = $request->input('email'); 
         $phone         = $request->input('phone');
         $address         = $request->input('address');
         $dob1        = $request->input('dob');
         $dob           =date('Y-m-d', strtotime($dob1));
         $city     = $request->input('city');
         $country         = $request->input('country');
         $about      = $request->input('about');


         $classCrush       = $request->input('classCrush');   
         $bestLecturer     = $request->input('bestLecturer');
         $languagesSpoken     = $request->input('languagesSpoken');
         $bestFood         = $request->input('bestFood');
         $philosophy      = $request->input('philosophy');
         $partingWords      = $request->input('partingWords');

         $date = date('Y-m-d H:i:s');
         DB:: update('update users set date_updated = ?, phone = ?, email = ?, country = ?, city = ?, dob = ?, address = ? where id = ?', [$date, $phone,$email,$country,$city,$dob,$address,Auth::id()]);
         DB:: update('update profile set date_updated = ?, surname = ?, firstname = ?, about = ?, classCrush = ?, bestLecturer = ?, languagesSpoken = ?, bestFood = ?,philosophy = ?, partingWords = ? where group_member_id = ?', [$date, $surname,$firstname,$about,$classCrush, $bestLecturer, $languagesSpoken,$bestFood,$philosophy, $partingWords,get_member_id()]);
         return redirect('me/basic');  
        }
        
        public function postEducation(Request $request)
        {
               
            $this->validate($request,[
                'school'      =>'required',
                'from'    =>'required',
                'to'        =>'required',
                'description'        =>'required',
         ]);

         $school     = $request->input('school');   
         $from     = $request->input('from');
         $to         = $request->input('to'); 
         $description         = $request->input('description');
         $date = date('Y-m-d H:i:s');
         DB:: update('update education set date_updated = ?, name = ?, date_from = ?, date_to = ?, description = ? where user_id = ?', [$date, $school,$from,$to,$description,Auth::id()]);
         return redirect('me/edu');
        }
        
        public function postWork(Request $request)
        {  
            $this->validate($request,[
                'company'      =>'required',
                'designation'    =>'required',
                'from'        =>'required',
                'to'        =>'required',
                'description'    =>'required',
         ]);

         $company     = $request->input('company');   
         $designation     = $request->input('designation');
         $from         = $request->input('from'); 
         $to         = $request->input('to'); 
         $description        = $request->input('description');
         $date = date('Y-m-d H:i:s');
         DB:: update('update work set date_updated = ?, company = ?, date_from = ?, date_to = ?, description = ?, designation = ? where user_id = ?', [$date, $company,$from,$to,$description,$designation,Auth::id()]);
        return redirect('me/work');
       
        }
        
        public function postInterest(Request $request)
        {
               
            $this->validate($request,[
                'interest'      =>'required',
         ]);

         $interest     = $request->input('interest');
        
            DB:: insert('insert into interest (user_id, interest_type_id) value(?,?)', [Auth::id(), $interest]); 
            return redirect('me/interest');
        
        }
        
        public function postSecurity(Request $request)
        {
               
            $this->validate($request,[
                'oldPassword'      =>'required',
                'password'      =>'required',
                'confirmPassword'      =>'required',
         ]);

         $oldPassword     = $request->input('oldPassword');
         $password     = $request->input('password');
         $confirmPassword     = $request->input('confirmPassword');
        
            return '1';
        
        }
		
		     //Abel 23/10/2018
        
        public function getCreate(Request $request)
        {
            return view('profile.profile',['data'=>'create']);
        }
        
        public function getActivate(Request $request)
        {
            return view('profile.profile',['data'=>'activate']);
        }
        
        public function postCreate(Request $request)
        {
            $id = get_member_id();
            if(!$id){
                return redirect('/group');
            }
               
             $this->validate($request,[
                'surname'      =>'required|alpha|max:15',
                'firstName'    =>'required|alpha|max:15',
         ]);
         
         $surname       = $request->input('surname');   
         $firstname     = $request->input('firstName');
         $othername     = $request->input('otherName');
         $quote         = $request->input('quote');
         $about      = $request->input('about');

         $classCrush       = $request->input('classCrush');   
         $bestLecturer     = $request->input('bestLecturer');
         $languagesSpoken     = $request->input('languagesSpoken');
         $bestFood         = $request->input('bestFood');
         $philosophy      = $request->input('philosophy');
         $partingWords      = $request->input('partingWords');
         
         $data = DB::selectOne('select id from profile where group_member_id = ?', [$id]);  
         if(!$data){
             $user_id = get_id();
            $lastId = DB::table('profile')->insertGetId(["user_id"=> $user_id, "surname"=> $surname,"firstname"=>$firstname,"othername"=> $othername,"group_member_id"=>$id, "about"=> $about, "quote"=> $quote,"classCrush"=>$classCrush,"bestLecturer"=> $bestLecturer,"languagesSpoken"=>$languagesSpoken, "bestFood"=> $bestFood, "philosophy"=> $philosophy, "partingWords"=> $partingWords]);
         }
         return redirect('me/basic');  
        }
        
        public function postActivate(Request $request)
        {
            $id = get_member_id();
            if(!$id){
                return redirect('/group');
            }
               
             $this->validate($request,[
                'activationKey'      =>'required',
         ]);
         
         $activationKey = $request->input('activationKey');
         $date_used = date('Y-m-d');
         $data = DB::selectOne('select id, member_id from activation_key where code = ?', [$activationKey]);  
         if($data){
            if($data->member_id){
                return redirect('me/activate?e='.my_encode($activationKey.' has already been used.'));
            }
            
            DB:: update('update group_member set is_approved = 1, key_id = ? where id = ?', [$data->id, $id]);
            DB:: update('update activation_key set member_id =?, date_used = ? where code = ?', [$id,$date_used,$activationKey]);
            return redirect('me/activate');
         }
         return redirect('me/activate?e='.my_encode($activationKey.' is invalid.'));
        }

	  
}
