<?php

namespace App\Http\Controllers;
use App\Models\MemberModel;
use App\Models\TourModel;
use Illuminate\Http\Request;
use Str;
class MemberController extends Controller
{
    public function add($id)  {
        $data['getRecord'] = TourModel::getSingle($id);
        $data['header_title']="Add New Member";
        return view('member.add', $data);
    }


    public function insert(Request $request)  {
        //dd($request->all());

        $request->validate([
            'mobile' => 'required|digits:11|unique:employee,mobile',
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);

        try {
        $member= new MemberModel;
        $member->name=trim($request->name);
        $member->tour_id=trim($request->tour_id);
        $member->mobile=trim($request->mobile);
        $member->address=trim($request->address);
        $member->paid_amount=trim($request->paid_amount);
        $member->discount = trim($request->discount) !== '' ? trim($request->discount) : 0.0;

        if(!empty($request->file('profile_pic'))){
         $ext=$request->file('profile_pic')->getClientOriginalExtension();
         $file=$request->file('profile_pic');
         $randomStr=date('Ymdhis').Str::random(20);
         $fileName=strtolower($randomStr).'.'.$ext;
         $file->move('upload/member/',$fileName);
 
         $member->profile_pic=$fileName;
        }
        $member->save();
 
        return redirect("tour/details/".$request->tour_id)->with('succsess', 'An tour member succsessfully added');
    } catch (\Exception $e) {
        // Handle errors
        return redirect("tour/details/".$request->tour_id)->with('error', 'Something went wrong: ' . $e->getMessage());
    }
     }


     public function edit($id)  {
       
        $data['getRecord'] = MemberModel::getSingle($id);
            $data['header_title']="Edit Member";
            return view('member.edit', $data);
       
    }


    public function update($id, Request $request)  {
        


        try {
        $member =  MemberModel::getSingle($id);
        $member->name=trim($request->name);
        $member->tour_id=trim($request->tour_id);
        $member->mobile=trim($request->mobile);
        $member->address=trim($request->address);
        $member->paid_amount=trim($request->paid_amount);
        $member->discount=trim($request->discount);

        if(!empty($request->file('profile_pic'))){

            if(!empty($member->getProfile())){
                unlink('upload/member/'.$member->profile_pic);
    
            }
    
            $ext=$request->file('profile_pic')->getClientOriginalExtension();
            $file=$request->file('profile_pic');
            $randomStr=date('Ymdhis').Str::random(20);
            $fileName=strtolower($randomStr).'.'.$ext;
            $file->move('upload/member/',$fileName);
            $member->profile_pic=$fileName;
           }
           $member->save();

           return redirect("tour/details/".$request->tour_id)->with('succsess', 'Tour member succsessfully edited');
        } catch (\Exception $e) {
            // Handle errors
            return redirect("tour/details/".$request->tour_id)->with('error', 'Something went wrong: ' . $e->getMessage());
        }

        
    }

    public function delete($id)
    {
        $member = MemberModel::getSingle($id);
    
        if (!$member) {
             return back()->with('error', 'Member not found.');
     }
    
     MemberModel::where('id', $member->id)->delete();
    
        $member->delete();
    
        return back()->with('succsess', 'Member deleted successfully from the tour');
    }
}
