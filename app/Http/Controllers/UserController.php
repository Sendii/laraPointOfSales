<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User as U;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	function alluser(){
		$data['users'] = U::all();
		$data['no'] = 1;

		return view('master/user.all', $data);
	}

	function edituser($id){
		$data['edit'] = U::find($id);
		return view('master/user.edit', $data);
	}

	function updateuser(Request $r){
		$edit = U::find($r->input('iduser'));
		if (isset($edit)) {
			$edit->name = $r->input('nama');
			$edit->email = $r->input('email');
			$edit->akses = $r->input('akses');
			$edit->password = Hash::make($r->input('password'));
			$edit->save();

			return redirect()->route('user.all');
		}else{
			echo "ada kesalahan !";
		}
	}

	function deleteuser($id){
		$user = U::find($id);
		if (isset($user)) {
			$user->delete();
		}else{
			echo "ada kesalahann !";
		}
		return redirect()->route('user.all');
	}

	function saveuser(Request $r){
		$new = new U;
		$new->name = $r->input('nama');
		$new->email = $r->input('email');
		$new->akses = $r->input('akses');
		$new->password = Hash::make($r->input('password'));

		$new->save();
		return redirect()->route('user.all');
	}
}
