@extends('layouts.users.app-new')
@section('pageTitle', 'Profil - Sertifikat')

@section('content')
<h4 class="mt-4 mb-3">Sertifikat</h4>
<div class="container">
	<div class="row">
		<div class="col-sm">
        <table class="table table-striped">
      <thead>
        <tr>               
          <th>Skema</th>
          <th>Kategori</th>         
          <th>Status</th>             
        </tr>     
      </thead>
      <tbody>
      @foreach($trans as $key)
      <tr>             
        <td>{{ $key->jadwal }}</td>
        <td>{{ $key->kategori }}</td>
        @if($key->status == 1)
        <td><b>KOMPETEN</b></td>      
        @elseif($key->status == 2)    
        <td><b>TIDAK KOMPETEN</b></td>      
        @endif        
    </tr>
    @endforeach   
    </tbody>
  </table>
        </div>
    </div>
</div>

@endsection
