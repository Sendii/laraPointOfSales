@extends('master')

@section('content')
<div style="margin-left: 10px;">
	<h2>Edit Data Produk {{$edit->nama}}</h2>
</div>
<form action="{{route('produk.update')}}" method="POST">
	@csrf
	<div class="cell-md-8">
       <div class="panel float-center" id="57aa5589-e2af-4940-aa99-f8206debe8c8">
          <div data-role="panel" data-title-icon="<span class='mif-apps'></span>" data-title-caption="Panel title" data-collapsible="true" class="panel-content" data-role-panel="true" style="">
            <div class='abc input'>
                <input type='text' data-role='input' data-prepend='Nama' placeholder='Nama Produk' data-validate='minlength=3' class=' data-role-input='true' name='nama' value="{{$edit->nama}}">
            </div>  
            <div class='abc input'>
                <select data-role="select" name="kategori">
                    @foreach($kategoris as $kategori)
                    <option value="{{$kategori->nama}}" {{$edit->kategori == $kategori->nama ? 'selected' : ''}}> {{$kategori->nama}}
                    </option>
                    @endforeach
                </select>
            </select>
        </div>  
        <div class='abc input'>
            <input type='number' data-role='input' data-prepend='Jumlah' placeholder='Jumlah' data-validate='minlength=6' class=' data-role-input='true' name='jumlah' value="{{$edit->jumlah}}">
        </div>
        <div class='abc input'>
            <label class="checkbox disabled float-right" for="checkbox-pcs">
                <input type="checkbox" data-role="checkbox" data-caption="Checkbox" id="checkbox-pcs" class="" data-role-checkbox="true" value="{{$edit->unit}}" name="unit" checked>
                <span class="check float-right"></span>
                <span class="caption"><b>{{$edit->unit}}</b></span>
            </div>
            <div class='abc input'>
                <input type='number' data-role='input' data-prepend='Harga Beli' placeholder='Harga Beli' data-validate='minlength=5' class=' data-role-input='true' name='hargabeli' value="{{$edit->hargabeli}}">
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
            <input type="hidden" name="idproduk" value="{{$edit->id}}">
            <button type="submit" class="button success float-right" style="margin-top: 5px;"><span class="mif mif-pencil"></span> Edit Data</button>
        </div>
        <div class="panel-title">
          <span class="caption">Panel title</span>
          <span class="mif-apps icon"></span>
      </div>
  </form>
</div>
@endsection