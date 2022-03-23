<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }



        public function mypassowrd_reset($type)
        {
            return view('auth/password_reset',compact('type'));
        }



      public function admin_send_password(Request $request)
    {
        $token = random_int(50000, 1000000);
        if ($request->type=="admin") {
            // code...
        
        $adminval = DB::table('admin')->where('email',$request->email)->first();
        if ($adminval) {
            $admindata =array(
        'name' => $adminval->name,
        );

          $post = Admin::find($adminval->id);
          $post->remember_token = $token;
            
            $submit = $post->update();
            if ($submit) {
               \Mail::to($request->email)->send(new \App\Mail\adminpassword($admindata));

              return redirect()->back()->with('status', ' Password send success !');
            }else{
                return redirect()->back()->with('error', ' Sometihng Wrong !');
            }
   
       
        }else{
            return redirect()->back()->with('error', ' We didnot found your Email !');
        }

    }else{
         return redirect()->back()->with('error', ' not admin');
    }

//end
         
    }



}
