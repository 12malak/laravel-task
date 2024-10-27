<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RouterController extends Controller
{
    public function index(){
        return view('login');
    }

    public function companies(){
        return view('companies');
    }

    public function employees(){
        return view('employees');
    }
}
