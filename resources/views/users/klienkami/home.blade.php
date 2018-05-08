@extends('layouts.users.app-new')
@section('pageTitle', 'Sertifikasi')
@section('description', 'Klien Kami Sakasakti Sertifikasi')
@section('content')
<h4 class="mt-4 mb-3">Klien Kami</h4>

@foreach($klienkami as $key)
<a href="{{url($key->url)}}" target="_blank"><img src="{{url('assets/klienkami/'.$key->photo)}}" class="img-fluid" style="max-height: 150px;   padding-bottom: 15px;" alt="{{$key->judul}}"></a>
@endforeach

@endsection