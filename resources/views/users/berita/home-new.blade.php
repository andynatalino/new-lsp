@extends('layouts.users.app-new')
@section('pageTitle', 'Sertifikasi')
@section('description', 'Share text and photos with your friends and have fun')
@section('content')
  <style type="text/css">
   
      img {max-width:500px;
        max-height: 500px;
      }
   
  </style>

<!-- Page Heading/Breadcrumbs -->
<h4 class="mt-4 mb-3">Berita</h4>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{ url('/')}}">Home</a>
	</li>
	<li class="breadcrumb-item active">Berita</li>
</ol>

<div class="row">

	<!-- Blog Entries Column -->
	<div class="col-md-8">
		@foreach($berita as $key)
		<div class="card mb-4">
			<!-- <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap"> -->
			<div class="card-body">
				<h2 class="card-title">{{ $key->judul }}</h2>
				<p class="card-text">{!! \Illuminate\Support\Str::words($key->isi, 100,'....') !!}</p>
				<a href="{{ url('berita/'.$key->slug) }}" class="btn btn-primary">Read More &rarr;</a>
			</div>
			<div class="card-footer text-muted">
				Posted on January 1, 2017 by
				<a href="#">Start Bootstrap</a>
			</div>
		</div>
		@endforeach

		{{ $berita->links() }}
		<br>

	</div>

	<!-- Sidebar Widgets Column -->
	<div class="col-md-4">

		<!-- Search Widget -->
		<div class="card mb-4">
			<h5 class="card-header">Search</h5>
			<div class="card-body">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search for...">
					<span class="input-group-btn">
						<button class="btn btn-secondary" type="button">Go!</button>
					</span>
				</div>
			</div>
		</div>

		<!-- Side Widget -->
		<div class="card my-4">
			<h5 class="card-header">Social Media</h5>
			<div class="card-body">
				You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
			</div>
		</div>

	</div>

</div>
<!-- /.row -->

@endsection