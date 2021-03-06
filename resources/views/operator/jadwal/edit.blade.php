@extends('layouts.op.app-operator')

@section('pageTitle', 'Edit Jadwal')

@section('content')
<div class="box box-default"> <!-- start box default -->
  <div class="box-header with-border">
    <h3 class="box-title">Buat Jadwal</h3>
  </div>
  <div class="box-body"> <!-- start box body -->
    <div class="row"> <!-- start row -->
      <div class="col-md-6"> <!-- start col md 6 -->
      <form method="POST" action="{{ url('operator/jadwal/'.$jadwal->id) }}" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
          <div class="form-group">
            <label>Kategori</label><br>
            <select class="form-control select2" name="id_kategori" style="width: 100%;">
              @foreach($kategori as $key)
              <option value="{{ $key->id }}" data-tokens="{{ $key->nama_sp }}">{{ $key->nama_sp }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label>Nama Skema</label>
            <input type="text" class="form-control" name="nama" placeholder="Nama Skema" value="{{ $jadwal->nama }}">
          </div>
          <div class="form-group">
            <label>Tanggal Mulai</label> <?php $date = date('Y-m-d');  ?>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="date" class="form-control pull-right" id="datepicker" name="tanggal_mulai" value="{{ $jadwal->tanggal_mulai }}">
            </div>
          </div>
          <div class="form-group">
            <label>Tanggal Selesai</label>
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="date" class="form-control pull-right" id="datepicker" name="tanggal_selesai" value="{{ $jadwal->tanggal_selesai }}">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label>Waktu Mulai</label>
                <div class="input-group bootstrap-timepicker timepicker" >
                  <input id="timepicker1" name="jam_mulai" type="text" class="form-control timepicker input-small" value="{{ $jadwal->waktu }}">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                </div>
              </div>
            </div>
          </div>          
       
        </div> <!-- end col md 6 -->
        <div class="col-md-6"> <!-- start col md 6 -->
          <div class="form-group">
            <label>Alamat</label>
            <textarea placeholder="Alamat" name="lokasi" class="form-control">{{ $jadwal->lokasi }}</textarea>
          </div>
          <div class="form-group">
            <label>Biaya</label>
            <input type="text" id="inputku" onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);"
            class="form-control" name="biaya" placeholder="Biaya" value="{{ $jadwal->biaya }}">
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea placeholder="Isi Deskripsi" name="isi" class="form-control">{{ $jadwal->isi }}</textarea>
          </div>
          <div class="form-group">
            <label>Status</label><br>
            <select name="status" class="form-control select2">
              <option value="1">Buka</option>
              <option value="2">Tutup</option>
            </select>
          </div>  
          <div class="form-group">
            <label>Kuota (contoh: 30)</label>
            <input type="text" class="form-control"  name="kuota" placeholder="Kuota" value="{{ $jadwal->kuota }}">
          </div>
        </div> <!-- end col md 6 -->
        <div class="col-lg-12"> <!-- start col 12 -->
          <div class="form-group">
            <label>Info</label>
            <textarea required placeholder="Isi Berita" id="content1" name="info" class="form-control">{{$jadwal->info}}</textarea>
          </div>
          <div class="form-group">
            <label>Skema</label>
            <textarea required placeholder="Skema" id="content2" required name="skema" class="form-control">{{$jadwal->skema}}</textarea>
          </div>
        </div> <!-- end col 12 -->

      </div> <!-- end row -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-default pull-right">Cancel</button>
      </div>
    </form>   
  </div> <!-- end box body -->
</div> <!-- end box default -->



@section('js')
<script type="text/javascript">
  function tandaPemisahTitik(b){
    var _minus = false;
    if (b<0) _minus = true;
    b = b.toString();
    b=b.replace(".","");
    b=b.replace("-","");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--){
      j = j + 1;
      if (((j % 3) == 1) && (j != 1)){
        c = b.substr(i-1,1) + "." + c;
      } else {
        c = b.substr(i-1,1) + c;
      }
    }
    if (_minus) c = "-" + c ;
    return c;
  }

  function numbersonly(ini, e){
    if (e.keyCode>=49){
      if(e.keyCode<=57){
        a = ini.value.toString().replace(".","");
        b = a.replace(/[^\d]/g,"");
        b = (b=="0")?String.fromCharCode(e.keyCode):b + String.fromCharCode(e.keyCode);
        ini.value = tandaPemisahTitik(b);
        return false;
      }
      else if(e.keyCode<=105){
        if(e.keyCode>=96){
//e.keycode = e.keycode - 47;
a = ini.value.toString().replace(".","");
b = a.replace(/[^\d]/g,"");
b = (b=="0")?String.fromCharCode(e.keyCode-48):b + String.fromCharCode(e.keyCode-48);
ini.value = tandaPemisahTitik(b);
//alert(e.keycode);
return false;
}
else {return false;}
}
else {
  return false; }
}else if (e.keyCode==48){
  a = ini.value.replace(".","") + String.fromCharCode(e.keyCode);
  b = a.replace(/[^\d]/g,"");
  if (parseFloat(b)!=0){
    ini.value = tandaPemisahTitik(b);
    return false;
  } else {
    return false;
  }
}else if (e.keyCode==95){
  a = ini.value.replace(".","") + String.fromCharCode(e.keyCode-48);
  b = a.replace(/[^\d]/g,"");
  if (parseFloat(b)!=0){
    ini.value = tandaPemisahTitik(b);
    return false;
  } else {
    return false;
  }
}else if (e.keyCode==8 || e.keycode==46){
  a = ini.value.replace(".","");
  b = a.replace(/[^\d]/g,"");
  b = b.substr(0,b.length -1);
  if (tandaPemisahTitik(b)!=""){
    ini.value = tandaPemisahTitik(b);
  } else {
    ini.value = "";
  }

  return false;
} else if (e.keyCode==9){
  return true;
} else if (e.keyCode==17){
  return true;
} else {
//alert (e.keyCode);
return false;
}

}

$('.timepicker').timepicker({
  showInputs: false
})

$(document).ready(function(){    
  setTimeout(function(){
    CKEDITOR.replace('content1', {
      width : '99%',height : '300px',    
      filebrowserUploadUrl: '{{ url('operator/berita/gambar') }}',
    });
  },1000);
});
$(document).ready(function(){    
  setTimeout(function(){
    CKEDITOR.replace('content2', {
      width : '99%',height : '300px',    
      filebrowserUploadUrl: '{{ url('operator/berita/gambar') }}',
    });
  },1000);
});
</script>
@endsection
@endsection
