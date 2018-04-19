@extends('layouts.users.app-')
@section('pageTitle', 'Checkout - Informasi')

@section('content')
<div class="grid">
  <div class="row cells12">
    <div class="cell colspan8">      
      <div class="cell">
        <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach collapsible collapsed" data-role="panel">
          <div class="heading">
            <span class="title">Tunai</span>
          </div>
          <div class="content padding10">
           Ketentuan Pembayaran Tunai Setelah Anda memilih Pembayaran Tunai maka Anda akan mendapatkan bukti pemesanan, Anda bisa membawanya ke Kantor kami.
           <form action="{{ url('pembayaran/checkout/informasipembayaran') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="bank" value="#">
            <input type="hidden" name="id" value="#">
            <button class="button" type="submit">Konfirmasi via Tunai</button>
          </form>
        </div>
      </div><br>
      @foreach($bank as $key)
      <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach collapsible collapsed" data-role="panel">
        <div class="heading">
          <span class="title">{{ $key->nama_bank }}</span>
        </div>
        <div class="content padding10">
         Pembayaran via  {{ $key->nama_bank }}, Setelah Transfer dimohon melakukan konfirmasi dengan memphoto bukti transfer Anda.
         <form action="{{ url('pembayaran/checkout/informasipembayaran') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="bank" value="{{ $key->id }}">

          <button class="button">Konfirmasi via {{ $key->nama_bank }}</button>
        </form>
      </div>
    </div><br>
    @endforeach
  </div>
</div>   

<div class="cell colspan4">
 <div class="panel @foreach($aa as $ss) @if($ss->color_web == 'blue') navy @elseif($ss->color_web == 'red') danger @elseif($ss->color_web == 'green') success @elseif($ss->color_web == 'orange') warning @endif @endforeach">
  <div class="heading">
    <span class="title">Rincian Sertifikasi</span>
  </div>
  <div class="content" style="padding: 10px 10px 10px 10px;">

  </form>
</div>
</div>
</div>
</div>
</div>
@endsection
