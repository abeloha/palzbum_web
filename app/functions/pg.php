<?php
use App\Http\Requests;
use Illuminate\Http\Request;

//$lastId = DB::table('group_member')->insertGetId(["user_id"=> $user_id,"group_id"=>$id]);
                    
function my_encode($input)
{
    return base64_encode($input);
}
function my_decode($input)
{
    return base64_decode($input);
}
function my_substring($string, $lenght){
    if (strlen($string) > $lenght)
        $string = substr($string, 0, $lenght-5).'...';
    return $string;
}

function get_group_id(){
    return session('group_id');
}

function get_member_id(){
    //return 1;
    return session('member_id');
}

function get_profile_id(){
        $id = get_member_id();
	$data = DB::selectOne('select id from profile WHERE group_member_id = ?', [$id]);
	if($data){
		return $data;
	}
	return 0;
}

function get_id(){
    return Auth::user()->id;
}
function JCGroup(Request $request,$id){
    $user_id = get_id();
    $groups = DB::selectOne('select id from group_member where user_id = ? AND group_id = ?', [$user_id, $id]);  
    if(!$groups){
        //DB:: insert('insert into group_member (user_id, group_id) value(?, ?)', [$user_id, $id]);
        $lastId = DB::table('group_member')->insertGetId(["user_id"=> $user_id,"group_id"=>$id]);
        createSession($request, $lastId, $id);

        
        //Auto Activate
        $memberCount = DB::table('group_member')->where("group_id", '=', $id)->count();
        if($memberCount < 11){
            DB:: update('update group_member set is_approved = 1, is_auto_activate = ? where id = ?', [$memberCount, $lastId]);
        }
        
        
    }else{
        //DB:: update('update profile set group_member_id = ? where user_id = ?', [$groups->id,Auth::id()]);
        createSession($request, $groups->id, $id);
    } 

}
function createSession(Request $request, $member_id, $group_id){
    $request->session()->put('member_id', $member_id);
    $request->session()->put('group_id', $group_id);
 }

function get_group_id_by_name($name, $approved = 0){
    
    if($approved){
        $groups = DB::selectOne('select id from groups where name = ? AND approved = 1', [$name]);
    }else{
        $groups = DB::selectOne('select id from groups where name = ?', [$name]);
    }
    
    if($groups){
        return $groups->id;
    }
    return 0;
}

function get_group_name_by_id($id, $approved = 0){
    
    if($approved){
        $groups = DB::selectOne('select name from groups where id = ? AND approved = 1', [$id]);
    }else{
        $groups = DB::selectOne('select name from groups where id = ?', [$id]);
    }
    
    if($groups){
        return $groups->name;
    }
    return '';
}

function get_group_data_by_name($name, $approved = 0){
    
    if($approved){
        $groups = DB::selectOne('select groups.*, group_member.group_id, group_member.id as member_id from groups inner join group_member where groups.id = group_member.group_id AND groups.name = ? AND approved = 1', [$name]);
    }else{
        $groups = DB::selectOne('select groups.*, group_member.group_id, group_member.id as member_id from groups inner join group_member where groups.id = group_member.group_id AND groups.name = ?', [$name]);
    }
    
    return $groups;
}


function get_group_info_by_id($id = 0){
    if(!$id){
        $id = $id = get_group_id();
    }
    $group = DB::selectOne('select * from groups where id = ?', [$id]);     
    return $group;
}

function get_my_groups(){
    $id = get_id();
    $groups = DB::select('select groups.*, group_member.group_id, group_member.id as member_id from groups inner join group_member where groups.id = group_member.group_id AND group_member.user_id = ?', [$id]);
    return $groups;
}

function get_likes($id = 0)
{
    return 0;
}

function get_landing_photo_title($id = 0)
{
    return 'ABU - 2018';
}

function get_user_profile_header($id = 0)
{
    if ($id == 0){
        $id = get_member_id();
    }
    $data = DB::selectOne('select id, surname, firstname, cover_img, profile_img from profile WHERE group_member_id = ?', [$id]);
    return $data;
}

function get_profile_data_basic($id = 0)
{
    if ($id == 0){
        $id = get_member_id();
    }
    $data = DB::selectOne('select * from profile WHERE group_member_id = ?', [$id]);
    return $data;
}

function get_profile_firstname($id = 0)
{
    if ($id == 0){
        $id = get_member_id();
    }
    $data = DB::selectOne('select firstname from profile WHERE group_member_id = ?', [$id]);
    if($data->firstname){
        return $data->firstname;
    }
    return '';
}

function get_my_profile_img_id()
{
    $id = get_member_id();
    $data = DB::selectOne('select profile_img from profile WHERE group_member_id = ?', [$id]);
    if($data->profile_img){
        return $data->profile_img;
    }
    return 0;
}

function get_profile_data_education($id = 0)
{
    if ($id == 0){
        $id = Auth::user()->id;
    }
    $data = DB::selectOne('select * from education WHERE user_id = ?', [$id]);
    return $data;
}

