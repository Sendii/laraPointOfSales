@extends('master')
@section('content')
<div class="container py-6">
	<!-- START MODAL -->
	<h3 class="text-center">Data Produk</h3>
	<div id="d-tambahProduk" class="dialog" data-role="dialog">
		<div class="dialog-header">
			<div class="dialog-title text-center">Tambah Produk</div>
		</div>
		<form action="{{route('produk.save')}}" method="POST">
			<div class="dialog-content">
				<div class="dialog-body">
					@csrf
					<div class="dialog-body">
						<div class='p-2'>
							<div class='abc input'>
								<input type='text' data-role='input' data-prepend='Nama' placeholder='Nama Produk' data-validate='minlength=3' class=' data-role-input='true' name='nama'>
							</div>	
							<div class='abc input'>
								<select data-role="select" name="kategori">
									<option value="">Pilih Kategori</option>
									@foreach($kategoris as $kategori)
									<option value="{{$kategori->nama}}">{{$kategori->nama}}</option>
									@endforeach
								</select>
							</div>	
							<div class='abc input'>
								<input type='number' data-role='input' data-prepend='Jumlah' placeholder='Jumlah' data-validate='minlength=6' class=' data-role-input='true' name='jumlah'>
							</div>
							<div class='abc input'>
								@foreach($satuans as $satuan)
								<label class="checkbox" for="checkbox-pcs{{$satuan->id}}">
									<input type="checkbox" data-role="checkbox" data-caption="Checkbox" id="checkbox-pcs{{$satuan->id}}" class="" data-role-checkbox="true" value="{{$satuan->nama}}" name="unit">
									<span class="check"></span>
									<span class="caption">{{$satuan->nama}}</span>
								</label>
								@endforeach
							</div>
							<div class='abc input'>
								<input type='number' data-role='input' data-prepend='Harga Beli' placeholder='Harga Beli' data-validate='minlength=5' class=' data-role-input='true' name='hargabeli'>
							</div>
							<label class="mb-2">Ppn :</label>
							<div class="mt-2 float-right">
								<label class="radio"><input value="10" name="ppn" type="radio" data-role="radio" data-caption="10%" class="" data-role-radio="true"><span class="check"></span><span class="caption">10%</span></label>
								<label class="radio"><input value="15" name="ppn" type="radio" data-role="radio" data-caption="15%" class="" data-role-radio="true"><span class="check"></span><span class="caption">15%</span></label>
								<label class="radio"><input value="20" name="ppn" type="radio" data-role="radio" data-caption="20%" class="" data-role-radio="true"><span class="check"></span><span class="caption">20%</span></label>
								<label class="radio"><input value="25" name="ppn" type="radio" data-role="radio" data-caption="25%" class="" data-role-radio="true"><span class="check"></span><span class="caption">25%</span></label>
							</div>
							<div class='abc input'>
								<input type='number' data-role='input' data-prepend='Harga Jual' placeholder='Otomatis sesuai Harga beli & Ppn' data-validate='minlength=5' class=' data-role-input='true' name='hargajual' disabled>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="dialog-actions text-right">
				<a href="{{route('produk.all')}}" class="button js-dialog-close alert"><span class="mif-cancel"></span>&nbsp;Batalkan</a>
				<button type="submit" class="button primary js-dialog-close info" onclick="Metro.notify.create('This is a notify.', 'Title', {keepOpen: false});"><span class="mif-checkmark"></span>&nbsp;Tambahkan</button>
			</div>
		</form>
	</div>
</div>
<!-- END MODAL -->
<div class="py-2">
	<button type="button" class="button button-info float-right mb-1" onclick="Metro.dialog.open('#d-tambahProduk') ">
		<span class="mif-plus icon"></span>
	Tambah Produk</button>
	<form method="POST" action="{{route('produk.pdf')}}">
		@csrf
		<button type="submit" class="button button-info float-left mb-1">
			<span class="mif-file-pdf icon"></span>
		Laporan Produk</button><br>
	</form>
</div>
<table class="table striped table-border mt-4" id="example" data-role="table" data-pagination="true">
	<thead>
		<tr>
			<th class="sortable-column sort-asc text-center">No.</th>
			<th class="sortable-column sort-asc text-center">Kode</th>
			<th class="sortable-column sort-desc text-center">Barcode</th>
			<th class="sortable-column text-center">Nama</th>
			<th class="sortable-column text-center">Kategori</th>
			<th class="sortable-column text-center">Stok</th>
			<th class="sortable-column text-center">Harga Beli</th>
			<th class="sortable-column text-center">Harga Jual</th>
			<th class="text-center">Aksi</th>
		</tr>
	</thead>
	<tbody>
		@foreach($produks as $produk)

		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $produk->kode }}</td>
			<td>{{ $produk->barcode }}</td>
			<td>{{ $produk->nama }}</td>
			<td>{{ $produk->kategori }}</td>
			<td>{{ $produk->jumlah }} <i>{{ $produk->unit }}</i></td>
			<td>{{ $produk->hargabeli }}</td>
			<td>{{ $produk->hargajual }}</td>
			<td class="text-center">
				<center>
					<a class="button info" href="{{route('produk.edit', $produk->id)}}">
						<span class="mif-pencil"></span> Edit
					</a>
					<a class="button alert" href="{{route('produk.delete', $produk->id)}}"><span class="mif-bin"></span> Delete
					</a>
				</center>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection