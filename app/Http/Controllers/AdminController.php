<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\User;
use App\Model\Session;
use App\Model\Level;
use App\Model\Klass;
use App\Model\Subject;
use App\Model\Student;
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
    //gem me the list of admin, students and teachers
     $students=DB::table('users')->where('UserType','student')->count();
     $teachers=DB::table('users')->where('UserType','teacher')->count();
     $classes=DB::table('classes')->count();
     $subjects=DB::table('subjects')->count();
     //dd($students);
  	return view('admin.dashboard',compact('students','teachers','classes','subjects'));
  }

public function session(Request $request){
     if($request->isMethod('GET'))
    {
        $sessions=DB::table('sessions')->get();
        $current=DB::table('sessions')->where('current',1)->first();
       // dd($sessions);
      	return view('admin.session',compact('sessions','current'));
    }
    elseif($request->isMethod('POST'))
    {

      if($request->action == "register")
      {
      $session = new Session();
      $session->name=$request->session;
      $session->save();
      return back()->with('success','Session succefully added');
      }

      elseif($request->action == "current")
      {

        //change the olde session to zero
             $current=DB::table('sessions')->where('current',1)->first();
             $old=session::find($current->id);
             $old->current = 0;
             $old->update();

//then find the new one and change it to active
        $session=session::find($request->id);
        $session->current = 1;
        $session->save();
        return back()->with('success','You have successfully changed your session');
      }
      elseif($request->action == "delete")
      {
        $session=session::find($request->id);
        $session->delete();
        return back()->with('success','You have successfully deleted this session');
      }
      else
      {
         return back()->with('error','We dont know what you are talking about');
      }
  
    }
}



public function level(Request $request){
     if($request->isMethod('GET'))
    {
        $levels=DB::table('levels')->get();
       // dd($sessions);
      	return view('admin.level',compact('levels'));
    }
    elseif($request->isMethod('POST'))
    {

      if($request->action == "register")
      {
      $level = new Level();
      $level->name=$request->level;
      $level->save();
      return back()->with('success','Level successfully added');
      }

      elseif($request->action == "delete")
      {
        $level=level::find($request->id);
        $level->delete();
        return back()->with('success','You have successfully deleted this level');
      }
      else
      {
         return back()->with('error','We dont know what you are talking about');
      }
  
    }
}


public function klass(Request $request){
    if($request->isMethod('GET'))
  {
      $klasses=DB::table('klasses')->get();
      // dd($sessions);
      return view('admin.classes',compact('klasses'));
  }
  elseif($request->isMethod('POST'))
  {

    if($request->action == "register")
    {
    $klass = new Klass();
    $klass->name=$request->klass;
    $klass->save();
    return back()->with('success','Class successfully added');
    }

    elseif($request->action == "delete")
    {
      $klass=klass::find($request->id);
      $klass->delete();
      return back()->with('success','You have successfully deleted this Class');
    }
    else
    {
        return back()->with('error','We dont know what you are talking about');
    }

  }
}


public function subject(Request $request){
     if($request->isMethod('GET'))
    {
        $subjects=DB::table('subjects')->get();
       // dd($sessions);
      	return view('admin.subject',compact('subjects'));
    }
    elseif($request->isMethod('POST'))
    {

      if($request->action == "register")
      {
      $subject = new Subject();
      $subject->name=$request->subject;
      $subject->abbreviation=$request->abb;
      $subject->save();
      return back()->with('success','Subject successfully added');
      }

      elseif($request->action == "delete")
      {
        $subject=subject::find($request->id);
        $subject->delete();
        return back()->with('success','You have successfully deleted this Subject');
      }
      else
      {
         return back()->with('error','We dont know what you are talking about');
      }
  
    }
}


public function registerstudents(Request $request) {
        if($request->isMethod('GET'))
        {
          
          $sessions=DB::table('sessions')->get();
          $levels=DB::table('levels')->get();
          $klasses=DB::table('klasses')->get();
          $terms=DB::table('terms')->get();
         
             return view('admin.registerstudents',compact('sessions','levels','klasses','terms'));
        }  

        elseif($request->isMethod('POST'))
        {
          //since we are creating a new guy now
          $student= new User();

          $student->name=$request->name;
          $student->username=$request->username;
          $student->session=$request->session;
          $student->level=$request->level;
          $student->class=$request->klass;
          $student->term=$request->term;
          $student->gender=$request->gender;
          $student->password=bcrypt("student101");
          $student->usertype="student";
          $student->save();

          //create also a new guy in the students table

          $student = new Student();
          $student->name=$request->name;
          $student->username=$request->username;
          $student->level=$request->level;
          $student->class=$request->class;
          $student->gender=$request->gender;
          $student->save();

          return back()->with('success','Student successfully registered');
        }
        else
        {
             return back()->with('error','We dont know what you are talking about');
        }
         
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
            $data = Excel::load($path)->get();
            if($data->count()){
                foreach ($data as $key => $value)
                {
                    $user[] = ['name' => $value->name, 'username' => $value->username,
                    'gender' => $value->gender, 'class' => $value->class, 'level' => $value->level,
                    'session' => $value->session, 'term' => $value->term,
                    'password'=> bcrypt("student101"),'UserType' =>"student"];

                     $student[] = ['name' => $value->name, 'username' => $value->username,
                    'gender' => $value->gender, 'class' => $value->class, 'level' => $value->level,
                    'session' => $value->session, 'term' => $value->term,
                    ];


                }

                // 'name','username','gender','class','level','session','term' 
                if(!empty($user)){
                    DB::table('users')->insert($user);
                    DB::table('students')->insert($student);
                    //dd('Insert Record successfully.');
                    return back()->with('success','Insert Record successfully.');
                }
            }
        }
    return back()->with('error','Please Check your file, Something is wrong there.');
  }

   

 public function managestudents(Request $request)
  {
     if($request->isMethod('GET'))
      {
        $type="student";
        $students=DB::table('users')->where('UserType','student')->get();
        return view('admin.managestudents',compact('students'));
      }
      elseif($request->isMethod('POST'))
      {
        $user=user::find($request->id);
        $student=student::find($request->id);
        $user->delete();
        $student->delete();
        return back()->with('success','You have successfully deleted this Subject');
    

      }
  }



  
public function editstudent(Request $update,$id){

   if($update->isMethod('GET'))
    {
         $sessions=DB::table('sessions')->get();
          $levels=DB::table('levels')->get();
          $klasses=DB::table('klasses')->get();
          $terms=DB::table('terms')->get();
         
             return view('admin.editstudent',compact('sessions','levels','klasses','terms'));
        
    }   
   elseif($update->isMethod('POST'))
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
    else
    {
        return redirect()->back()->with('error','We dont know what you are talking about');
    }    
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
    if($request->isMethod('GET'))
      {
        $type="teacher";
        $teachers=DB::table('users')->where('UserType','teacher')->get();
        return view('admin.manageteachers',compact('teachers'));
      }
      elseif($request->isMethod('GET'))
      {


      }
    
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
