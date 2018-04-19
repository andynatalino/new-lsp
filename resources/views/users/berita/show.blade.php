@extends('layouts.users.app')
@section('pageTitle', 'Sertifikasi')

@section('content')
<ul class="breadcrumbs">
	<li><a href="{{ url('/') }}"><span class="icon mif-home"></span></a></li>
	<li><a href="{{ url('/berita') }}">Berita</a></li>
	<li><a href="{{ url('/berita/'.$berita->slug) }}">{{ $berita->judul }}</a></li>
</ul>
<div class="grid">
	<div class="row">
		<div class="cell">
			<h1>{{ $berita->judul }}</h1>
			{!! $berita->isi !!}
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

</div>
</div>
</div>


@endsection
