<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class CollectionModel extends Model
{
    use HasFactory;

    protected $table = 'collection'; 

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getCollection(){

        $return= self::select('collection.*');
        $return=$return->orderBy('id', 'asc')
        ->get();
        return $return;
    }
}
