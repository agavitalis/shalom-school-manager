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
use App\Model\Teacher;
use App\Model\Result;
use App\Model\Term;
use App\Model\assignsubject;
use App\Model\assignclass;
use App\Model\stdregexcelsheet;
use App\Model\tearegexcelsheet;
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
     $classes=DB::table('klasses')->count();
     $subjects=DB::table('subjects')->count();
     //dd($students);
  	return view('admin.dashboard',compact('students','teachers','classes','subjects'));
  }

public function session(Request $request){
     if($request->isMethod('GET'))
    {
        $sessions=DB::table('sessions')->get();
        $terms=DB::table('terms')->get();

        $current=DB::table('sessions')->where('current',1)->first();
        $currentT=DB::table('terms')->where('current',1)->first();
       // dd($sessions);
      	return view('admin.session',compact('sessions','current','terms','currentT'));
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
       elseif($request->action == "term")
      {
        //change the olde term to zero
             $current=DB::table('terms')->where('current',1)->first();
            // dd($current);
             $old=term::find($current->id);
             $old->current = 0;
             $old->update();

        //then find the new one and change it to active
        $term=term::find($request->id);
        $term->current = 1;
        $term->save();
        return back()->with('success','You have successfully the term');
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
        $levels=DB::table('levels')->get();
       // dd($sessions);
      	return view('admin.subject',compact('subjects','levels'));
    }
    elseif($request->isMethod('POST'))
    {

      if($request->action == "register")
      {
      $subject = new Subject();
      $subject->name=$request->subject;
      $subject->abbreviation=$request->abb;
      $subject->category=$request->category;
      $subject->level=$request->level;

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

//here i did download excel from database

public function downloadstudent(Request $request, $type)
  {
   // $data=DB::table('studentregistration')->get()->toArray();
    $data = stdregexcelsheet::get()->toArray();
    return Excel::create('students_reg_details', function($excel) use ($data) {
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
        DB::table('students')->where('username',$user->username)->delete();
        $user->delete();
      
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
        
          $update=DB::table('users')->where('id',$id)->first();
         
          $student=DB::table('students')->where('username',$update->username)->first();
         // $student=DB::table('students')->where('username',)->first();

          
         //dd($teachers);
             return view('admin.editstudent',compact('sessions','levels','klasses','terms','update','student'));
        
    }   
   elseif($update->isMethod('POST'))
    {
     
      //since we are updating, we done insta
      $user=user::find($id);
     
      DB::table('students')->where('username',$user->username)->update(['name'=>$update->name,'username'=>$update->username]);

      $user->name=$update->name;
      $user->username=$update->username;
      $user->session=$update->session;
      $user->class=$update->klass;
      $user->level=$update->level;
      $user->term=$update->term;
      $user->gender=$update->gender;

      $user->save();

       
      return redirect()->back()->with('success','Profile successfully updated');
    }
    else
    {
        return redirect()->back()->with('error','We dont know what you are talking about');
    }    
}


//i took care of the admin here
public function adminprofile(){

      return view('admin.profile');
}

public function admineditprofile(Request $update){

   
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
     
    }
    elseif($update->isMethod('GET'))
    {
        return view('admin.editprofile');
    }     
}





//teachers

  public function registerteachers(Request $request)
  {

      if($request->isMethod('GET'))
        {
             $sessions=DB::table('sessions')->get();
             return view('admin.registerteachers',compact('sessions'));
        }  
      elseif($request->isMethod('POST'))
        {
         

          //since we are creating a new guy now
          $teacher= new User();

          $teacher->name=$request->name;
          $teacher->username=$request->username;
          $teacher->gender=$request->gender;
          $teacher->password= bcrypt("teacher101");
          $teacher->usertype="teacher";

          $teacher->save();
          //save in too in the teachers table
          $newteacher = new Teacher();
          $newteacher->name=$request->name;
          $newteacher->username=$request->username;

          $newteacher->save();

          return redirect()->back()->with('success','Teacher successfully Registered');
        }
      else
      {
           return redirect()->back()->with('error','We  dont know what you are saying');
      }
        
  }

  //here i did download excel from database
  public function downloadteacher(Request $request, $type)
  {
   
    $data = tearegexcelsheet::get()->toArray();
    return Excel::create('teachers_reg_details', function($excel) use ($data) {
      $excel->sheet('mySheet', function($sheet) use($data)
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
            $data = Excel::load($path)->get();
            if($data->count()){
                 foreach ($data as $key => $value)
                {
                    $user[] = ['name' => $value->name, 'username' => $value->username,
                    'gender' => $value->gender,
                    'password'=> bcrypt("teacher101"),'UserType' =>"teacher"];

                     $teacher[] = ['name' => $value->name, 'username' => $value->username];


                }

                // 'name','username','gender','class','level','session','term' 
                if(!empty($user)){
                    DB::table('users')->insert($user);
                    DB::table('teachers')->insert($teacher);
                    //dd('Insert Record successfully.');
                    return back()->with('success','Teachers successfully created.');
                }
            }
        }
    return back()->with('error','Please Check your file, Something is wrong there.');
  }
     



public function manageteachers(Request $request){
     if($request->isMethod('GET'))
      {
        $teachers =DB::table('users')->where('UserType','teacher')->get();
        return view('admin.manageteachers',compact('teachers'));
      }
      elseif($request->isMethod('POST'))
      {
        $user=user::find($request->id);

        //dd($user);
        DB::table('teachers')->where('username',$user->username)->delete();
        $user->delete();
      
        return back()->with('success','You have successfully deleted this Teacher');
    

      }
}

public function editteacher(Request $update,$id){

  if($update->isMethod('GET'))
  {
      $sessions=DB::table('sessions')->get();
      $levels=DB::table('levels')->get();
      $klasses=DB::table('klasses')->get();
      $terms=DB::table('terms')->get();
    
      $update=DB::table('users')->where('id',$id)->first();
      
      $teacher=DB::table('teachers')->where('username',$update->username)->first();
      // $student=DB::table('students')->where('username',)->first();
      //dd($teachers);
      return view('admin.editteacher',compact('sessions','levels','klasses','terms','update','teacher'));
    
  }
  elseif($update->isMethod('POST'))
    {
     
      //since we are updating, we done insta
      $user=user::find($id);
     
      DB::table('teachers')->where('username',$user->username)->update(['name'=>$update->name,'username'=>$update->username]);

      $user->name=$update->name;
      $user->username=$update->username;
      $user->session=$update->session;
      $user->gender=$update->gender;

      $user->save();

       
      return redirect()->back()->with('success','Profile successfully updated');
    }
    else
    {
        return redirect()->back()->with('error','We dont know what you are talking about');
    }    
}

  public function allresults(Request $request)
  {
     if($request->isMethod('GET'))
    {
      $results=DB::table('results')->get();
      return view('admin.viewresults',compact('results'));
    }
    elseif($request->isMethod('POST'))
    {
       $results=DB::table('results')->where([ 
      'class' =>$request->class, 'uploaded_by' =>$request->uploaded_by, 'approved' =>0, 'subject_teacher' =>$request->subject_teacher,'term' =>$request->term,'level' =>$request->level,
      'session' =>$request->session,'subject' =>$request->subject])->get();
       return view('admin.viewresultp',compact('results'));
    }  
  }

   public function approveresults(Request $request)
  {
     if($request->isMethod('GET'))
    {
      $results=DB::table('results')->select('approved','level','class','subject_teacher','term','subject','session','uploaded_by')
      ->groupBy('approved','level','class','subject','subject_teacher','term','session','uploaded_by')
      ->having('approved',0)->get();
      return view('admin.approveresults',compact('results'));
    }
     elseif($request->isMethod('POST'))
    {
       $approveresults=DB::table('results')->where([ 
                'class' =>$request->class, 'uploaded_by' =>$request->uploaded_by, 'approved' =>0, 'subject_teacher' =>$request->subject_teacher,'term' =>$request->term,'level' =>$request->level,
                'session' =>$request->session,'subject' =>$request->subject])->get();    
              foreach($approveresults as $approve )
              {
                 $approved = Result::find( $approve->id);
                 $approved->approved = 1;
                 $approved->update();
              }
         return back()->with('success','Results successfully aproved.');
    }
  }

   
//i assigned classes and subjects here
public function assignsubject(Request $request) {
        if($request->isMethod('GET'))
        {
          
          $sessions=DB::table('sessions')->get();
          $levels=DB::table('levels')->get();
          $klasses=DB::table('klasses')->get();
          $terms=DB::table('terms')->get();
          $subjects=DB::table('subjects')->get();
          $assignedsubjects=DB::table('assignsubjects')->get();
          $teachers=DB::table('teachers')->get();
         
             return view('admin.assignsubject',compact('sessions','levels','klasses','terms','assignedsubjects','subjects','teachers'));
        }  

        elseif($request->isMethod('POST'))
        {
          //dd($request);
          if($request->action == 'assign'){
          //since we are creating a new guy now
              if((($request->session == ''|| $request->level=='')||($request->klass==''||$request->term == ''))||($request->teacher ==''||$request->subject=='')){
                return back()->with('error','Select all fields sir');
              }

              $subject= new assignsubject();

            
              $subject->session=$request->session;
              $subject->level=$request->level;
              $subject->class=$request->klass;
              $subject->term=$request->term;
              $subject->name=$request->subject;
              $subject->teacher_name=$request->teacher;
              $subject->is_coordinator=$request->coordinator;
            
              $subject->save();

              return back()->with('success','subject successfully assigned');
            }
            elseif($request->action == 'delete'){
               $delete = assignsubject::find( $request->id);
                 
              $delete->delete();
               return back()->with('success','subject successfully deleted');
            }
            else
            {
                return back()->with('error','We dont know what you are talking about');
            }
        }    
}


public function assignclass(Request $request) {
        if($request->isMethod('GET'))
        {
          
          $sessions=DB::table('sessions')->get();
          $levels=DB::table('levels')->get();
          $klasses=DB::table('klasses')->get();
          $terms=DB::table('terms')->get();
          $assignedclasses=DB::table('assignclasses')->get();
          $teachers=DB::table('teachers')->get();
         
             return view('admin.assignclass',compact('sessions','levels','klasses','terms','assignedclasses','teachers'));
        }  

        elseif($request->isMethod('POST'))
        {
          //dd($request);
          if($request->action == 'assign'){
          //since we are creating a new guy now
              if((($request->session == ''|| $request->level=='')||($request->klass==''||$request->term == ''))||($request->teacher =='')){
                return back()->with('error','Select all fields sir');
              }

              //check if this class have been assigned before
               $check=DB::table('assignclasses')->where([ 
                'name' =>$request->klass, 'level' =>$request->level,'term' =>$request->term,
                'session' =>$request->session])->get();
               // dd($check);
              if($check->count() > 0){
                 return back()->with('error','This class has already been assigned');
              }

              $klass= new assignclass();          
              $klass->session=$request->session;
              $klass->level=$request->level;
              $klass->name=$request->klass;
              $klass->term=$request->term;
    
              $klass->teacher_name=$request->teacher;
             
            
              $klass->save();

              return back()->with('success','subject successfully assigned');
            }
            elseif($request->action == 'delete'){
               $delete = assignclass::find( $request->id);
                 
              $delete->delete();
               return back()->with('success','Teacher Deleted Successfully deleted');
            }
            else
            {
                return back()->with('error','We dont know what you are talking about');
            }
        }    
}

public function givestudentsclasses(Request $request){

   if($request->isMethod('GET'))
  {
    $users=DB::table('users')->where('usertype','student')->get();
    $levels=DB::table('levels')->get();
    $klasses=DB::table('klasses')->get();
    return view('admin.givestudentsclasses',compact('users','levels','klasses'));
  } 
  elseif($request->isMethod('POST'))
  {
    if($request->action=='showlevel'){
      $users=DB::table('users')->where('level',$request->level)->get();
      $levels=DB::table('levels')->get();
      $klasses=DB::table('klasses')->get();
      return view('admin.givestudentsclasses',compact('users','levels','klasses'));
    }
    elseif($request->action=='giveclass'){

      $emeka=$request->klass;
      foreach($request->student as $id){

           $student = user::find($id);
           $student->class=$emeka;
           $student->save();
           

      }
      return back()->with('success','New Class successfully assigned to the selected students');
     }
     else
     {
        return back()->with('error','We dont know what you are talking about');
   
     }

  } 
}

public function givestudentslevel(Request $request){

   if($request->isMethod('GET'))
  {
    $users=DB::table('users')->where('usertype','student')->get();
    $levels=DB::table('levels')->get();
    $klasses=DB::table('klasses')->get();
    return view('admin.givestudentslevel',compact('users','levels','klasses'));
  } 
  elseif($request->isMethod('POST'))
  {
    if($request->action=='showlevel'){
      $users=DB::table('users')->where('level',$request->level)->get();
      $levels=DB::table('levels')->get();
      $klasses=DB::table('klasses')->get();
      return view('admin.givestudentslevel',compact('users','levels','klasses'));
    }
    elseif($request->action=='givelevel'){

      $emeka=$request->level;
      foreach($request->student as $id){

           $student = user::find($id);
           $student->level=$emeka;
           $student->save();
           

      }
      return back()->with('success','New Class successfully assigned to the selected students');
     }
     else
     {
        return back()->with('error','We dont know what you are talking about');
   
     }

  } 
}

public function printstudents(Request $request){

   if($request->isMethod('GET'))
  {
    $users=DB::table('users')->where('usertype','student')->get();
    $levels=DB::table('levels')->get();
    $klasses=DB::table('klasses')->get();
    
    return view('admin.printstudents',compact('users','levels','klasses'));
  } 
  elseif($request->isMethod('POST'))
  {
    if($request->action=='level'){
      $users=DB::table('users')->where('level',$request->level)->get();
      $levels=DB::table('levels')->get();
      $klasses=DB::table('klasses')->get();
      return view('admin.printstudents',compact('users','levels','klasses'));
    }
  
    elseif($request->action=='klass'){
      $users=DB::table('users')->where('class',$request->klass)->get();
      $levels=DB::table('levels')->get();
      $klasses=DB::table('klasses')->get();
     // dd($users);
      return view('admin.printstudents',compact('users','levels','klasses'));
    }
  
   else
     {
        return back()->with('error','We dont know what you are talking about');
   
     }
 } 
}   // public function studymaterials()
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
