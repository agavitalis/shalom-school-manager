<?php




Route::get('dashboard','StudentController@dashboard')->name('student.dashboard');

Route::get('profile','StudentController@profile')->name('studentprofile');

Route::get('editprofile','StudentController@editprofile')->name('studenteditprofile');

Route::get('subjects','StudentController@subjects')->name('studentsubject');

Route::get('scheme','StudentController@scheme')->name('studentscheme');

Route::get('announcement','StudentController@announcement')->name('studentannouncement');

Route::get('assignment','StudentController@assignment')->name('studentassignment');

Route::get('results','StudentController@results')->name('studentresults');




// teachers route starts here
Route::get('tutor/dashboard','TeachersController@teacherdashboard')->name('teachers.dashboard');

Route::get('tutor/classlist','TeachersController@classlist')->name('classlist');

Route::get('tutor/profile','TeachersController@teacherprofile')->name('teacherprofile');

Route::get('tutor/editprofile','TeachersController@teachereditprofile')->name('teachereditprofile');

Route::get('tutor/subjects','TeachersController@teachersubjects')->name('teachersubjects');

Route::get('tutor/studymaterials','TeachersController@studymaterials')->name('studymaterials');

Route::get('tutor/schemeofwork','TeachersController@schemeofwork')->name('courseoutline');

Route::get('tutor/assignment','TeachersController@assignment')->name('assignment');

Route::get('tutor/uploadassignment','TeachersController@uploadassignment')->name('uploadassignment');

Route::get('tutor/mystudents','TeachersController@mystudents')->name('mystudents');

Route::get('tutor/myclassresult','TeachersController@myclassresult')->name('myclassresult');

Route::get('tutor/mysubjectsresult','TeachersController@mysubjectsresult')->name('mysubjectsresult');

Route::match(['get','post'],'tutor/uploadresults','TeachersController@uploadresults')
->name('tutor.uploadresults');

Route::get('tutor/announcements','TeachersController@teachersannouncements')->name('teachersannouncements');

Route::get('tutor/myannouncements','TeachersController@myannouncements')->name('myannouncements');

Route::get('tutor/uploadannouncement','TeachersController@uploadannouncement')->name('uploadannouncement');




//admin routes begin


Route::get('admin/dashboard','adminController@admindashboard')->name('admin.dashboard');

Route::match(['get','post'],'admin/session','adminController@session')
			->name('admin.session');

Route::match(['get','post'],'admin/level','adminController@level')
			->name('admin.level');

Route::match(['get','post'],'admin/class','adminController@klass')
			->name('admin.class');

Route::match(['get','post'],'admin/subject','adminController@subject')
			->name('admin.subject');

//register the students
Route::match(['get','post'],'admin/registerstudents','adminController@registerstudents')
			->name('admin.registerstudents');

Route::get('downloadStudent/{type}', 'adminController@downloadstudent')->name('downloadstudent');

Route::post('importStudent', 'adminController@importstudent')->name('importstudent');

Route::match(['get','post'],'admin/managestudents','adminController@managestudents')->name('admin.managestudents');

Route::match(['get','post'],'admin/editstudent/{id?}','adminController@editstudent')->name('admin.editstudent');



//admin profile
Route::get('admin/profile','adminController@adminprofile')->name('admin.profile');

Route::match(['get','post'],'admin/editprofile','adminController@admineditprofile')
			->name('admin.editprofile');




//$2y$10$NCC8W8ZqbMyHOFaaLzOd2u.iSpdnhyse1qD1Abt73IABNbLuRbMQ6
//$2y$10$mOZ4nlUpcwmG2vb9vwgcSOXTLfoJdDndPuHT.wFUZuVdZ6rdEIwYy

//teachers
Route::match(['get','post'],'admin/registerteachers','adminController@registerteachers')
			->name('admin.registerteachers');

Route::get('downloadTeacher/{type}', 'adminController@downloadteacher')->name('downloadteacher');

Route::post('importTeacher', 'adminController@importstudent')->name('importteacher');
Route::get('admin/manageteachers','adminController@manageteachers')->name('admin.manageteachers');

Route::match(['get','post'],'admin/editteacher/{id?}','adminController@editteacher')->name('admin.editteacher');


//assign coureses and classes
Route::match(['get','post'],'admin/assignsubject','adminController@assignsubject')->name('admin.assignsubject');

Route::match(['get','post'],'admin/assignclass','adminController@assignclass')->name('admin.assignclass');


//here i took care of the results from the admin
Route::match(['get','post'],'admin/viewresults','adminController@allresults')->name('viewresults');

Route::match(['get','post'],'admin/approveresult','adminController@approveresults')->name('approvesresults');




Route::get('admin/assignment','adminController@assignment')->name('assignment');

Auth::routes();

Route::get('/', function(){

	return view('auth.login');
});


