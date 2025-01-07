<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class AssetModel extends Model
{

    use HasFactory;

    protected $table = 'asset'; 

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getAsset(){

        $return= self::select('asset.*');
        if(!empty(Request::get('name'))){

            $return=$return->where('name', 'like','%'.Request::get('name').'%');

        }

        if(!empty(Request::get('id'))){

            $return=$return->where('id','=',Request::get('id'));

        }

        if(!empty(Request::get('purchase_date'))){

            $return=$return->where('purchase_date','=',Request::get('purchase_date'));

        }
        
        
      

       

       
        $return=$return->orderBy('id', 'asc')
        ->paginate(20);

        return $return;
    }

    public function getProfileDirect() {
        if(!empty($this->photo) && file_exists('upload/asset/'.$this->photo)){
            return url('upload/asset/' .$this->photo);

        }else{
            return url('upload/profile/dummy_profile.webp');
        }
        
    }
    
}
