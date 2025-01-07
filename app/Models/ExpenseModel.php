<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Request;

class ExpenseModel extends Model
{
    use HasFactory;

    protected $table = 'expense';


    static public function getSingle($id){
        return self::find($id);
    }

    static public function getExpense($id){

        $return= self::select('expense.*');
        $return=$return->orderBy('id', 'asc')
        ->where('expense.tour_id', '=', $id)
        ->get();
        
        return $return;
    }
}
