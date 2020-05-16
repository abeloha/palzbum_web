<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller {

        public function __construct()
	{
                $this->middleware('auth');
                $this->middleware('admin');
                //$this->middleware('group');
	}
    
	/**
        * Responds to requests to GET /pg
        */
        public function getIndex()
        {
           return view('admin.generate');
        }
        
        public function getCode($type='')
        {
            if($type == 'generate'){
                return view('admin.generate');
            }
            
            return 'unauthorised';
        }
        
        public function getView($group_name)
        {
           $codes = $this->get_codes_by_name($group_name);
           return view('admin.view',['codes'=>$codes]);
        }
        
        public function postGenerate(Request $request)
        {
           $this->validate($request,[
            'group_name'=>'required|unique:activation_key',
            'quantity'=>'required|numeric'
            ]);
           
            $name     = $request->input('group_name'); 
            $quantity = $request->input('quantity'); 
            
            for($i =0; $i<$quantity; $i++){
              $datestamp =  time();
                $str1 = substr($datestamp, 2, 4);
                $str2 = substr($datestamp, 8, 3);
                $s1 =  str_pad($str1+$str2, 4, '0');
                $padd = str_pad(rand(3,99), 2, '0').str_pad(rand(11,99), 2, '0');
                $code = '25'.$s1.$padd;
                $lastId = DB::table('activation_key')->insertGetId(["group_name"=> $name,"code"=>$code]);
              }
            return redirect('/admin/view/'.$name);
            
        }
        
       public function get_codes_by_name($group_name, $all = 0){
           $codes = DB::select('select * from activation_key where group_name = ? AND (member_id = 0 OR member_id = NULL)', [$group_name]);
           return $codes;
       }


       /**
        * ADDED
        */
}
