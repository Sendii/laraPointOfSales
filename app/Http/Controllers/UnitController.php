<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit as Un;

class UnitController extends Controller
{
    function allunit(){
		$data['units'] = Un::all();
		return view('inventory/config/unit.all', $data);
	}

	function editunit($id){
		$data['edit'] = Un::find($id);
		return view('inventory/config/unit.edit', $data);
	}

	function updateunit(Request $r){
		$edit = Un::find($r->input('idunit'));
		if (isset($edit)) {
			$edit->nama = $r->input('nama');
			$edit->save();

			return redirect()->route('unit.all');
		}else{
			echo "ada kesalahan !";
		}
	}

	function saveunit(Request $r){
		$new = new Un;
		$new->nama = $r->input('nama');
		$new->save();
		return redirect()->route('unit.all');
	}

	function deleteunit($id){
		$unit = Un::find($id);
		if (isset($unit)) {
			$unit->delete();
		}else{
			echo "ada kesalahan !";
		}
		return back();
	}
}
