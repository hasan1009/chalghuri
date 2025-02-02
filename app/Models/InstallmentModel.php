<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class InstallmentModel extends Model
{
    use HasFactory;

    protected $table = 'installment'; 

    static public function getSingle($id){
        return self::find($id);
    }


    static public function getInstallment(){
       //dd(Request::all()); 

     $return= self::select('installment.*');
       
        if(!empty(Request::get('year'))){

            $return=$return->where('year', '=', Request::get('year'));

        }

        if(!empty(Request::get('last_date'))){

            $return=$return->where('last_date', '=',Request::get('last_date'));

        }
        if(!empty(Request::get('id'))){

            $return=$return->where('id','=',Request::get('id'));

        }
        
       
        $return=$return->orderBy('id', 'asc')
        ->paginate(20);

        return $return;
    }

    static public function totalInstallment()
    {
        return self::sum('amount');
    }

}
