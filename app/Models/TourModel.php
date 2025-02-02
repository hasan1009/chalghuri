<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class TourModel extends Model
{
    use HasFactory;

    protected $table = 'tour';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getTour(){

        $return= self::select('tour.*');
        if(!empty(Request::get('tour_name'))){

            $return=$return->where('tour_name', 'like','%'.Request::get('tour_name').'%');

        }
        
     

        if(!empty(Request::get('id'))){

            $return=$return->where('id','=',Request::get('id'));

        }

        if(!empty(Request::get('tour_date'))){

            $return=$return->where('tour_date','=',Request::get('tour_date'));

        }

       
        $return=$return->orderBy('id', 'asc')
        ->paginate(20);

        return $return;
    }
}
