@extends('master')

@section('content')
<div style="margin-left: 10px;">
	<h2>Edit Data Bahan {{$edit->nama}}</h2>
</div>
<form action="{{route('bahan.update')}}" method="POST">
	@csrf
	<div class="cell-md-8">
	<div class="panel float-center" id="57aa5589-e2af-4940-aa99-f8206debe8c8">
		<div data-role="panel" data-title-icon="<span class='mif-apps'></span>" data-title-caption="Panel title" data-collapsible="true" class="panel-content" data-role-panel="true" style="">
                        <input type='text' data-role='input' data-prepend='Nama Kategori' placeholder='Nama Kategori' class=' data-role-input='true' name='nama' value="{{$edit->nama}}" required>
                        <input type="hidden" name="idbahan" value="{{$edit->id}}">
                        <select data-role="select" name="namasatuan" data-prepend='Satuan' style="margin-top: 5px;">
                        @foreach($units as $unit)
                                        <option value="{{$unit->nama}}" {{$edit->unit == $unit->nama ? 'selected' : ''}}> {{$unit->nama}}
                                        </option>
                                        @endforeach
                                    </select>
                        <button type="submit" class="button success float-right" style="margin-top: 5px;"><span class="mif-pencil"></span>Edit Data</button>
         </div>
     <div class="panel-title">
     	<span class="caption">Panel title</span>
     	<span class="mif-apps icon"></span>
     </div>
</form>
</div>
@endsection