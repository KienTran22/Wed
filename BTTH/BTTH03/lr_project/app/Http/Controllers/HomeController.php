<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Medicine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $medicines = Medicine::all();
        return view("home", compact("medicines"));
    }
}
