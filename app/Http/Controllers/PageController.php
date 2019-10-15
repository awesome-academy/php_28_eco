<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class PageController extends Controller
{
    public function index()
    {
    	return view('user.pages.home');
    }

    public function editProfile()
    {
    	return view('user.pages.profile');
    }

    public function updateProfile(Request $request, $id)
    {
    	$data = $request->all();
    	$user = User::findOrFail($id);
    	$user->update($data);
    	return redirect()->back();
    }
}
