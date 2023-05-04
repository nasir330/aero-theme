<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Members;

class MembersControllers extends Controller
{
    public function index()
    {
        $members = Members::all();
        return view('members.index',['members' => $members]);
    }

    //add member form
    public function create()
    {       
        return view('members.create');
    }
    //add new member
    public function store(Request $request)
    {
        $data = $request->all();
         Members::create($data);
         session()->flash('success','Member Created successfully..!!');
        return redirect()->route('members');        
    }
    //edit  member
    public function edit($id)
    {
        $member = Members::find($id);        
         return view('members.edit',['member' => $member]);      
    }
    //update  member data
    public function update(Request $request)
    {       
        Members::where('id', $request->memberId)->update([
            'firstName'=> $request->firstName,
            'lastName'=> $request->lastName,
            'gender'=> $request->gender,
            'email'=> $request->email,
            'phone'=> $request->phone,
        ]);
        session()->flash('success','Members data updated ..!!');
        return redirect()->route('members');       
    }
     //delete  member
     public function delete($id)
     {
        Members::destroy($id); 
        session()->flash('delete','Member data deleted ..!!');
        return redirect()->route('members');        
     }
}
