<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

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

    public function editprofile()
    {
        return view('students.editprofile');
    }

     public function subjects()
    {
        return view('students.subjects');
    }

     public function scheme()
    {
        return view('students.scheme');
    }
    public function announcement()
    {
        return view('students.announcement');
    }

     public function assignment()
    {
        return view('students.assignment');
    }

     public function results()
    {
        return view('students.results');
    }
}
