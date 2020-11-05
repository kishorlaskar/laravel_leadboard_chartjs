<?php

namespace App\Http\Controllers;

use App\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
//    public function __construct() {
//        $this->middleware('auth');
//        $this->middleware('admin')->except(['index', 'show']);
//
//
//    }
    public function index()
    {
        $topics = Topic::all();
        return view('welcome',['topics'=>$topics]);
    }
}
