<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Http\Request;

class PalzController extends Controller {

        public function __construct()
	{
                $this->middleware('auth');
                $this->middleware('group');
				//added 24/10/2018
                $this->middleware('profile');
                $this->middleware('approval');
                //end
	}
    
	/**
        * Responds to requests to GET /pg
        */
       public function getIndex()
        {
           return view('palz.index');
            
        }
        
        public function getAlbum($album_id = '')
        {
            if($album_id){
                if($album_id == 'others'){
                    $album_id = 0;
                }else{
                    $album_id = my_decode($album_id);
                }
                
                return view('palz.photos',['album_id'=>$album_id]);
            }
           return view('palz.album');
        }
        
        public function getPhotos($id = '')
        {
            if($id == ''){
                $id = get_member_id ();
            }else{
             $id = my_decode($id);
            }
           return view('palz.all-photos',['id'=>$id]);
        }
        
        public function getProfile($id,$type='')
        {
            $profile_id = my_decode($id);
            $user_id = get_user_id_by_group_member_id($profile_id);
            $profile_type = my_decode($type);
            if($profile_type == 1){
                $type = 'basic';
            }elseif($profile_type == 2){
                $type = 'edu';
            }else{
                $type = 'basic';
            }
           //return view('palz.profile');
           return view('palz.profile',['profile_id'=>$profile_id,'user_id'=>$user_id,'data'=>$type]);
            
        }
        
        
        
        /**
        * ADDED
        */
        /**
        * ADDED
        */
}
