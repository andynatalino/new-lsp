@extends('layouts.users.app-new')
@section('pageTitle', 'Sertifikasi')
@section('description', 'Share text and photos with your friends and have fun')
@section('content')

<!-- Page Heading/Breadcrumbs -->
<h4 class="mt-4 mb-3">{{ $berita->judul }}</h4>

<ol class="breadcrumb">
	<li class="breadcrumb-item">
		<a href="{{ url('/')}}">Home</a>
	</li>
	<li class="breadcrumb-item">
		<a href="{{ url('berita')}}">Berita</a>
	</li>
	<li class="breadcrumb-item active">{{ $berita->judul }}</li>
</ol>

<div class="row">

	<!-- Post Content Column -->
	<div class="col-lg-8">

		<!-- Preview Image -->
		<img class="img-fluid rounded" src="http://placehold.it/900x300" alt="">

		<hr>

		<!-- Date/Time -->
		<p>Posted on January 1, 2017 at 12:00 PM</p>

		<hr>
		{!! $berita->isi !!}
		<hr>

		<div id="disqus_thread"></div>
		<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
	var d = document, s = d.createElement('script');
	s.src = 'https://sakasakti.disqus.com/embed.js';
	s.setAttribute('data-timestamp', +new Date());
	(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<br>
</div>

<!-- Sidebar Widgets Column -->
<div class="col-md-4">
	<!-- Categories Widget -->
	<div class="card my-4">
		<h5 class="card-header">Categories</h5>
		<div class="card-body">
			<div class="row">
				<div class="col-lg-6">
					<ul class="list-unstyled mb-0">
						<li>
							<a href="#">Web Design</a>
						</li>
						<li>
							<a href="#">HTML</a>
						</li>
						<li>
							<a href="#">Freebies</a>
						</li>
					</ul>
				</div>
				<div class="col-lg-6">
					<ul class="list-unstyled mb-0">
						<li>
							<a href="#">JavaScript</a>
						</li>
						<li>
							<a href="#">CSS</a>
						</li>
						<li>
							<a href="#">Tutorials</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<!-- Side Widget -->
	<div class="card my-4">
		<h5 class="card-header">Side Widget</h5>
		<div class="card-body">
			You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
		</div>
	</div>

</div>

</div>
<!-- /.row -->
@endsection