@extends('layouts.users.app-new')
@section('pageTitle', 'Sertifikasi')
@section('description', 'Share text and photos with your friends and have fun')
@section('content')
<h4 class="mt-4 mb-3">{{ $tentang->judul }}</h4>
<hr>
{!! $tentang->tentang !!}

@endsection
