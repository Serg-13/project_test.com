<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Response;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use DB;

class AdminDoneController extends Controller
{
    public function done_yes(Request $request, $id){

    	$res = DB::update("UPDATE tasks SET status = 'yes' WHERE id = '$id'");

		return redirect()->back()->with('message', 'Задание обновлено');
    }

    public function done_no(Request $request, $id){

    	$res = DB::update("UPDATE tasks SET status = 'no' WHERE id = '$id'");

		return redirect()->back()->with('message', 'Задание обновлено');
    }
}
