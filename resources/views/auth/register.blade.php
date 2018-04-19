@extends('layouts.users.app')
@section('pageTitle', 'Register')

@section('content')
<div class="grid">
  <div class="row cellsN">  
    <div class="cell">

      <h2>Register</h2>

      Daftarkan diri Anda dan dapatkan pelatihan sekarang!
      <hr>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
       {{ csrf_field() }}
       <table style="width:100%">
        <tr>
          <td>No. Identitas (KTP/SIM)</td>
          <td>Nama Lengkap</td>
        </tr>
        <tr>
          <td>
            <div class="input-control text full-size">
              <input type="number" name="number" required>

            </div>
          </td>
          <td>
            <div class="input-control text full-size">
              <input type="text" name="name" required>
            </div>
          </td>
        </tr>            
        <tr>
          <td>Username</td>
          <td>Kewarganegaraan</td>
        </tr>
        <tr>
          <td>
            <div class="input-control text full-size">
              <input type="text" name="username" required>                
            </div>
          </td>
          <td>
            <div class="input-control select full-size">
              <select required name="citizenship">
                <option value="WNI">WNI</option>
                <option value="WNA">WNA</option>
              </select>
            </div>
          </td>
        </tr>
        <tr>
          <td>Instansi</td>
          <td>Agama</td>
        </tr>
        <tr>
          <td>
            <div class="input-control text full-size">
              <input type="text" name="instansi" required>
            </div>
          </td>
          <td>
            <div class="input-control text full-size">
              <input type="text" name="religion" required>
            </div>
          </td>
        </tr>
        <tr>
         <td>Jenis Kelamin</td>
         <td>No. Telp (HP)</td>
       </tr>
       <tr>
         <td>
          <div class="input-control select full-size">
            <select required name="gender">
              <option value="Laki - Laki" >Laki - Laki</option>
              <option value="Perempuan" >Perempuan</option>
            </select>
          </div>
        </td>
        <td>
          <div class="input-control text full-size">
           <input type="number" min="8" name="telp" required>
         </div>
       </td>
     </tr>
     <tr>
      <tr>
        <td>Tempat Lahir</td>
        <td>Tanggal Lahir</td>
      </tr>
      <tr>
        <td>
          <div class="input-control text full-size">
            <input type="text" required name="place" required>
          </div>
        </td>
        <td>
          <div class="input-control text full-size" data-role="datepicker" data-format="dd mmmm yyyy">
            <?php $date = date('Y-m-d');  ?>
            <input type="text" name="date" required value="{{ date('j F Y', strtotime($date)) }}">
            <button class="button"><span class="mif-calendar"></span></button>
          </div>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>Password</td>
      </tr>
      <tr>
        <td>
          <div class="input-control text full-size">
            <input type="email" required name="email">
          </div>
        </td>
        <td>
          <div class="input-control text full-size">
            <input type="password" required name="password">              
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">Alamat</td>
      </tr>
      <tr>
        <td colspan="2">
          <div class="input-control textarea full-size">
            <textarea required name="addr"></textarea>
          </div>
        </td>
      </tr>
      <tr>
        <td colspan="2">
         <br><div class="g-recaptcha" data-sitekey="6Lff6C0UAAAAADecOFWMqGGpfXWjsf0CFKRSP0NG"></div>
       </td>
     </tr>
     <tr>
      <td colspan="2">
        <button class="button submit place-left">Register</button>
      </td>
    </tr>
  </table>
</form>

</div>
</div>
</div>

@if(count($errors) > 0 )

@foreach($errors->all() as $error)

<script type="text/javascript">
  $(function(){
    setTimeout(function(){
      $.Notify({type: 'default', icon: "<span class='mif-notification mif-ani-shuttle mif-ani-slow'></span>", keepOpen: true, caption: '#', content: "{{ $error }}"});
    }, 0);
  });
</script>
@endforeach

@endif
@endsection
