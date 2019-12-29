<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Member;
class SelectMemberController extends Controller
{
    function fetch(Request $request){
        $member_id=$request->get('memberId');
        $member=Member::find($member_id);
        return $member;
    }

}
