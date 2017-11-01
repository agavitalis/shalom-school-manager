<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\stdregexcelsheet;
use Validator;
use Auth;
use Excel;
use App\Model\Result;
use Illuminate\validation\Rule;

class TeachersController extends Controller
{
    //
   public function __construct()
    {
        $this->middleware('auth');
    }
    

     public function teacherdashboard()
    {

    	return view('teachers.dashboard');
    }

     public function classlist()
    {

    	return view('teachers.classlist');
    }

      public function teacherprofile()
    {

        return view('teachers.profile');
    }

     public function teachereditprofile()
    {

        return view('teachers.editprofile');
    }


     public function teachersubjects()
    {
        return view('teachers.mysubjects');
    }


    public function studymaterials()
    {
        return view('teachers.studymaterials');
    }

    public function schemeofwork()
    {
        return view('teachers.schemeofwork');
    }

    public function assignment()
    {
        return view('teachers.assignment');
    }

     public function uploadassignment()
    {
        return view('teachers.uploadassignment');
    }

     public function mystudents()
    {
        return view('teachers.mystudents');
    }


     public function myclassresult()
    {
        return view('teachers.myclassresult');
    }

     public function mysubjectsresult()
    {
        return view('teachers.mysubjectresult');
    }

        // /here I read the excelfile
 public function uploadresults(Request $request)
{
        if($request->isMethod('GET'))
        {
            return view('teachers.uploadresults');
        }

        if($request->isMethod('POST'))
        {
    
            if($request->hasFile('import_file')){
                $path = $request->file('import_file')->getRealPath();
                $data = Excel::load($path)->get();
              //  dd($data);
                if($data->count()){
                    foreach ($data as $key => $upload) {

                      //  dd($upload->name);
                    $result = new Result();

                    $result->name = $upload->name;
                    $result->username = $upload->regno;

                    $result->class = $upload->class;
                    $result->term = $upload->term;
                    $result->level = $upload->level;
                    $result->session = $upload->session;

                    $result->subject = $upload->subject;

                    $result->continous_accessment = $upload->continous_accessment;
                    $result->test = $upload->test;
                    $result->exam = $upload->exam;
                    $result->total = $upload->continous_accessment+ $upload->test + $upload->exam;

                    if($result->total >= 70){
                        $result->grade = "A";
                    }
                    elseif($result->total <= 69 && $result->total >= 60){
                        $result->grade = "B";
                    }
                    elseif($result->total <= 59 && $result->total >= 50){
                        $result->grade = "C";
                    }
                    elseif($result->total <= 49 || $result->total >= 45){
                        $result->grade = "D";
                    }
                    elseif($result->total <= 45 || $result->total >= 40){
                        $result->grade = "E";
                    }
                    elseif($result->total <= 39 || $result->total >= 0){
                        $result->grade = "F";
                    }

                    $result->subject_teacher = $upload->subject_teacher;
                    $result->uploaded_by = Auth::user()->email;


                    $result->save();


                }
                //select all that I just uploaded
                $subjectgrade=DB::table('results')->where([ 
                'class' =>$upload->class,'term' =>$upload->term,'level' =>$upload->level,
                'session' =>$upload->session,'subject' =>$upload->subject])->orderBy('total','DESC')->get();    
                
                $counter=1;
                $last_total=null;
                $sameposition=0;
                foreach($subjectgrade as $position )
                {
                     if($last_total == $position->total)
                        {
                             $counter =  $counter - 1 ;
                             $position = Result::find( $position->id);
                                $position->subject_position = $counter;
                                $position->update();
                                $counter++;
                                $sameposition++;
                                 //save the last total
                                $last_total = $position->total;
                        }
                        else
                        {
                            $position = Result::find( $position->id);
                            $position->subject_position = $counter + $sameposition;
                            $position->update();
                            $counter = $counter + 1 + $sameposition;

                            //save the last total
                            $last_total = $position->total;
                            //reset sameposition to zero
                            $sameposition = 0;

                        }

                       
                }
               
                    return back()->with('success','Insert Record successfully.');
                    
                }
            }

            else{    
                return back()->with('error','Please Check your file, Something is wrong there.');
            }
        }  
}

     public function teachersannouncements()
    {
        return view('teachers.announcement');
    }

     public function myannouncements()
    {
        return view('teachers.myannouncement');
    }

     public function uploadannouncement()
    {
        return view('teachers.uploadannouncement');
    }

   
}
