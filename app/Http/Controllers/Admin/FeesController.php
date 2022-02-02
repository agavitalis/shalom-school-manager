<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Session;
use App\Model\Level;
use App\Model\Klass;

class FeesController extends Controller
{
    public function createFeesGet(Request $request)
    {
        $sessions = Session::all();
        $levels = Level::all();
        $klasses = Klass::all();
        return view('admin.fees.create', compact('sessions', 'levels', 'klasses'));
    }

    public function createFeesPost(Request $request)
    {
        $sessions = Session::all();
        $levels = Level::all();
        $klasses = Klass::all();
        return view('admin.fees.create', compact('sessions', 'levels', 'klasses'));
    }

    public function manageFees(Request $request)
    {
        $sessions = Session::all();
        $levels = Level::all();
        $klasses = Klass::all();
        return view('admin.fees.manage', compact('sessions', 'levels', 'klasses'));
    }
}
