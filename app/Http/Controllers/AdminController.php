<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('admin.index');
    }

    public function subjects()
    {
        return view('admin.subjects');
    }

}