function get_profile_data_work($id = 0)
{
    if ($id == 0){
        $id = Auth::user()->id;
    }
    $data = DB::selectOne('select * from work WHERE user_id = ?', [$id]);
    return $data;
}



//Dammy

function get_my_palz_from_my_group(){
    $id = get_group_id();
    $palz = DB::select('select group_member.id as group_member_id, profile.* from group_member inner join profile where group_member.group_id = ? AND profile.group_member_id = group_member.id ORDER BY profile.surname', [$id]);
    return $palz;
}

function get_user_details($id = 0)
{
    if ($id == 0){
        $id = Auth::user()->id;
    }
    $data = DB::selectone('select * from users WHERE id = ?', [$id]);
    return $data;
}

function get_user_id_by_group_member_id($id = 0)
{
    if ($id == 0){
        $id = Auth::user()->id;
    }
    $datas = DB::selectone('select user_id from group_member WHERE id = ?', [$id]);
    return $datas->user_id;
}

function get_all_interest($id = 0)
{
    $data = DB::select('select * from interest_type');
    return $data;
}

function get_profile_data_interest($id = 0)
{
    if ($id == 0){
        $id = Auth::user()->id;
    }
    $data = DB::select('select * from interest WHERE user_id = ?', [$id]);
    return $data;
}

function get_interest_icon($id)
{
    if($id == 1){
        return 'icon ion-android-bicycle';
    }elseif($id == 2){
        return 'icon ion-ios-camera';
    }elseif($id == 3){
        return 'icon ion-android-cart';
    }elseif($id == 4){
        return 'icon ion-android-restaurant';
    }elseif($id == 5){
        return 'icon ion-android-plane';
    }else{
        return 'icon ion-ios-camera';
    }
}

function get_interest_name($id)
{
    if($id == 1){
        return 'Bicycle';
    }elseif($id == 2){
        return 'Photography';
    }elseif($id == 3){
        return 'Shopping';
    }elseif($id == 4){
        return 'Eating';
    }elseif($id == 5){
        return 'Travelling';
    }else{
        return 'Photography';
    }
}

// 23/10/2018 Abel
function get_approval()
{
    $id = get_member_id();
    $data = DB::selectOne('select group_member.is_approved, groups.auto_activate_user from group_member inner join groups where groups.id = group_member.group_id AND group_member.id = ?', [$id]);
    if($data){
        if($data->auto_activate_user || $data->is_approved){
            return 1;
        }
    }
    return 0;
}

function get_group_albums(){
    $id = get_group_id();
    $data = DB::select('select * from album WHERE group_id = ? AND is_deleted = 0 ORDER BY name ASC', [$id]);
    return $data;
}

function get_album_name_by_id($id){
    if($id == 0){
        return 'others';
    }
    $data = DB::selectOne('select name from album WHERE id = ?', [$id]);
    if($data){
       return $data->name; 
    }
    return '';
}

function get_my_image_uploads($album_id = 0, $id = 0, $all = 0){
    if(!$id)
        $id = get_member_id();
    
    if($all)
        $data = DB::select('select * from photo WHERE group_member_id = ? ORDER BY id DESC', [$id]);
    else
        $data = DB::select('select * from photo WHERE album_id = ? AND group_member_id = ? ORDER BY id DESC', [$album_id,$id]);
    return $data;
}

function get_photo_name($id){
    $data = DB::selectOne('select name from photo WHERE id = ?', [$id]);
    if($data){
       return $data->name; 
    }
    return '';
}

function get_group_photos($id){
    $data = DB::select('select photo.*, album.id from photo inner join album where photo.album_id = album.id AND album.group_id = ?', [$id]);
    return $data;
}
function get_group_photos_all($id = 0){
    if(!$id)
        $id = get_group_id();
    $data = DB::select('select photo.*,group_member.id from photo inner join group_member where photo.group_member_id = group_member.id AND group_member.group_id = ?', [$id]);
    return $data;
}

function get_group_photos_others($id = 0){
    if(!$id)
        $id = get_group_id();
    $data = DB::select('select photo.*,group_member.id from photo inner join group_member where photo.group_member_id = group_member.id AND group_member.group_id = ? AND photo.album_id = 0', [$id]);
    return $data;
}

function get_album_imgs($album_id){
    $data = DB::select('select * from photo WHERE album_id = ? ORDER BY id DESC', [$album_id]);
    return $data;
}

function get_setting_change_dp(){
    $id = get_group_id();
    $data = DB::selectOne('select dp_change from groups WHERE id = ?', [$id]);
    if($data){
       return $data->dp_change; 
    }
    return 0;
}


function get_album_group_imgs($album_id){
    $id = get_group_id();
    $data = DB::select('select photo.*, group_member.id, group_member.group_id from photo inner join group_member where photo.group_member_id = group_member.id AND photo.album_id = ? AND group_member.group_id = ?', [$album_id, $id]);
    return $data;
}

function get_all_imgs($id){
    if($id == 0){
    $id = get_member_id();
    }
    $data = DB::select('select * from photo WHERE group_member_id = ? ORDER BY id DESC', [$id]);
    return $data;
}
?>
