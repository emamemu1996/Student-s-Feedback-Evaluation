<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\FacultyModel;
use App\Models\Teachers_Name_Model;
use App\Models\StudentModel;
use DB;
use Illuminate\Support\Facades\Hash;
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


        public function password_change($type,$token)
        {
            return view('auth/password_change',compact('type','token'));
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
        'token' => $token,
        'type' => $request->type,
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

    }elseif ($request->type=="faculty") {
            // code...
        
        $adminval = DB::table('faculty')->where('email',$request->email)->first();
        if ($adminval) {
            $admindata =array(
        'name' => $adminval->name,
        'token' => $token,
        'type' => $request->type,
        );

          $post = FacultyModel::find($adminval->id);
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

    }elseif ($request->type=="teacher") {
            // code...
        
        $adminval = DB::table('teacher_name')->where('email',$request->email)->first();
        if ($adminval) {
            $admindata =array(
        'name' => $adminval->name,
        'token' => $token,
        'type' => $request->type,
        );

          $post = Teachers_Name_Model::find($adminval->id);
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

    }elseif ($request->type=="student") {
            // code...
        
        $adminval = DB::table('students')->where('email',$request->email)->first();
        if ($adminval) {
            $admindata =array(
        'name' => $adminval->name,
        'token' => $token,
        'type' => $request->type,
        );

          $post = StudentModel::find($adminval->id);
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




      public function password_change_submit(Request $request)
    {
        
        $token = random_int(50000, 1000000);
        if ($request->password != $request->password_confirmation) {
             return redirect()->back()->with('error', ' Password didnot match !');
        }elseif ($request->type=="admin") {
        
        $adminval = DB::table('admin')->where('email',$request->email)->first();
        if ($adminval) {

            if ($adminval->remember_token == $request->token) {
               
           

          $post = Admin::find($adminval->id);
          $post->remember_token = $token;
          $post->password = Hash::make($request->password);
            
            $submit = $post->update();
            if ($submit) {
              

              return redirect()->route('admin_login')->with('status', ' Password Change Success !');
            }else{
                return redirect()->back()->with('error', ' Sometihng Wrong !');
            }
   
            }else{
                return redirect()->back()->with('error', ' Invalid token');
            }
        }else{
            return redirect()->back()->with('error', ' We didnot found your Email !');
        }

    }elseif ($request->type=="faculty") {
        
        $adminval = DB::table('faculty')->where('email',$request->email)->first();
        if ($adminval) {

            if ($adminval->remember_token == $request->token) {
               
           

          $post = FacultyModel::find($adminval->id);
          $post->remember_token = $token;
          $post->password = Hash::make($request->password);
            
            $submit = $post->update();
            if ($submit) {
              

              return redirect()->route('faculty_login')->with('status', ' Password Change Success !');
            }else{
                return redirect()->back()->with('error', ' Sometihng Wrong !');
            }
   
            }else{
                return redirect()->back()->with('error', ' Invalid token');
            }
        }else{
            return redirect()->back()->with('error', ' We didnot found your Email !');
        }

    }elseif ($request->type=="teacher") {
        
        $adminval = DB::table('teacher_name')->where('email',$request->email)->first();
        if ($adminval) {

            if ($adminval->remember_token == $request->token) {
               
           

          $post = Teachers_Name_Model::find($adminval->id);
          $post->remember_token = $token;
          $post->password = Hash::make($request->password);
            
            $submit = $post->update();
            if ($submit) {
              

              return redirect()->route('teacher_login')->with('status', ' Password Change Success !');
            }else{
                return redirect()->back()->with('error', ' Sometihng Wrong !');
            }
   
            }else{
                return redirect()->back()->with('error', ' Invalid token');
            }
        }else{
            return redirect()->back()->with('error', ' We didnot found your Email !');
        }

    }elseif ($request->type=="student") {
        
        $adminval = DB::table('students')->where('email',$request->email)->first();
        if ($adminval) {

            if ($adminval->remember_token == $request->token) {
               
           

          $post = StudentModel::find($adminval->id);
          $post->remember_token = $token;
          $post->password = Hash::make($request->password);
            
            $submit = $post->update();
            if ($submit) {
              

              return redirect()->route('student_login')->with('status', ' Password Change Success !');
            }else{
                return redirect()->back()->with('error', ' Sometihng Wrong !');
            }
   
            }else{
                return redirect()->back()->with('error', ' Invalid token');
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
