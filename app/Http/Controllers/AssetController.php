<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetModel;
use Str;

class AssetController extends Controller
{
    public function add()  {
        
        $data['header_title']="Add New Asset";
        return view('asset.add', $data);
    }


    public function insert(Request $request)
{
    $request->validate([
   
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    try {
        $asset = new AssetModel;
        $asset->name = trim($request->name);
        $asset->description = trim($request->description);
        $asset->unit_price = trim($request->unit_price);
        $asset->quantity = trim($request->quantity);
        $asset->unit = trim($request->unit);
        $asset->purchase_date = trim($request->purchase_date);
    

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/asset/', $fileName);
            $asset->photo = $fileName;
        }

        $asset->save();

        return redirect("asset/list")->with('success', 'An asset successfully added');
    } catch (\Exception $e) {
   
        return redirect("asset/list")->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

public function list()  {
        
    $data['getRecord']=AssetModel::getAsset();
    $data['header_title']="Asset List";
    return view('asset.list', $data);
}


public function edit($id)  {

      
       
    $data['getRecord'] = AssetModel::getSingle($id);

    if(!empty($data['getRecord'])){
        $data['header_title']="Edit Asset";
        return view('asset.edit', $data);

    }else{
        abort(404);
    }
   
}

public function update($id, Request $request) {

    $asset = AssetModel::getSingle($id);
        $asset->name = trim($request->name);
        $asset->description = trim($request->description);
        $asset->unit_price = trim($request->unit_price);
        $asset->quantity = trim($request->quantity);
        $asset->unit = trim($request->unit);
        $asset->purchase_date = trim($request->purchase_date);
    

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = date('Ymdhis') . Str::random(20);
            $fileName = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/asset/', $fileName);
            $asset->photo = $fileName;
        }

        $asset->save();

        return redirect("asset/list")->with('success', 'Asset successfully edited');
    
}

     public function delete($id)
{
    $asset = AssetModel::getSingle($id);

    if (!$asset) {
         return back()->with('error', 'Asset not found.');
 }

    AssetModel::where('id', $asset->id)->delete();

    $asset->delete();

    return redirect('asset/list')->with('success', 'Asset deleted successfully');
}

}
