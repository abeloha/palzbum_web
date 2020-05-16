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
use Response;
header("Access-Control-Allow-Origin: *");
class ApiController extends Controller {

        public function __construct()
        {}
    
	/**
        * Responds to requests to GET /pg
        */
        public function getIndex()
        {
           return Response::json([
                        'status' => 'success',
                        'version' => '1.0',
			'Developed' => 'Abel Onuoha',
                        'Date' => 'Feb - 22 - 2019'
                 ], 200);
        }
        
        public function getLogin() //api/login/email/password
        {
            $email = $_GET['email'];
            $password = $_GET['password'];
            $app_version = $_GET['app_version'];
            if (Auth::attempt(['email' => $email, 'password' => $password])){
               $id = get_id();
               
               DB:: insert('insert into app_login (user_id, version) value(?,?)', [$id, $app_version]); 
                            
               return Response::json([
                        'status' => 'success',
                        'userId' => $id
                 ], 200);
            }
           
            return Response::json([
                        'status' => 'failed',
                        'message' => 'Unable to sign in. Please check your account information and try again.',
                        'userId' => 0
                 ], 200);
        }
        
        public function getGroups() 
        {
          $user_id = $_GET['user_id'];
          $app_version = $_GET['app_version'];
          $groups = DB::select('select groups.*, group_member.group_id, group_member.id as member_id from groups inner join group_member where groups.id = group_member.group_id AND group_member.user_id = ?', [$user_id]);
          if($groups){
               $r = array('success'=> '1', 'result' => $groups);
                //return $groups;
               return Response::json([
                   'status' => 'success',
                   'message' => 'Groups have been found',
                   'data' => $groups
               ], 200);
           }
           
           return Response::json([
                   'status' => 'failed',
                   'message' => 'You belong to no group yet. Vist www.palzbum.com to connect with your pals in a group first.',
                   'data' => []
            ], 200);
        }
        
        public function getPalz() 
        {
        $app_version = $_GET['app_version'];
        $group_member_id = $_GET['group_member_id'];
        $exclude_group_member_id = $_GET['exclude_group_member_id'];
        
        $group_id = 0;
        $user_id = 0;
        $data = DB::selectOne('select group_member.user_id, group_member.is_approved, groups.auto_activate_user, group_member.group_id from group_member inner join groups where groups.id = group_member.group_id AND group_member.id = ?', [$group_member_id]);
        if($data){
            if($data->auto_activate_user || $data->is_approved){
                 $group_id = $data->group_id;
                 $user_id =  $data->user_id;
            }else{
                return Response::json([
                        'status' => 'failed',
                        'group_id' => 0,
                        'message' => 'You are yet to activate your account for this group. Visit www.palzbum.com to activate your account.',
                        'data' => []
                 ], 200);
            }
        }
        
        $palzA=[];
        //$idArry = array(1,2,3,4,5,6,7,8,9);
        //$idImplode = implode(',', $exclude_group_member_id);`
        $idArryS = '(0)';
        if($exclude_group_member_id){
            $idArryS = '('.$exclude_group_member_id.')';
        }
        
        $palz = DB::select('select group_member.id as group_member_id, group_member.group_id as group_id, profile.* from group_member inner join profile where group_member.group_id = ? AND profile.group_member_id = group_member.id AND group_member.id NOT IN '.$idArryS.' ORDER BY group_member.id ASC', [$group_id]);
        if($palz){
            $ret_id = array();
            foreach($palz as $pal){
                $user_data = get_user_details($pal->user_id);
                $pal->{'phone'} = $user_data->phone;
                $pal->{'email'} = $user_data->email;
                $pal->{'address'} = $user_data->address;
                $pal->{'dob'} = $user_data->dob;
                $pal->{'gender'} = $user_data->gender;
                
                if($pal->profile_img){
                    $img = get_photo_name($pal->profile_img);
                    if($img){
                        $pal->profile_img = $img;
                    }
                }
                $interest = $this->excGetInterst($pal->user_id);
                $pal->{'interest'} = $interest;
                array_push($palzA, $pal);
                array_push($ret_id, $pal->{'group_member_id'});
            }
            
            //$returned_id = '';`
            $returned_id = implode(',', $ret_id);
                
            DB:: insert('insert into app_sync (user_id, version, exclude_id, returned_id) value(?,?,?,?)', [$user_id, $app_version, $exclude_group_member_id, $returned_id]); 
            
             return Response::json([
                 'total_number' => count($palz),
                 'status' => 'success',
                 'group_id' => $group_id,
                 'message' => 'Group has been synchronized',
                 'data' => $palzA
             ], 200);
         }
           
           return Response::json([
                   'status' => 'failed',
                   'group_id' => 0,
                   'message' => 'No new member for synchronization is found for this group',
                   'data' => []
            ], 200);
        }
        
        private function excGetInterst($user_id){
            $res = '';
            $interests = DB::select('select interest.*, interest_type.name from interest INNER JOIN interest_type WHERE interest_type.id = interest.interest_type_id AND interest.user_id = ?', [$user_id]);
                if($interests){
                    $intr = array();
                   foreach($interests as $interest){
                       array_push($intr, $interest->name);
                   } 
                   $res = implode(', ',$intr);
                }

                return $res;
        }
        
        public function getAlbum() 
        {
          $group_id = $_GET['group_id'];
          $app_version = $_GET['app_version'];
          $exclude_album_id = $_GET['exclude_album_id'];
          
        $idArryS = '(0)';
        if($exclude_album_id){
            $idArryS = '('.$exclude_album_id.')';
        }
          $album = DB::select('select * from album where is_deleted = 0 AND group_id = ? AND id NOT IN '.$idArryS.' ORDER BY id ASC', [$group_id]);
          if($album){
              $n = count($album);
               return Response::json([
                   'total_number' => $n,
                   'status' => 'success',
                   'message' => $n.' Albums have been found',
                   'data' => $album
               ], 200);
           }
           
           return Response::json([
                   'status' => 'failed',
                   'message' => 'No new album found for synchronizing.',
                   'data' => []
            ], 200);
        }
        
        public function getPhoto() 
        {
          $app_version = $_GET['app_version'];
          $group_member_id = $_GET['group_member_id'];
          $exclude_photo_id = $_GET['exclude_photo_id'];
          
        $idArryS = '(0)';
        if($group_member_id){
            $idArryS = '('.$group_member_id.')';
        }
        
        $photoArryS = '(0)';
        if($exclude_photo_id){
            $photoArryS = '('.$exclude_photo_id.')';
        }
        $photo = DB::select('select * from photo where id NOT IN '.$photoArryS.' AND group_member_id IN '.$idArryS.' ORDER BY id ASC', []);
        if($photo){   
            $n = count($photo);
             return Response::json([
                 'total_number' => $n,
                 'status' => 'success',
                 'message' => $n.' Photos have been found',
                 'data' => $photo
             ], 200);
         }
           
           return Response::json([
                   'status' => 'failed',
                   'message' => 'No new photo found for synchronizing.',
                   'data' => []
            ], 200);
        }
        
        public function getTest(){}
        
}
