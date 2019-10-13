<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __construct()
    {
//        phpinfo();
    }

    //
    public function index(){
        dd(Project::all());
        return view('home');
    }
}
