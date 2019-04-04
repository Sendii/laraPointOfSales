<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk as P;
use App\Kategori as K;
use App\Unit as Un;
use PDF;

class ProdukController extends Controller
{
	function allproduk() {
		$url = basename($_SERVER['REQUEST_URI']);
		// $a = P::where('jumlah', '0')->count();
		// dd($a);
		$data['no'] = 1;
		if($url == "tersedia"){
			$data['kategoris'] = K::all();
			$data['satuans'] = Un::all();
			$data['produks'] = P::where('jumlah', '>', '1')->get();
			return view('inventory/produk.all', $data);
		}elseif($url == "habis"){
			$data['satuans'] = Un::all();
			$data['produks'] = P::where('jumlah', '<', '1')->get();
			$data['kategoris'] = K::all();
			return view('inventory/produk.all', $data);
		}
	}

	function saveproduk(Request $r){
		$panjang = 10;
		$randomString = substr(str_shuffle("0123456789"), 0, $panjang);
		$new = new P;
		$new->kode = "Prd-".str_random(7);
		$new->barcode = $randomString;
		$new->nama = $r->input('nama');
		$new->kategori = $r->input('kategori');
		$new->jumlah = $r->input('jumlah');
		$new->unit = $r->input('unit');
		$new->hargabeli = $r->input('hargabeli');
		$hargabeli = $r->input('hargabeli');
		$new->hargajual = "".$r->input('hargabeli') + ($hargabeli * $r->input('ppn') / '100')."";

		$new->save();
		return redirect()->route('produk.all');
	}

	function deleteproduk($id){
		$produk = P::find($id);
		if (isset($produk)) {
			$produk->delete();
		}else{
			echo "ada kesalahann !";
		}
		return redirect()->route('produk.all');
	}

	function editproduk($id){
		$data['kategoris'] = K::all();
		$data['satuans'] = Un::all();
		$data['edit'] = P::find($id);
		return view('inventory/produk.edit', $data);
	}

	function updateproduk(Request $r){
		$edit = P::find($r->input('idproduk'));
		if (isset($edit)) {
			$edit->nama = $r->input('nama');
			$edit->kategori = $r->input('kategori');
			$edit->jumlah = $r->input('jumlah');
			$edit->unit = $r->input('unit');
			$edit->hargabeli = $r->input('hargabeli');

			$hargabeli = $r->input('hargabeli');
			$edit->hargajual = "".$r->input('hargabeli') + ($hargabeli * $r->input('ppn') / '100')."";
			$edit->save();

			return redirect()->route('produk.all');
		}else{
			echo "ada kesalahan !";
		}
	}

	function pdfproduk() {
		$data['products'] = P::all();
		$pdf = PDF::loadView('inventory/produk.pdfada', $data);
		return $pdf->download('produk.pdf');
	}
}
