<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Model\scratch;
class StudentController extends Controller
{
   

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function dashboard()
    {
        return view('students.dashboard');
    }

    public function profile()
    {
        return view('students.profile');
    }

    public function editprofile(Request $update)
    {

        if($update->isMethod('POST'))
        {
        if($update->action == 'basic'){
                //since we are updating, we done insta
                $user=user::find(Auth::user()->id);
                $user->phone=$update->phone;
                $user->gender=$update->gender;

                $user->save();
                return back()->with('success','Profile successfully updated');

        }
        elseif($update->action == 'background'){
                //since we are updating, we done insta
                $user=user::find(Auth::user()->id);
                $user->country=$update->country;
                $user->address=$update->address;
                $user->lga=$update->lga;
                $user->state=$update->state;

                $user->save();
                return back()->with('success','Profile successfully updated');

        }
        elseif($update->action == 'final'){

                $user=user::find(Auth::user()->id);
                $user->skills=$update->skills;
                $user->intrest=$update->intrest;
                $user->quotes=$update->quotes;
            
                $user->postsheld=$update->postsheld;
                $user->dateofbirth=$update->dateofbirth;

                $user->save();
                return back()->with('success','Profile successfully updated');
        }
        else{
            return back()->with('error','We dont know what you are talking about');
        }
        
        }
        elseif($update->isMethod('GET'))
        {
            return view('students.editprofile');
        }    
    }

     public function subjects()
    {
        $mysubjects=DB::table('subjects')->where('level',Auth::user()->level)->get();
       
        return view('students.subjects',compact('mysubjects'));
    }

    public function results(Request $check)
    {

        if($check->isMethod('GET'))
        {
            $sessions=DB::table('sessions')->get();
            $terms=DB::table('terms')->get();
            
            return view('students.scratch',compact('sessions','terms'));
             

        }
        else if($check->isMethod('POST'))
        {
            //dd($check);
            //check database for the detailsof the card provided
            $checkpin=DB::table('scratches')->where('pin',$check->pin)->count();
            if($checkpin < 1)
            {
                return back()->with('error','incorrect pin');
            }
            else if($checkpin == 1)
            {
                 $getpin=DB::table('scratches')->where('pin',$check->pin)->first();
                 //check weda the pin has been used

                 if($getpin->used_by == null )
                 {
                    $pin=scratch::find($getpin->id);
                    $pin->used_by= Auth::user()->username;
                    $pin->session= $check->session;
                    $pin->term= $check->term;
                    $pin->save();

                    //now get his results
                     $results=DB::table('results')->where(['term' => $check->term,
                     'session' =>$check->session,'username'=> Auth::user()->username, 'approved'=>1])->get();

                     //now get his class performance
                      $positions=DB::table('positions')->where(['term' => $check->term,
                     'session' =>$check->session,'username'=> Auth::user()->username])->first(); 

                            if($positions == null)
                            {
                                return back()->with('error','Selected results not yet ready');
                            }

                     return view('students.results',compact('results','positions'));

                 }
                 else if($getpin->used_by == Auth::user()->username)
                {
                    if($getpin->session != $check->session || $getpin->term != $check->term)
                    {
                         return back()->with('error','You can"t use same pin for different terms or sessions');
                    }
                    else 
                    {
                         //now get his results
                        $results=DB::table('results')->where(['term' => $check->term,
                        'session' =>$check->session,'username'=> Auth::user()->username, 'approved'=>1])->get();

                        //now get his class performance
                        $positions=DB::table('positions')->where(['term' => $check->term,
                        'session' =>$check->session,'username'=> Auth::user()->username ])->first(); 
                        //dd($positions);

                                if($positions == null)
                                {
                                    return back()->with('error','Selected results not yet ready');
                                }



                        return view('students.results',compact('results','positions'));
                    }
                }
                else {
                     return back()->with('error','incorrect pin');
                }

                 
            }


            return view('students.results');

        }
    }
}
