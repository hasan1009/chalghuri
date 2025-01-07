<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;
class EmployeeModel extends Model
{

    use HasFactory;

    protected $table = 'employee'; 

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getEmployee(){

        $return= self::select('employee.*');
        if(!empty(Request::get('name'))){

            $return=$return->where('name', 'like','%'.Request::get('name').'%');

        }
        
        if(!empty(Request::get('mobile'))){

            $return=$return->where('mobile', 'like','%'.Request::get('mobile').'%');

        }

        if(!empty(Request::get('email'))){

            $return=$return->where('email', 'like','%'.Request::get('email').'%');

        }

        if(!empty(Request::get('id'))){

            $return=$return->where('id','=',Request::get('id'));

        }

       
        $return=$return->orderBy('id', 'asc')
        ->paginate(20);

        return $return;
    }

    public function getProfileDirect() {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic)){
            return url('upload/profile/' .$this->profile_pic);

        }else{
            return url('upload/profile/dummy_profile.webp');
        }
        
    }


    public function getProfile() {
        if(!empty($this->profile_pic) && file_exists('upload/profile/'.$this->profile_pic)){
            return url('upload/profile/' .$this->profile_pic);

        }else{
            return "";
        }
        
    }
}
