@extends('layouts.users.app-new')
@section('pageTitle', 'Profil - Konfirmasi')

@section('content')
<h5 class="mt-4 mb-3">Anda belum melakukan transaksi!</h5>

<a href="{{ url('sertifikasi')}}"><button class="btn btn-primary">Pilih Sertifikasi</button></a>
<br><br><br>

@endsection