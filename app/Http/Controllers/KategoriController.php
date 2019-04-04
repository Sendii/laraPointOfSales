<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori as K;

class KategoriController extends Controller
{
    function allkategori(){
		$data['kategoris'] = K::all();
		return view('inventory/config/kategori.all', $data);
	}

	function editkategori($id){
		$data['edit'] = K::find($id);
		return view('inventory/config/kategori.edit', $data);
	}

	function updatekategori(Request $r){
		$edit = K::find($r->input('idkategori'));
		if (isset($edit)) {
			$edit->nama = $r->input('nama');
			$edit->save();

			return redirect()->route('kategori.all');
		}else{
			echo "ada kesalahan !";
		}
	}

	function savekategori(Request $r){
		$new = new K;
		$new->nama = $r->input('nama');
		$new->save();
		return redirect()->route('kategori.all');
	}

	function deletekategori($id){
		$kategori = K::find($id);
		if (isset($kategori)) {
			$kategori->delete();
		}else{
			echo "ada kesalahan !";
		}
		return back();
	}
}
