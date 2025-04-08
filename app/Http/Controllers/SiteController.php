<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $subjects = Subject::all();
        return view('home' , compact('subjects'));
    }



}
