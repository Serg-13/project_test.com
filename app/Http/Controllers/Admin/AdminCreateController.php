<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Response;
use App\Http\Controllers\Controller;

use App\User;
use Auth;
use DB;
  
class AdminCreateController extends Controller
{
	public	function show(){

		return response()->view('create');
	
	}
	public function create(Request $request){
		
		$this->validate($request, [
    		'task' => 'required' 
    	]);

		$user = Auth::user();
		$id = $user['attributes']['id'];
		
		$data = $request->all();
		
		$res = DB::insert("INSERT INTO tasks (id_user, task, status, name_image) 
						VALUES ('$id', '$data[task]', 'no', '1.jpg')");

		return redirect()->back()->with('message', 'Задание добавлен');
	}
}
