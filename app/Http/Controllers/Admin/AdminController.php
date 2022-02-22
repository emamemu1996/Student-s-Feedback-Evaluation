<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use DB;


class AdminController extends Controller
{




    public function admin_login()
    {

      return view('auth/admin_login'); 
        
    }






        public function admin_login_submit(Request $request)
            
             {

          $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:11',
          ]);

            $userinfo = Admin::where('email','=',$request->email)->first();


            if (!$userinfo) {
                return redirect()->back()->with('error', 'We cannot recognize your email');
            }else{


                if (Hash::check($request->password,$userinfo->password)) {
                    if ($userinfo->status==1) {
                        $request->session()->put('LoggedUser',$userinfo->id);
                        return redirect()->route('admin_dashboard'); 
                    }else{
                        return redirect()->back()->with('error', ' Your Account is now pending !');
                    }
                    
                }else{

                    return redirect()->back()->with('error', ' Password didnot match !');

                }
      

             }
        
    }





     public function admin_register()
    {

      return view('auth/admin_register'); 
        
    }



     public function admin_register_submit(Request $request)
    {

          $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admin', 
            'password' => 'required|min:5|max:11',
          ]);

            if ($request->password_confirmation !=$request->password) {
                return redirect()->back()->with('error', 'Password didnot match..');
            }else{


                $admindata = new Admin();
                $admindata->name = $request->name;
                $admindata->email = $request->email;
                $admindata->password = Hash::make($request->password);

           


         
             $submitadmit = $admindata->save();

             if ($submitadmit) {
                  return redirect()->back()->with('status', ' Admin Registration success !');
             }else{
                 return redirect()->back()->with('error', 'Something error ! Try again ...');
             }
      


             }
        
    }


   




    public function admin_logout()
    {
     
     if (session()->has('LoggedUser')) {
         session()->pull('LoggedUser');
         return redirect()->route('admin_login');
     }
        
    }



  public function admin_dashboard()
    {
     $userinfo = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
      return view('admin.dashboard',$userinfo); 
        
    }



  public function admin_report()
    {
     $feedbackdata = DB::table('feedback')
     ->join('teacher_name', 'teacher_name.id', '=', 'feedback.teacherid')
     ->select('teacher_name.name as tname','feedback.*')
        ->paginate(30);
      return view('admin.admin_report',compact('feedbackdata')); 
        
    }


public function admin_profile()
    {
     $userinfo = ['LoggedUserInfo'=>Admin::where('id','=',session('LoggedUser'))->first()];
      return view('admin.admin_profile',$userinfo); 
        
    }




 public function admin_profile_submit(Request $request)
    {

          $request->validate([
            'name' => 'required',
            'email' => 'required|email', 
            'currentpassword' => 'required|min:5|max:11',
          ]);



          $userinfo = Admin::where('id','=',$request->id)->first();
          if ($userinfo) {

               if (Hash::check($request->currentpassword,$userinfo->password)) {
          



                $admindata = Admin::find($request->id);
                $admindata->name = $request->name;

                  if ($userinfo->email != $request->email) {
                    $checkemail = Admin::where('email','=',$request->email)->first();

                    if ($checkemail) {
                        return redirect()->back()->with('error', ' Email Already Exists !');
                    }else{

                       $admindata->email = $request->email;
                    }
                  }


                  $updateprofile = $admindata->update();

                  if ($updateprofile) {
                      return redirect()->back()->with('status', ' Admin profile update success !');
                  }else{
                       return redirect()->back()->with('error', 'Something error ! Try again ...');
                  }



              }else{
                return redirect()->back()->with('error', ' Password didnot match !');
              }




          }else{
            return redirect()->back()->with('error', ' User didnot found !');
          }
         


           
        
    }






   public function view_admin()
    {
        $users = DB::table('admin')->paginate(30);
        return view('admin/view_admin',compact('users'));
    }



   



  public function view_admin_delete(Request $request)
    {
            $service = Admin::findorFail($request->id);
            $service->delete();
            return redirect()->back()->with('status', ' Data Delete success !');
    }




  public function view_admin_update(Request $request)
    {


         $request->validate([
        'name' => 'required',
        'email' => 'required',
        'status' => 'required'
    

        
        
    ]);

          $post = Admin::find($request->id);
          $post->name = $request->name;
          $post->status = $request->status;
          $userinfo = Admin::where('id','=',$request->id)->first();
             if ($userinfo->email != $request->email) {
                    $checkemail = Admin::where('email','=',$request->email)->first();

                    if ($checkemail) {
                        return redirect()->back()->with('error', ' Email Already Exists !');
                    }else{

                       $post->email = $request->email;
                    }
                  }
      

      
            

              $post->update();
              return redirect()->back()->with('status', ' Data update success !');
    }




}
