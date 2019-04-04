<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	table, td, th {  
		border: 1px solid #ddd;
		text-align: left;
	}

	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		padding: 15px;
	}
	th {
		background-color: #B9D1EA;
	}
</style>
<title></title>
</head>
<body>
	<center>
		<i>
			<h2>POS SMKN 10 Jakarta</h2>
			<h4 style="margin-top: -25px;">Jl. Mayjendd Sutoyo, Cawang, KramatJati</h4>
			<h4 style="margin-top: -20px;">Rt/Rw 02/09, Jakarta Timur</h4>
		</i>
	</center>
	<div style="margin-left: 5px;">
		<h4>No Telp: (021) 8091773</h4>
		<h4 style="margin-top: -20px;">Kode Pos: 13630</h4>
		<h4 style="margin-top: -20px;">Deskripsi: Ini smkn 10 Jakarta</h4>
	</div>
	<table>
		<thead>
			<tr>
				<th class="sortable-column sort-asc text-center">Nama</th>
				<th class="sortable-column sort-asc text-center">Kode Transaksi</th>
				<th class="sortable-column sort-asc text-center">Qty</th>
				<th class="sortable-column sort-asc text-center">Harga</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pos as $key)
			<tr>
				<td>{{$key->nama}}</td>
				<td>{{$key->kodetransaksi}}</td>
				<td>{{$key->jumlah}} {{$key->unit}}</td>
				<td>Rp. {{$key->harga}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>