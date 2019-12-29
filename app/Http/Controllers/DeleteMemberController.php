<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
class DeleteMemberController extends Controller
{
    function delete(Request $request){
        $member_id=$request->get('memberId');
        $member=Member::find($member_id);
        $member->delete();
        return "deleted";
    }
}
