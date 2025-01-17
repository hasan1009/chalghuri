<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RoleModel;
use Str;

class RoleController extends Controller
{
    public function add()  {
        
        $data['header_title']="Add New Role";
        return view('role.add', $data);
    }

    public function insert(Request $request)
{
   
    try {
        $role = new RoleModel;
        $role->name = trim($request->name);
        $role->save();

        return redirect("role/list")->with('succsess', 'A Role successfully added');
    } catch (\Exception $e) {
   
        return redirect("role/list")->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

public function list()  {
        
    $data['getRecord']=RoleModel::getRole();
    $data['header_title']="Role List";
    return view('role.list', $data);
}

public function edit($id)  {

      
       
    $data['getRecord'] = RoleModel::getSingle($id);

    if(!empty($data['getRecord'])){
        $data['header_title']="Edit Role";
        return view('role.edit', $data);

    }else{
        abort(404);
    }
   
}

public function update($id,Request $request)
{
   
  
        $role = RoleModel::getSingle($id);;
        $role->name = trim($request->name);
        $role->save();

        return redirect("role/list")->with('succsess', 'A Role successfully added');
     
}

public function delete($id)
{
    $role = RoleModel::getSingle($id);

    if (!$role) {
         return back()->with('error', 'Role not found.');
 }

 RoleModel::where('id', $role->id)->delete();

    $role->delete();

    return redirect('role/list')->with('succsess', 'Role deleted successfully');
}

}
