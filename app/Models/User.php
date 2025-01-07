<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Request;
class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getAdmin(){

        $return= self::select('users.*')
        ->where('is_admin' ,'=', 0)
       ;
        if(!empty(Request::get('name'))){

            $return=$return->where('name', 'like','%'.Request::get('name').'%');

        }
        
        if(!empty(Request::get('mobile_number'))){

            $return=$return->where('mobile_number', 'like','%'.Request::get('mobile_number').'%');

        }

        if(!empty(Request::get('date'))){

            $return=$return->whereDate('created_at', '=',Request::get('date'));

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
}
