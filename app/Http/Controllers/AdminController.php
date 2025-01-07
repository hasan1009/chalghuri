<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Auth;
use Str;
class AdminController extends Controller
{
    public function add()  {
        
        $data['header_title']="Add New Admin";
        return view('admins.add', $data);
    }

    public function insert(Request $request)  {

        $user= new User;
        $user->name=trim($request->name);
        $user->adminID=Auth::user()->adminID;
        $user->mobile_number=trim($request->mobile_number);
        $user->password=Hash::make($request->password);
        $user->user_type=1;
 
        if(!empty($request->file('profile_pic'))){
 
         $ext=$request->file('profile_pic')->getClientOriginalExtension();
         $file=$request->file('profile_pic');
         $randomStr=date('Ymdhis').Str::random(20);
         $fileName=strtolower($randomStr).'.'.$ext;
         $file->move('upload/profile/',$fileName);
 
         $user->profile_pic=$fileName;
        }
        $user->save();
 
        return redirect("admin/admin/list")->with('succsess', 'An admin succsessfully added');
     }

    public function list()  {
        
        $data['getRecord']=User::getAdmin();
        $data['header_title']="Admin List";
        return view('admins.list', $data);
    }


}
