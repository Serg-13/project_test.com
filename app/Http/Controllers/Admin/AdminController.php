<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Response;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use DB;

class AdminController extends Controller
{

    public function show(){
    	
    	$user = Auth::user();
    	$access = $user['attributes']['access'];

    	$tasks = DB::select('SELECT tasks.*, users.name, users.email FROM tasks, users WHERE tasks.id_user = users.id');

    	return response()->view('home', ['tasks' => $tasks, 'access' => $access]);
    }
}
