@extends('master')
@section('content')
<div class="container py-6">
	<!-- START MODAL -->
	<h3 class="text-center">Data Barang Keluar</h3>
</div>
<!-- END MODAL -->
<table class="table striped table-border mt-4" id="example" data-role="table" data-pagination="true">
	<thead>
		<tr>
			<th class="sortable-column sort-asc text-center">No.</th>
			<th class="sortable-column text-center">Nama</th>
			<th class="sortable-column text-center">Stok</th>
			<th class="sortable-column text-center">Tanggal</th>
			<th class="sortable-column text-center">Via</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		@foreach($produks as $produk)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $produk->nama }}</td>
			<td>{{ $produk->jumlah }} <i>{{ $produk->unit }}</i></td>
			<td>{{ $produk->created_at->format('l, j F Y') }}</td>
			<td>POS</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection