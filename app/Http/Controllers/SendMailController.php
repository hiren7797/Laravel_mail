<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
class SendMailController extends Controller
{
    function index()
    {
        return view('send_email');
    }

    function send(Request $request)
    {
        $this ->validate($request,[
            'name' => 'required',
            'mail' => 'required|email',
           'message'=> 'required'
           ]);
               $data=array(
            'name' =>$request->name,
            'message'=>$request->message,
        );
       // $mymail='hirenbarad7797@gmail.com';
        //Mail:$data = array('name'=>"Joshua", "body" => "This is my first Online Email.");
       // Mail::send('dynamic_mail_template', $data, function($message) {
           // $message->to('jigneshjoisar@gmail.com', 'To Website')
           //         ->subject('Online Email Test');
         //           $message->from('hirenbarad7797@gmail.com','From Visitor');
       //         });

      

        $to_name =$request->name;
        $to_email = $request->mail;

        $data = array('name'=>$request->name, 'body' =>$request->message);
        Mail::send('dynamic_mail_template', $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject('Laravel Test Mail');
                $message->from('hirenbarad7797@gmail.com','Hiren Barad');
            });
      return back()->with('Success','Thanks for Contacting us');    

    }


}
