@extends('layouts.admin.app-admin')

@section('pageTitle', 'Settings')

@section('content')
<div class="col-md-12">
  <div class="row">
    @if(session('sukses'))
    <div class="alert alert-success alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h4><i class="icon fa fa-check"></i>Berhasil</h4>
      {{ session('sukses')}}
    </div>
    @endif
    <!-- Custom Tabs -->
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Settings</a></li>
        <li><a href="#tab_2" data-toggle="tab">Web Color</a></li>
        <li><a href="#tab_3" data-toggle="tab">Social Media</a></li>   
        <li><a href="#tab_4" data-toggle="tab">Kontak</a></li>  
        <li><a href="#tab_5" data-toggle="tab">Meta Tag</a></li>  
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tab_1">

         <form method="POST" action="{{ url('admin/settings') }}" enctype="multipart/form-data" role="form">
          {{ csrf_field() }}
          <div class="form-group">
            <label>Nama Website</label>
            <input type="text" required class="form-control" value="{{ $setting->nama_web }}" name="nama" placeholder="Nama Website">
          </div>
          <div class="form-group">
            <label>Title</label>
            <input type="text" required class="form-control" value="{{ $setting->title }}" name="title" placeholder="Title">
          </div>
          <div class="form-group">
            <label>Logo</label>
            <input name="logo" type="file">
            <p class="help-block">File berformat PNG, JPG, JPEG, GIF, ICO</p>
          </div>
        </div>
        <!-- /.tab-pane -->
        <div class="tab-pane" id="tab_2">
          <div class="form-group">
            <label>Web Color</label>
            <select class="form-control" name="webcolor" style="width: 100%;">
              <option value="red" {{ ($setting->color_web=='red')?'selected':'' }}>Red</option>
              <option value="blue" {{ ($setting->color_web=='blue')?'selected':'' }}>Blue</option>
              <option value="green" {{ ($setting->color_web=='green')?'selected':'' }}>Green</option>
              <option value="orange" {{ ($setting->color_web=='orange')?'selected':'' }}>Orange</option>
            </select>
          </div>
          <div class="form-group">
            <label>Admin Web Color</label>
            <select class="form-control" name="admincolor" style="width: 100%;">
              <option disabled selected="selected">--- Color ---</option>    
              <option value="skin-red" {{ ($setting->color_admin=='skin-red')?'selected':'' }}>Red</option>
              <option value="skin-blue" {{ ($setting->color_admin=='skin-blue')?'selected':'' }}>Blue</option>
              <option value="skin-yellow" {{ ($setting->color_admin=='skin-yellow')?'selected':'' }}
                >Yellow</option>
                <option value="skin-green" {{ ($setting->color_admin=='skin-green')?'selected':'' }}>Green</option>
                <option value="skin-purple" {{ ($setting->color_admin=='skin-purple')?'selected':'' }}>Purple</option>
                <option value="skin-black" {{ ($setting->color_admin=='skin-black')?'selected':'' }}>Black</option>
                <option disabled>--- Light ---</option>
                <option value="skin-red-light" {{ ($setting->color_admin=='skin-red-light')?'selected':'' }}>Red Light</option>
                <option value="skin-blue-light" {{ ($setting->color_admin=='skin-blue-light')?'selected':'' }}>Blue Light</option>             
                <option value="skin-yellow-light" {{ ($setting->color_admin=='skin-yellow-light')?'selected':'' }}>Yellow Light</option>
                <option value="skin-green-light" {{ ($setting->color_admin=='skin-green-light')?'selected':'' }}>Green Light</option>
                <option value="skin-purple-light" {{ ($setting->color_admin=='skin-purple-light')?'selected':'' }}>Purple Light</option>
                <option value="skin-black-light" {{ ($setting->color_admin=='skin-black-light')?'selected':'' }}>Black Light</option>
              </select>
            </div>
            <div class="form-group">
              <label>Operator Web Color</label>
              <select class="form-control" name="opcolor" style="width: 100%;">
               <option disabled selected="selected">--- Color ---</option>    
               <option value="skin-red" {{ ($setting->color_operator=='skin-red')?'selected':'' }}>Red</option>
               <option value="skin-blue" {{ ($setting->color_operator=='skin-blue')?'selected':'' }}>Blue</option>
               <option value="skin-yellow" {{ ($setting->color_operator=='skin-yellow')?'selected':'' }}
                >Yellow</option>
                <option value="skin-green" {{ ($setting->color_operator=='skin-green')?'selected':'' }}>Green</option>
                <option value="skin-purple" {{ ($setting->color_operator=='skin-purple')?'selected':'' }}>Purple</option>
                <option value="skin-black" {{ ($setting->color_operator=='skin-black')?'selected':'' }}>Black</option>
                <option disabled>--- Light ---</option>
                <option value="skin-red-light" {{ ($setting->color_operator=='skin-red-light')?'selected':'' }}>Red Light</option>
                <option value="skin-blue-light" {{ ($setting->color_operator=='skin-blue-light')?'selected':'' }}>Blue Light</option>             
                <option value="skin-yellow-light" {{ ($setting->color_operator=='skin-yellow-light')?'selected':'' }}>Yellow Light</option>
                <option value="skin-green-light" {{ ($setting->color_operator=='skin-green-light')?'selected':'' }}>Green Light</option>
                <option value="skin-purple-light" {{ ($setting->color_operator=='skin-purple-light')?'selected':'' }}>Purple Light</option>
                <option value="skin-black-light" {{ ($setting->color_operator=='skin-black-light')?'selected':'' }}>Black Light</option>
              </select>
            </div>
            <div class="form-group">
              <label>Icon</label>
              <input name="favicon" type="file">
              <p class="help-block">File berformat PNG, JPG, JPEG, GIF, ICO</p>
            </div>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_3">
           <form method="POST" action="{{ url('admin/settings') }}" enctype="multipart/form-data" role="form">
            {{ csrf_field() }}
            <div class="form-group">
              <label>Facebook</label> (ex. facebook.com/fanspage)
              <input type="text" required class="form-control" value="{{ $setting->facebook }}" name="facebook" placeholder="Url Facebook">
            </div>
            <div class="form-group">
              <label>Twitter</label> (ex. @twitter)
              <input type="text" required class="form-control" value="{{ $setting->twitter }}" name="twitter" placeholder="Twitter">
            </div>
            <div class="form-group">
              <label>Instagram</label> (ex. @instagram)
              <input type="text" required class="form-control" value="{{ $setting->instagram }}" name="instagram" placeholder="Instagram">
            </div>
          </div>
          <div class="tab-pane" id="tab_4">
            <div class="form-group">
              <label>Nama Perusahaan</label>
              <input type="text" required class="form-control" value="{{ $setting->nama_web }}" name="nama" placeholder="Nama Website">
            </div>
            <div class="form-group">
              <label>Kontak Email</label>
              <input type="email" required class="form-control" value="{{ $setting->email }}" name="email" placeholder="Kontak Email">
            </div>
            <div class="form-group">
              <label>Telp</label>
              <input type="text" required class="form-control" value="{{ $setting->title }}" name="title" placeholder="Title">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="meta_description" style="resize: none;" class="form-control" rows="3"></textarea>
            </div>
          </div>
          <div class="tab-pane" id="tab_5">
            <form method="POST" action="{{ url('admin/settings') }}" enctype="multipart/form-data" role="form">
              {{ csrf_field() }}
              <div class="form-group">
                <label>Meta Title</label>
                <input type="text" required class="form-control" value="{{ $setting->meta_title }}" name="meta_title" placeholder="Meta Title">
              </div>     
              <div class="form-group">
                <label>Meta Description</label>
                <textarea name="meta_description" style="resize: none;" class="form-control" rows="3" placeholder="Meta Description max. 160 karakter">{{ $setting->meta_description }}</textarea>
              </div>
              <div class="form-group">
                <label>Meta Keywords</label> Pisahkan dengan koma (ex. Pelatihan, Lembaga Pelatihan, Sertifikasi) 
                <input type="text" required class="form-control" value="{{ $setting->meta_keywords }}" name="meta_keywords" placeholder="Meta Keywords">
              </div>
              <div class="form-group">
                <label>Google Site Verification</label>
                <input type="text" required class="form-control" value="{{ $setting->google_site_verification }}" name="google_site_verification" placeholder="Google Site Verification">
              </div>
              <div class="form-group">
                <label>Bing Authentication Code</label>
                <input type="text" required class="form-control" value="{{ $setting->bing }}" name="bing" placeholder="Bing Authentication Code">
              </div>

              <div class="box-footer">
                {{csrf_field()}}
                <button type="submit" class="btn btn-primary">Save Settings</button>
                &nbsp;<a href="https://idcloudhost.com/mengetahui-fungsi-dari-tag-meta-tag-dan-meta-tag-description/" target="_blank">Apa itu Meta Tag?</a>
              </div>  
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection
