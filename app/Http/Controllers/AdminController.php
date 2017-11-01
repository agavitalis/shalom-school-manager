<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\stdregexcelsheet;
use Validator;
use Auth;
use Excel;
use Illuminate\validation\Rule;

class AdminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }




  public function admindashboard()
  {

  	return view('admin.dashboard');
  }

  public function adminprofile()
  {

      return view('admin.profile');
  }

  public function admineditprofile(Request $update)
  {

    if($update->isMethod('POST'))
    {
      $this->validate($update,[

        'email'=>["required",Rule::unique('users')->ignore(Auth::id())],
        'phone'=>'required',
        'dateofbirth'=>'required',
        'gender'=>'required'
        
        ]);

      //since we are updating, we done insta
      $user=user::find(Auth::user()->id);

     // dd($user);
      $user->email=$update->email;
      $user->phone=$update->phone;
      $user->dateofbirth=$update->dateofbirth;
      $user->gender=$update->gender;

      $user->save();
      return redirect()->back()->with('status','Profile succefully updated');
    }
    elseif($update->isMethod('GET'))
    {
        return view('admin.editprofile');
    }    
  }

  public function mystudents()
  {
      $type="student";
      $students=DB::table('users')->where('UserType','student')->get();
      return view('admin.mystudents',compact('students'));
  }
    

   public function managestudents()
  {
    $type="student";
    $students=DB::table('users')->where('UserType','student')->get();
  	return view('admin.managestudents',compact('students'));
  }

  public function registerstudents(Request $request)
  {

       if($request->isMethod('POST'))
        {
          // $this->validate($request,[

          //   'name'=>"required",
          //   'regno'=>["required",Rule::unique('users')],
          //   'level'=>'required',
          //   'class'=>'required',
          //   'gender'=>'required'
            
          //   ]);

          //since we are creating a new guy now
          $student= new User();

         // dd($user);
          $student->name=$request->name;
          $student->username=$request->username;
          $student->level=$request->level;
          $student->class=$request->class;
          $student->gender=$request->gender;
          $student->password=bcrypt("student101");
          $student->usertype="student";

          $student->save();
          return redirect()->back()->with('status','Student succefully added');
        }
        elseif($request->isMethod('GET'))
        {
             return view('admin.registerstudents');
        }     
  }

//here i did download excel from database
  public function downloadstudent(Request $request, $type)
  {
   // $data=DB::table('studentregistration')->get()->toArray();
    $data = stdregexcelsheet::get()->toArray();
    return Excel::create('stdreg_details', function($excel) use ($data) {
      $excel->sheet('mySheet', function($sheet) use ($data)
          {
        $sheet->fromArray($data);
          });
    })->download($type);
  }
    
//here I read the excelfile
  public function importstudent(Request $request)
  {

   if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['name' => $value->name, 'username' => $value->username,
                    'gender' => $value->gender, 'class' => $value->class, 'level' => $value->level,
                    'session' => $value->session, 'term' => $value->term,
                     'password'=> bcrypt("student101"),'UserType' =>"student"];
                }

                // 'name','username','gender','class','level','session','term' 
                if(!empty($arr)){
                    \DB::table('users')->insert($arr);
                    //dd('Insert Record successfully.');
                    return back()->with('success','Insert Record successfully.');
                }
            }
        }
    return back()->with('error','Please Check your file, Something is wrong there.');
  }

   
   public function myteachers()
  {
      //dd($id);
      $type="teacher";
      $teachers=DB::table('users')->where('UserType','teacher')->get();
     // $students=User::all();
      //dd($students);
    
      return view('admin.myteachers',compact('teachers'));
  }
    

   public function manageteachers()
  {
    $type="teacher";
    $teachers=DB::table('users')->where('UserType','teacher')->get();
    return view('admin.manageteachers',compact('teachers'));
  }

  public function registerteachers(Request $request)
  {

       if($request->isMethod('POST'))
        {
          // $this->validate($request,[

          //   'name'=>"required",
          //   'regno'=>["required",Rule::unique('users')],
          //   'level'=>'required',
          //   'class'=>'required',
          //   'gender'=>'required'
            
          //   ]);

          //since we are creating a new guy now
          $teacher= new User();

         // dd($user);
          $teacher->name=$request->name;
          $teacher->username=$request->username;
          $teacher->level=$request->level;
          
          $teacher->class=$request->class;
          $teacher->gender=$request->gender;
          $teacher->password= bcrypt("teacher101");
          $teacher->usertype="teacher";

          $teacher->save();
          return redirect()->back()->with('status','Teacher succefully added');
        }
        elseif($request->isMethod('GET'))
        {
             return view('admin.registerteachers');
        }  
  }

  //here i did download excel from database
  public function downloadteacher(Request $request, $type)
  {
   // $data=DB::table('studentregistration')->get()->toArray();
    $data = stdregexcelsheet::get()->toArray();
    return Excel::create('stdreg_details', function($excel) use ($data) {
      $excel->sheet('mySheet', function($sheet) use ($data)
          {
        $sheet->fromArray($data);
          });
    })->download($type);
  }
    
//here I read the excelfile
  public function importsteacher(Request $request)
  {

   if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();
            $data = \Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value) {
                    $arr[] = ['name' => $value->name, 'username' => $value->username,
                    'gender' => $value->gender, 'class' => $value->class, 'level' => $value->level,
                    'session' => $value->session, 'term' => $value->term,
                     'password'=> bcrypt("student101"),'UserType' =>"student"];
                }

                // 'name','username','gender','class','level','session','term' 
                if(!empty($arr)){
                    \DB::table('users')->insert($arr);
                    //dd('Insert Record successfully.');
                    return back()->with('success','Insert Record successfully.');
                }
            }
        }
    return back()->with('error','Please Check your file, Something is wrong there.');
  }
     

  public function allresults()
  {
     
      $results=DB::table('students')->get();
      return view('admin.viewresults',compact('results'));
  }

   public function approveresults()
  {
      $results=DB::table('subjects')->where('UserType','student')->get();
      return view('admin.approveresult');
  }

   public function uploadresults($type=null)
  {
    if($type==null)
    {
      return view('admin.uploadresults');
    }

    
  }



    // public function studymaterials()
    // {
    //     return view('admin.studymaterials');
    // }

    // public function schemeofwork()
    // {
    //     return view('admin.schemeofwork');
    // }

    // public function assignment()
    // {
    //     return view('admin.assignment');
    // }

    //  public function uploadassignment()
    // {
    //     return view('admin.uploadassignment');
    // }
    //  public function myannouncements()
    // {
    //     return view('admin.myannouncement');
    // }

    //  public function uploadannouncement()
    // {
    //     return view('admin.uploadannouncement');
    // }

}
