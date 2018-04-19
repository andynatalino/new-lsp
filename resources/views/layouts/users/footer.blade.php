<?php $s = App\Setting::first(); ?>
<footer class="fixed" style="background-color: #EFEAE3; bottom: 0;">		
	<div class="container">
		<div class="padding20">
			<div class="grid">
				<div class="row cells12">
					<div class="cell colspan6">
						Klien Kami<br><br>
						<a target="_blank" href="http://disdik.jakarta.go.id/"><img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//f607c515ffd50d684a8f93bb34e1ff2d_150x231.jpg"></a>
						<a href="http://disdik.sumbarprov.go.id/"><img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//363c5b3520ccbe8d29d4625a7d705c9f_190x190.jpg"></a>
						<a href="http://dishub.jakarta.go.id/home"><img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//1f09cf09b051664369575b7d8b1cf03e_141x180.jpg"></a>
						<a href="https://www.kemdikbud.go.id/"><img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//5dbcae7d8a4a911d3c8f4fee74fc0046_180x191.png"></a><br>
						<a href="http://kadintrainingcenter.blogspot.co.id/"><img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//625d67f6c98032fe5c661d77c7a9b783_192x191.jpg"></a>
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//ea66eb81bc16a5b673d05c5dc2e98bf0_161x171.png">
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//1449a557d82f8f7ffae6165b0b383c64_191x180.png">
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//a11c80e0b6b4026e7b818ea16bff6887_180x210.png"><br>
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//06aea06a53cd31726843cface9deafe4_240x250.jpg">
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//4b025c4dbd56c59ae7ae0819202dfb7e_233x211.jpg">
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//26d7303788a868132c186becf595ee2f_192x190.jpg">
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//a04d5a7f052c5ffab2a3f454c81a3a87_160x210.jpg"><br>
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//96663a06d495bd55d35e1864b1398ba1_470x170.png">
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//a99a55f73801839873c05ef70c10024e_330x180.jpg">
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//a65bd2a7537b9186160c9c17f6042daa_190x210.jpg">
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//602530e6a6967f786ad21a8f12411d8e_190x212.png"><br>
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//730eedcbb6a8957123eae7c172d5e794_200x221.jpg">
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//cd4fc3e0964720718f1585d3e1a614d0_180x201.jpeg">
						<img style="width: 80px; height: 80px;" src="http://sakasakti.com/gallery_gen//8a3c092adea3705e4df581c8a3f794b5_191x171.png">

					</div>
					<div class="cell colspan4">
						Alamat
						<ul>
							<li>MENARA BIDAKARA 2, Gedung Bina sentra 1st Floor, Jl. Gatot Subroto Kav. 71-73 Selatan, RT.7/RW.4, Mampang Prpt., Pancoran, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12790</li>
						</ul>
						<ul>
							<li>Jam buka: 07-00 s/d 10-00</li>
						</ul>
						<ul>
							<li>Telepon: (021) 866123<br>
							+62 21 83704709</li>
						</ul>
							<ul>
							<li>Email: support@sakasakti.com</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class='cell'>
					<hr class="thin" style="margin-top: 20px" />
					<a href="https://www.jetbrains.com/phpstorm/" title="license for PhpStorm"><img src="images/logo_JetBrains_4.png" style="width: 100px" ></a>
					<a href="http://www.microsoft.com/bizspark/default.aspx" title="Bizspark Startup"><img src="images/MSFT_logo_png.png" style="width: 100px" ></a>
					<a href="https://www.keycdn.com/" title="KeyCDN"><img src="images/keycdn-logo.svg" style="width: 100px"></a>
				</div>
			</div>
		</div>
	</div>

	<div class="padding20">
		@@adsense
	</div>

	<div class="align-center padding20 text-small">
		<a href="{{Request::url()}}">{{$s->nama_web}}</a> © {{ date('Y') }}  
	</div>
</div>
</footer>

