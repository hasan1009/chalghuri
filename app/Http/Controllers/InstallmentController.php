<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InstallmentModel;
use App\Models\EmployeeModel;
use App\Models\CollectionModel;
use DB;
class InstallmentController extends Controller
{
    public function add()  {
        $data['header_title']="Add New Installment";
        return view('installment.add', $data);
    }

    public function insert(Request $request)
{

    try {
        $installment = new InstallmentModel;
        $installment->year = trim($request->year);
        $installment->month = trim($request->month);
        $installment->amount = trim($request->amount);
        $installment->last_date = trim($request->last_date);
        

        // Save the new user
        $installment->save();

        // Redirect with success message
        return redirect("installment/list")->with('succsess', 'An Installment successfully added');
    } catch (\Exception $e) {
        // Handle errors
        return redirect("installment/list")->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}


public function list()  {
        
    $data['getRecord']=InstallmentModel::getInstallment();
    $data['header_title']="Installment List";
    return view('installment.list', $data);
}

public function edit($id)  {
    $data['getRecord'] = InstallmentModel::getSingle($id);

    if(!empty($data['getRecord'])){
        $data['header_title']="Edit Installment";
        return view('installment.edit', $data);
    }else{
        abort(404);
    }
   
}

public function update($id, Request $request)  {

    $installment =InstallmentModel::getSingle($id);
    $installment->year = trim($request->year);
    $installment->month = trim($request->month);
    $installment->amount = trim($request->amount);
    $installment->last_date = trim($request->last_date);
    $installment->save();

    return redirect("installment/list")->with('succsess', 'An Installment successfully edited');
    
}

public function delete($id)
{
    $user = InstallmentModel::getSingle($id);

    if (!$user) {
         return back()->with('error', 'Employee not found.');
 }

 InstallmentModel::where('id', $user->id)->delete();

    $user->delete();

    return redirect('installment/list')->with('succsess', 'Installment deleted successfully');
}



public function collection($id)  {

  

    $data['getRecord'] = InstallmentModel::getSingle($id);
    $data['getEmployee'] = EmployeeModel::getEmployee();
    $data['installment_id'] = $id;

    if(!empty($data['getRecord'])){
        $data['header_title']="Installment Collection";
        return view('installment.collection', $data);

    }else{
        abort(404);
    }
   
}

public function details($id)
{
    // Fetch employee data
    $data['getEmployee'] = EmployeeModel::getEmployee();

    // Fetch installment data
    $data['getInstallment'] = InstallmentModel::getSingle($id);

    // Calculate total collected amount for each employee
    foreach ($data['getEmployee'] as $employee) {
        $employee->total_collected = DB::table('collection')
            ->where('installment_id', $id)
            ->where('employee_id', $employee->id)
            ->sum('collected_amount');
    }

    $data['header_title'] = "Installment Details";
    return view('installment.details', $data);
}

public function submit_collection(Request $request)

{

            $request->validate([
                'employee_id' => 'required|integer',
                'collected_amount' => 'required|numeric',
                'collection_date' => 'required|date',
                'installment_id' => 'required|integer',
            ]);

    try {
    
        $collection = new CollectionModel;
        $collection->installment_id = trim($request->installment_id);
        $collection->employee_id = trim($request->employee_id);
        $collection->collected_amount = trim($request->collected_amount);
        $collection->collection_date = trim($request->collection_date);
        $collection->save();

        return redirect("installment/list")->with('succsess', 'An Installment Collected Successfully');
    } catch (\Exception $e) {
 
        return redirect("installment/list")->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}


public function print($id)  {
    $data['getEmployee'] = EmployeeModel::getEmployee();

    // Fetch installment data
    $data['getInstallment'] = InstallmentModel::getSingle($id);

    // Calculate total collected amount for each employee
    foreach ($data['getEmployee'] as $employee) {
        $employee->total_collected = DB::table('collection')
            ->where('installment_id', $id)
            ->where('employee_id', $employee->id)
            ->sum('collected_amount');
    }

    $data['header_title'] = "Installment Details";
    return view('installment.print', $data);
}
}
