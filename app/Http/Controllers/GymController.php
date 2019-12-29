<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;

class GymController extends Controller
{
    public function store(Request $request)
    {
        $member = new Member;
        $member->member_name = $request->member_name;
        $member->email = $request->email;
        $member->address = $request->address;
        $member->cell_phone = $request->member_contact;
        $member->fee_status=0;
        $member->save();
        return redirect()->back()->with('message', 'New Member has been added!');
    }
  

        public function update(Request $request)
        {
          $member_record=Member::find($request->memberId);
          $member_record->member_name=$request->memberName;
          $member_record->email=$request->memberEmail;
          $member_record->address=$request->memberAddress;
          $member_record->cell_phone=$request->memberContact;
          $member_record->fee_status=$request->memberStatus;
          $member_record->save();
    
          return redirect()->back()->with('message','Member Updated!');
          
        }
}
