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

        $return= self::select('expense.*', 'tour.tour_name as tour_name', 'tour.tour_date as tourdate')
        ->join('tour', 'tour.id', '=', 'expense.tour_id') 
        ->orderBy('id', 'asc')
        ->where('expense.tour_id', '=', $id)
        ->get();
        
        return $return;
    }
}
