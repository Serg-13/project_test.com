<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Response;
use App\Http\Controllers\Controller;

use App\User;
use DB;

class AdminUpdateController extends Controller
{
    public function show(Request $request, $id){

   		$task = DB::select("SELECT * FROM tasks WHERE id = '$id'");

		return response()->view('update', ['task' => $task['0']]);
	
	}
	public function update(Request $request, $id){

   		$data = $request->all();
		
		$res = DB::update("UPDATE tasks SET task = '$data[task]' WHERE id = '$id'");

		return redirect()->back()->with('message', 'Задание обновлено');
	
	}
}
