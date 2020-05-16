<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use DB;
use Auth;

class LandingController extends Controller {
    
    
    public function index(Request $request) 
    {
        
       //test session
        if ($request->session()->has('userId')) {
            return redirect('/home');  
        }
        
        return view('index');
        
    }
    
    public function newuser(Request $request) 
    {
      //test session
        return view('login',['ln'=> 1]);
    }
    
    public function newregister(Request $request) 
    {
        //test session
       return view('login');
    }
    
    public function login(Request $request) 
    {
     
     $this->validate($request,[
         'email'=>'required',
         'password' =>'required'
     ]);
     $email      = $request->input('email'); 
     $password      = $request->input('password');
        return $this->excLogin($request, $email,$password);  
     }
    
    
    private function excLogin(Request $request, $email,$password){
        
         $request->session()->flush();
        
        if (Auth::attempt(['email' => $email, 'password' => $password])){
            return redirect('palz');
        }else{
            return redirect('/login?l=failed');
        }
    }
    
    public function register(Request $request) 
    {
     
     $this->validate($request,[
         'phone'    =>'required|numeric|unique:users',
         'email'        =>'required|email|unique:users',
         'password'    =>'required|min:6',
     ]);
     $email         = $request->input('email'); 
     $phone         = $request->input('phone');
     $pword         = $request->input('password');
     $password      = bcrypt($pword);
     //$dob        = $request->input('dateOfBirth');
     //$dob           =date('Y-m-d', strtotime($dob));  
     $lastId = DB::table('users')->insertGetId(["email"=> $email,"phone"=>$phone,"password"=>$password]);
     DB:: insert('insert into work (user_id) value(?)', [$lastId]);
     DB:: insert('insert into education (user_id) value(?)', [$lastId]);
     //DB:: insert('insert into profile (user_id) value(?)', [$lastId]);
     return $this->excLogin($request, $email,$pword); 
    }
    
    public function logout(Request $request) 
    {       
       Auth::logout();
       $request->session()->flush();
       return redirect('/');  
    }
    
    public function contact(Request $request)
    {
     
     $this->validate($request,[
         'name'=>'required',
         'subject' =>'required',
         'message' =>'required',
         'email'    =>'required|email',
         'phone'    =>'required|numeric',
     ]);
        
        
     $name     = $request->input('name');
     $subject      = $request->input('subject');
     $email         = $request->input('email'); 
     $phone         = $request->input('phone'); 
     $message      = $request->input('message');
        
     DB:: insert('insert into contact (name, subject, email, phone, message) value(?,?,?,?,?)', [$name, $subject, $email, $phone, $message]);
     return redirect('/?info=success#contactUs');  
    }
    
    public function group($name = '') 
    {
       if($name){
           $group_id = get_group_id_by_name($name);
           return view('palz', ['palzname'=>$name, 'group_id'=>$group_id]);
       }else{
           return view('index');
       }
    }
    
     public function test()
        {
           
          
         return 'mID = '.get_member_id().'gID = '.get_group_id();
            
        }
       

}
