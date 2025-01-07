<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class MemberModel extends Model
{
    use HasFactory;

    protected $table = 'tour_member'; 

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getMember($id){

        $return= self::select('tour_member.*');
        $return=$return->orderBy('id', 'asc')
        ->where('tour_member.tour_id', '=', $id)
        ->paginate(20);
        return $return;
    }

    public function getProfileDirect() {
        if(!empty($this->profile_pic) && file_exists('upload/member/'.$this->profile_pic)){
            return url('upload/member/' .$this->profile_pic);

        }else{
            return url('upload/profile/dummy_profile.webp');
        }
        
    }

    public function getProfile() {
        if(!empty($this->profile_pic) && file_exists('upload/member/'.$this->profile_pic)){
            return url('upload/member/' .$this->profile_pic);

        }else{
            return "";
        }
        
    }
    
}
