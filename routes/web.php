<?php




Route::get('dashboard','StudentController@dashboard')->name('students.dashboard');

Route::get('profile','StudentController@profile')->name('studentprofile');

Route::match(['GET','POST'],'editprofile','StudentController@editprofile')->name('studenteditprofile');

Route::get('subjects','StudentController@subjects')->name('studentsubject');

Route::match(['GET','POST'],'results','StudentController@results')->name('studentresults');

Route::match(['GET','POST'],'annualresults','StudentController@annualresults')->name('studentannualresults');




// teachers route starts here
Route::get('tutor/dashboard','TeachersController@teacherdashboard')->name('teachers.dashboard');

Route::get('tutor/profile','TeachersController@teacherprofile')->name('teacherprofile');

Route::match(['GET','POST'],'tutor/editprofile','TeachersController@editprofile')->name('tutoreditprofile');

Route::get('tutor/mysubjects','TeachersController@mysubjects')->name('teachersubjects');

Route::match(['get','post'],'tutor/mysubjectsresult','TeachersController@mysubjectsresult')->name('mysubjectsresult');

Route::match(['get','post'],'tutor/deletesubresult','TeachersController@deletesubresult')->name('deletesubresult');


Route::match(['get','post'],'tutor/myclasses','TeachersController@myclasses')->name('teacher_myclasses');

Route::match(['get','post'],'tutor/myclassresult','TeachersController@myclassresult')->name('myclassresult');

//download the result sheet here
Route::get('resultsheet/{type}', 'TeachersController@resultsheet')->name('resultsheet');

Route::match(['get','post'],'tutor/uploadresults','TeachersController@uploadresults')->name('tutor.uploadresults');

Route::match(['get','post'],'tutor/classposition','TeachersController@classposition')->name('tutor.classposition');

Route::match(['get','post'],'tutor/generalclasslist','TeachersController@generalclasslist')->name('generalclasslist');

Route::match(['get','post'],'tutor/showposition','TeachersController@showposition')->name('showposition');

Route::match(['get','post'],'tutor/viewcomment','TeachersController@viewcomment')->name('viewcomment');


//admin routes begin


Route::get('admin/dashboard','AdminController@admindashboard')->name('admin.dashboard');

Route::match(['get','post'],'admin/session','AdminController@session')
			->name('admin.session');

Route::match(['get','post'],'admin/level','AdminController@level')
			->name('admin.level');

Route::match(['get','post'],'admin/class','AdminController@klass')
			->name('admin.class');

Route::match(['get','post'],'admin/subject','AdminController@subject')
			->name('admin.subject');

//register the students
Route::match(['get','post'],'admin/registerstudents','AdminController@registerstudents')
			->name('admin.registerstudents');

Route::get('downloadstudent/{type}', 'AdminController@downloadstudent')->name('downloadstudent');

Route::post('importStudent', 'AdminController@importstudent')->name('importstudent');

Route::match(['get','post'],'admin/managestudents','AdminController@managestudents')->name('admin.managestudents');

Route::match(['get','post'],'admin/editstudent/{id?}','AdminController@editstudent')->name('admin.editstudent');



//admin profile
Route::get('admin/profile','AdminController@adminprofile')->name('admin.profile');

Route::match(['get','post'],'admin/editprofile','AdminController@admineditprofile')
			->name('admin.editprofile');




//$2y$10$NCC8W8ZqbMyHOFaaLzOd2u.iSpdnhyse1qD1Abt73IABNbLuRbMQ6
//$2y$10$mOZ4nlUpcwmG2vb9vwgcSOXTLfoJdDndPuHT.wFUZuVdZ6rdEIwYy

//teachers
Route::match(['get','post'],'admin/registerteachers','AdminController@registerteachers')
			->name('admin.registerteachers');

Route::get('downloadTeacher/{type}', 'AdminController@downloadteacher')->name('downloadteacher');

Route::post('importteacher', 'AdminController@importsteacher')->name('importteacher');
Route::match(['get','post'],'admin/manageteachers','AdminController@manageteachers')->name('admin.manageteachers');

Route::match(['get','post'],'admin/editteacher/{id?}','AdminController@editteacher')->name('admin.editteacher');


//assign coureses and classes
Route::match(['get','post'],'admin/assignsubject','AdminController@assignsubject')->name('admin.assignsubject');

Route::match(['get','post'],'admin/assignclass','AdminController@assignclass')->name('admin.assignclass');


//here i took care of the results from the admin
Route::match(['get','post'],'admin/viewresults','AdminController@allresults')->name('viewresults');

Route::match(['get','post'],'admin/approveresult','AdminController@approveresults')->name('approvesresults');

//i gave student classes and levels
Route::match(['get','post'],'admin/givestudentsclasses','AdminController@givestudentsclasses')->name('givestudentsclasses');

Route::match(['get','post'],'admin/givestudentslevel','AdminController@givestudentslevel')->name('givestudentslevel');

Route::match(['get','post'],'admin/printstudents','AdminController@printstudents')->name('printstudents');


Route::get('admin/assignment','AdminController@assignment')->name('assignment');

Auth::routes();

Route::get('/', function(){

	return view('auth.login');
});


//i did all ajax requests here
Route::post('/getclass',function(\Illuminate\Http\Request $request){

	if(Request::ajax()){
		
		$term =$request->term;
		$session= $request->session;
		$klass= $request->klass;

		 $students=DB::table('users')->where([ 
                'class' =>$request->klass,'term' =>$request->term,
				'session' =>$request->session,])->get();
				 
  		return response()->json( $students, 200); 

	}

});

Route::post('/positioncomment',function(\Illuminate\Http\Request $request){

	if(Request::ajax()){
		$term =$request->term;
		$session= $request->session;
		$klass= $request->klass;
		$username=$request->username;
		$comment =$request->yourcomment;


		$result=DB::table('positions')->where(['username'=>$username,'class'=>$klass,'term'=>$term,'session'=>$session])->first();
		if(!$result){
			return 'none';
		}
		else
		{
			//now update that result in the position table, add comment
				$updated=DB::table('positions')->where(['class' =>$klass,'term' =>$term,
			'session' =>$session,'username'=>$username])->update(['teacher_comment'=>$comment]);
			
			return 'done' ;
		}
		

	}
});