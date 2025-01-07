<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeModel;
use Str;
class EmployeeController extends Controller
{
    public function add()  {
        
        $data['header_title']="Add New Admin";
        return view('employee.add', $data);
    }


public function insert(Request $request)
{
    $request->validate([
        'email' => 'required|email|max:255|unique:employee,email',
        'mobile' => 'required|digits:11|unique:employee,mobile',
        'nid' => 'nullable|numeric|digits_between:10,17',
        'birthday' => 'nullable|date|before:today',
        'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    try {
        $user = new EmployeeModel;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->mobile = trim($request->mobile);
        $user->designation = trim($request->designation);
        $user->present_address = trim($request->present_address);
        $user->permenent_address = trim($request->permenent_address);
        $user->nid = trim($request->nid);
        $user->birthday = trim($request->birthday);
        $user->gender = trim($request->gender);
        $user->nominee_name = trim($request->nominee_name);
        $user->nominee_nid = trim($request->nominee_nid);
        $user->nominee_relation = trim($request->nominee_relation);
        $user->nominee_address = trim($request->nominee_address);

        if ($request->hasFile('profile_pic')) {
            $file = $request->file('profile_pic');
            $ext = $file->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/profile/', $fileName);
            $user->profile_pic = $fileName;
        }

        // Save the new user
        $user->save();

        // Redirect with success message
        return redirect("employee/list")->with('success', 'An employee successfully added');
    } catch (\Exception $e) {
        // Handle errors
        return redirect("employee/list")->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}


     public function list()  {
        
        $data['getRecord']=EmployeeModel::getEmployee();
        $data['header_title']="Employee List";
        return view('employee.list', $data);
    }

    public function edit($id)  {

      
       
        $data['getRecord'] = EmployeeModel::getSingle($id);

        if(!empty($data['getRecord'])){
            $data['header_title']="Edit Employee";
            return view('employee.edit', $data);

        }else{
            abort(404);
        }
       
    }

    public function details($id)  {

      
       
        $data['getRecord'] = EmployeeModel::getSingle($id);

        if(!empty($data['getRecord'])){
            $data['header_title']="Employee Details";
            return view('employee.details', $data);

        }else{
            abort(404);
        }
       
    }



    public function update($id, Request $request)  {
        

        $user =  EmployeeModel::getSingle($id);
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->mobile = trim($request->mobile);
        $user->present_address = trim($request->present_address);
        $user->permenent_address = trim($request->permenent_address);
        $user->nid = trim($request->nid);
        $user->designation = trim($request->designation);
        $user->birthday = trim($request->birthday);
        $user->gender = trim($request->gender);
        $user->nominee_name = trim($request->nominee_name);
        $user->nominee_nid = trim($request->nominee_nid);
        $user->nominee_relation = trim($request->nominee_relation);
        $user->nominee_address = trim($request->nominee_address);

        if(!empty($request->file('profile_pic'))){

            if(!empty($user->getProfile())){
                unlink('upload/profile/'.$user->profile_pic);
    
            }
    
            $ext=$request->file('profile_pic')->getClientOriginalExtension();
            $file=$request->file('profile_pic');
            $randomStr=date('Ymdhis').Str::random(20);
            $fileName=strtolower($randomStr).'.'.$ext;
            $file->move('upload/profile/',$fileName);
    
            $user->profile_pic=$fileName;
           }


           $user->save();

           return redirect("employee/list")->with('success', 'Admin successfully edited');


        
    }

    public function delete($id)
{
    $user = EmployeeModel::getSingle($id);

    if (!$user) {
         return back()->with('error', 'Employee not found.');
 }

     EmployeeModel::where('id', $user->id)->delete();

    $user->delete();

    return redirect('employee/list')->with('succsess', 'Employee deleted successfully');
}
}
