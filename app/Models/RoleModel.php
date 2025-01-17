<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class RoleModel extends Model
{

    use HasFactory;

    protected $table = 'role'; 

    static public function getSingle($id){
        return self::find($id);
    }
    static public function getRole(){

        $return= self::select('role.*');
      

        $return=$return->orderBy('id', 'asc')
        ->paginate(20);

        return $return;
    }
}
