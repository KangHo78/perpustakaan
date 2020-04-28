@extends('layouts_frontend._main')

@section('content')
<section class="hero-section">
	<div class="hero-slider owl-carousel">
		<div class="hs-item">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="hs-text">
							<h2><span>KILLING</span> HEMINGWAY.</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
							<a href="#" class="site-btn">Pinjam</a>
							<a href="#" class="site-btn sb-c2">lihat katalog</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="hr-img">
							<img src="{{ asset('assets/img/hero-bg.png') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="hs-item">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="hs-text">
							<h2><span>KILLING</span> HEMINGWAY.</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. </p>
							<a href="#" class="site-btn">Pinjam</a>
							<a href="#" class="site-btn sb-c2">lihat katalog</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="hr-img">
							<img src="{{ asset('assets/img/hero-bg.png') }}" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="intro-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="section-title">
					<h2>Unlimited Access to 100K buku</h2>
				</div>
			</div>
			<div class="col-lg-6">
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>
				<a href="#" class="site-btn">Try it now</a>
			</div>
		</div>
	</div>
</section>
<section class="how-section spad set-bg" data-setbg="img/how-to-bg.jpg">
	<div class="container text-white">
		<div class="section-title">
			<h2>How it works</h2>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="how-item">
					<div class="hi-icon">
						<img src="{{ asset('assets/img/icons/brain.png') }}" alt="">
					</div>
					<h4>Buat akun</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipi-scing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum sus-pendisse ultrices gravida. </p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="how-item">
					<div class="hi-icon">
						<img src="{{ asset('assets/img/icons/pointer.png') }}" alt="">
					</div>
					<h4>Pilih buku</h4>
					<p>Donec in sodales dui, a blandit nunc. Pellen-tesque id eros venenatis, sollicitudin neque sodales, vehicula nibh. Nam massa odio, portti-tor vitae efficitur non. </p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="how-item">
					<div class="hi-icon">
						<img src="{{ asset('assets/img/icons/smartphone.png') }}" alt="">
					</div>
					<h4>Sewa</h4>
					<p>Ablandit nunc. Pellentesque id eros venenatis, sollicitudin neque sodales, vehicula nibh. Nam massa odio, porttitor vitae efficitur non, ultric-ies volutpat tellus. </p>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="concept-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="section-title">
					<h2>Best-seller Book</h2>
				</div>
			</div>
			<div class="col-lg-6">
				<p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3 col-sm-6">
				<div class="concept-item">
					<img src="{{ asset('assets/img/concept/1.jpg') }}" alt="">
					<h5>MOMENTUM</h5>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="concept-item">
					<img src="{{ asset('assets/img/concept/2.jpg') }}" alt="">
					<h5>THE BOY</h5>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="concept-item">
					<img src="{{ asset('assets/img/concept/3.jpg') }}" alt="">
					<h5>PATHWAY TO LOVE</h5>
				</div>
			</div>
			<div class="col-lg-3 col-sm-6">
				<div class="concept-item">
					<img src="{{ asset('assets/img/concept/4.jpg') }}" alt="">
					<h5>CATCHER IN THE RYE</h5>
				</div>
			</div>
		</div>
	</div>
</section>
<section class="subscription-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="sub-text">
					<h2>Fitur yang ditawarkan</h2>
					<h3>Coba sewa sekarang</h3>
					<p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					<a href="#" class="site-btn">Try it now</a>
				</div>
			</div>
			<div class="col-lg-6">
				<ul class="sub-list">
					<li><img src="{{ asset('assets/img/icons/check-icon') }}.png" alt="">Crot di dalam</li>
					<li><img src="{{ asset('assets/img/icons/check-icon') }}.png" alt="">Include Hotel</li>
					<li><img src="{{ asset('assets/img/icons/check-icon') }}.png" alt="">Full service</li>
					<li><img src="{{ asset('assets/img/icons/check-icon') }}.png" alt="">LT lebih murah</li>
					<li><img src="{{ asset('assets/img/icons/check-icon') }}.png" alt="">5x main bonus 1x service</li>
				</ul>
			</div>
		</div>
	</div>
</section>
<section class="premium-section spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<div class="section-title">
					<h2>Our Team</h2>
				</div>
			</div>
			<div class="col-lg-6">
				<p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-sm-6">
				<div class="premium-item">
					<img src="{{ asset('assets/img/premium/5.jpg') }}" alt="">
					<h4>RAVI</h4>
					<p>SANG GAY ABADI</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="premium-item">
					<img src="{{ asset('assets/img/premium/5.jpg') }}" alt="">
					<h4>AXL</h4>
					<p>-</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="premium-item">
					<img src="{{ asset('assets/img/premium/5.jpg') }}" alt="">
					<h4>ROZAQ</h4>
					<p>-</p>
				</div>
			</div>
			<div class="col-lg-2 col-sm-6">
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="premium-item">
					<img src="{{ asset('assets/img/premium/5.jpg') }}" alt="">
					<h4>HANIF</h4>
					<p>-</p>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6">
				<div class="premium-item">
					<img src="{{ asset('assets/img/premium/5.jpg') }}" alt="">
					<h4>RIJAL</h4>
					<p>WONG GATEL</p>
				</div>
			</div>

		</div>
	</div>
</section>
@endsection

