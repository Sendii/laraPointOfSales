<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit as Un;
use App\Bahan as B;

class BahanController extends Controller
{
    function allbahan(){
		$data['units'] = Un::all();
		$data['bahans'] = B::all();
		return view('inventory/config/bahan.all', $data);
	}

	function editbahan($id){
		$data['edit'] = B::find($id);
		$data['units'] = Un::all();
		return view('inventory/config/bahan.edit', $data);
	}

	function updatebahan(Request $r){
		$edit = B::find($r->input('idbahan'));
		if (isset($edit)) {
			$edit->nama = $r->input('nama');
			$edit->unit = $r->input('namasatuan');
			$edit->save();

			return redirect()->route('bahan.all');
		}else{
			echo "ada kesalahan !";
		}
	}

	function savebahan(Request $r){
		$new = new B;
		$new->nama = $r->input('nama');
		$new->unit = $r->input('unit');
		$new->save();
		return redirect()->route('bahan.all');
	}

	function deletebahan($id){
		$bahan = B::find($id);
		if (isset($bahan)) {
			$bahan->delete();
		}else{
			echo "ada kesalahan !";
		}
		return back();
	}

}
