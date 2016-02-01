<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function edit($id)
    {
        return view('admin.users.edit');
    }
    
    public function update(Request $request)
    {
	    $input = $request;
	    dd($input);
        return view('admin.users.edit');
    }
}
