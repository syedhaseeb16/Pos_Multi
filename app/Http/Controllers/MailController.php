<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function basic_email(Request $request) {
        $email_text=$request->text;
        $email=$request->email;
        $subject=$request->email;
        $data = array('name'=>"Gym Member!", 'body'=>$email_text);
        
        Mail::send(['text'=>'mail'], $data, function($message) use ($email,$subject){
           $message->to($email)->subject
              ($subject);
           $message->from('admingym@thefashionhouse.com','Gym Administrator');
        });
        return redirect()->back()->with('success', 'Member notified successfully!');   
     }
     
}
