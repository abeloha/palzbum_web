<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Http\Request;

class GroupController extends Controller {

        public function __construct()
	{
                $this->middleware('auth');
	}
    
	/**
        * Responds to requests to GET /pg
        */
        public function getIndex()
        {
           $groups = get_my_groups();
           
           if (count($groups) == 1){
               foreach($groups as $group){
                   return redirect('/group/select/'.$group->name);
               }
           }elseif (count($groups) > 1){
               return view('group_select',['groups'=>$groups]);
           }
           return view('group_join');
        }
        
        public function getSelect(Request $request, $name='')
        {
           if($name){
               $id = get_id();
               $groups = DB::selectOne('select groups.id as id, group_member.group_id, group_member.id as member_id from groups inner join group_member where groups.id = group_member.group_id AND group_member.user_id = ? AND groups.name = ?', [$id, $name]);
               if($groups){
                   $this->createSession($request, $groups->member_id, $groups->id);
                   return redirect('/palz');
                }
           }
           $groups = get_my_groups();
           return view('group_select',['groups'=>$groups]);
            
        }
        
        private function createSession(Request $request, $member_id, $group_id){
           $request->session()->put('member_id', $member_id);
           $request->session()->put('group_id', $group_id);
        }
        
        public function getJoin()
        {
           
           return view('group_join');
            
        }
        
        public function getCreate()
        {
           
           return view('group_create');
            
        }
        
        public function postJoin(Request $request)
        {
           $this->validate($request,[
            'groupName'=>'required'
            ]);
            $name     = $request->input('groupName'); 
            
            $group = get_group_data_by_name($name, 1);
           //return var_dump($groups);
            if ($group){
               return view('group_select_join',['group'=>$group]);
            }
            return redirect('/group/join?e='.my_encode($name.' group does not exist or has not been activated. Select create group from the menu for more options.'));
            
        }

        public function getJselect(Request $request, $name='')
        {
           
            $id = get_group_id_by_name($name, 1);
            if($id){
                $user_id = get_id();                
                JCGroup($request,$id);              
                return redirect('/palz');
            }
            return redirect('/group/join?e='.my_encode($name.' group does not exist or has not been activated. Select create group from the menu for more options.'));
            
        }

        public function postCreate(Request $request)
        {
           $this->validate($request,[
            'name'=>'required|unique:groups'
            ]);
            $name     = $request->input('name'); 
                $groupId = DB::table('groups')->insertGetId(["name"=> $name]);
                if($groupId){
                  JCGroup($request,$groupId);    
                  return redirect('/palz');
                }else{
                  return redirect('/group/create?e='.my_encode($name.' group cannot be created at the moment, ensure your group name is unique.'));
            
                }
                
        }
        
        public function getAlbum()
        {
           return view('palz.album');
            
        }
        
        public function getProfile($user = 0)
        {
            if(!$user)
                return redirect('/me');
                
           //return view('palz.profile');
           return view('profile.profile',['data'=>$type]);
            
        }
        
        public function getTest()
        {
          return 'mID = '.get_member_id().'gID = '.get_group_id();
            
        }
        
        /**
        * ADDED
        */
}
