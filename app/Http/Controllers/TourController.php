<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TourModel;
use App\Models\MemberModel;
use App\Models\ExpenseModel;

use Str;

class TourController extends Controller
{
    public function add()  {
        
        $data['header_title']="Add New Tour";
        return view('tour.add', $data);
    }

    public function insert(Request $request)
{
   

    try {
        $tour = new TourModel;
        $tour->tour_name = trim($request->tour_name);
        $tour->tour_description = trim($request->tour_description);
        $tour->tour_fee = trim($request->tour_fee);
        $tour->tour_location = trim($request->tour_location);
        $tour->tour_date = trim($request->tour_date);
        $tour->is_finished = trim($request->is_finished);
        
        $tour->save();

        return redirect("tour/list")->with('success', 'An tour successfully added');
    } catch (\Exception $e) {
   
        return redirect("tour/list")->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

public function list()  {
        
    $data['getRecord']=TourModel::getTour();
    $data['header_title']="Asset List";
    return view('tour.list', $data);
}

public function edit($id)  {
       
    $data['getRecord'] = TourModel::getSingle($id);

    if(!empty($data['getRecord'])){
        $data['header_title']="Edit Tour";
        return view('tour.edit', $data);

    }else{
        abort(404);
    }
   
}

public function update($id, Request $request) {

        $tour = TourModel::getSingle($id);
        $tour->tour_name = trim($request->tour_name);
        $tour->tour_description = trim($request->tour_description);
        $tour->tour_fee = trim($request->tour_fee);
        $tour->tour_location = trim($request->tour_location);
        $tour->tour_date = trim($request->tour_date);
        $tour->is_finished = trim($request->is_finished);
        $tour->save();

        return redirect("tour/list")->with('success', 'Tour successfully Edited');
    
}
public function delete($id)
{
    $tour = TourModel::getSingle($id);

    if (!$tour) {
         return back()->with('error', 'Tour not found.');
 }

 TourModel::where('id', $tour->id)->delete();

    $tour->delete();

    return redirect('tour/list')->with('success', 'Tour deleted successfully');
}


public function details($id)  {

    $data['getRecord'] = TourModel::getSingle($id);
    $data['getMember'] = MemberModel::getMember($id);
    $data['getExpense'] = ExpenseModel::getExpense($id);
    
        $data['header_title']="Tour Details";
        return view('tour.details', $data);

   
   
}

}
