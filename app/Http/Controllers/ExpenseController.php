<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseModel;
use App\Models\TourModel;

class ExpenseController extends Controller
{
    public function add($id)  {
        $data['getRecord'] = TourModel::getSingle($id);
        $data['header_title']="Add New Expense";
        return view('expense.add', $data);
    }

    public function insert(Request $request)  {

        try {
        $expense= new ExpenseModel;
        $expense->name=trim($request->name);
        $expense->tour_id=trim($request->tour_id);
        $expense->date=trim($request->date);
        $expense->amount=trim($request->amount);
        $expense->unit=trim($request->unit);
        $expense->number_of_purchase=trim($request->number_of_purchase);

        $expense->save();
 
        return redirect("tour/details/".$request->tour_id)->with('succsess', 'An expenser succsessfully added');
    } catch (\Exception $e) {
       
        return redirect("tour/details/".$request->tour_id)->with('error', 'Something went wrong: ' . $e->getMessage());
    }
     }

     public function edit($id)  {
       
        $data['getRecord'] = ExpenseModel::getSingle($id);
            $data['header_title']="Edit Expense";
            return view('expense.edit', $data);
       
    }



    public function update($id, Request $request)  {
        


        try {
        $expense =  ExpenseModel::getSingle($id);
        $expense->name=trim($request->name);
        $expense->tour_id=trim($request->tour_id);
        $expense->date=trim($request->date);
        $expense->amount=trim($request->amount);
        $expense->unit=trim($request->unit);
        $expense->number_of_purchase=trim($request->number_of_purchase);
        $expense->save();
       
    
         

           return redirect("tour/details/".$request->tour_id)->with('succsess', 'Tour expense succsessfully edited');
        } catch (\Exception $e) {
         
            return redirect("tour/details/".$request->tour_id)->with('error', 'Something went wrong: ' . $e->getMessage());
        }

        
    }
}
