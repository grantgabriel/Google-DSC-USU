<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function member(){
        return view('admin.chapter-member');
    }
}
