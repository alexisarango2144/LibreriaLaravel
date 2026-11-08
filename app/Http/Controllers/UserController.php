<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($username){
        return view('user', ['username' => $username]);
    }
}
    