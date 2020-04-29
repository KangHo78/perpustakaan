@extends('layouts_frontend._main')

@section('content')
<section class="hero-section">
	<div class="hero-slider owl-carousel">
		<div class="hs-item">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="hs-text">
							<h2><span>Read</span> and Feel.</h2>
							<p>Explore up to 100,000 more book titles that are available online and offline and
								immediately feel the pleasure when reading it.</p>
							<a href="{{ route('buku_katalog') }}" class="site-btn">See Catalog</a>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="hr-img">
							<img src="{{ asset('assets/img/undraw_book_lover_mkck.svg') }}" alt="">
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
							<p>Brian D. Meeks's book, which is the most popular book, is currently hired by some young
								teenagers to fill their free time wherever they are.</p>
							<a href="#" class="site-btn">Borrow</a>
							<a href="{{ route('buku_katalog') }}" class="site-btn sb-c2">See Catalog</a>
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
					<h2>Unlimited Access to 100K books</h2>
				</div>
			</div>
			<div class="col-lg-6">
				<p>Start reading now and enjoy thousands to millions of unlimited titles and you can rent it whenever
					you want, with a total collection of up to 250,000 and will continue to be updated with the times.
					And also get a free library member card when registering, book rental can be up to 21 days, this is
					quite satisfying for you who love to read.
				</p>
				<a href="{{ route('register') }}" class="site-btn">Try it now</a>
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
					<h4>Create an account</h4>
					<p>Create an account faster without going to the library online, just making use of your internet
						connection and your device.</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="how-item">
					<div class="hi-icon">
						<img src="{{ asset('assets/img/icons/pointer.png') }}" alt="">
					</div>
					<h4>Select a books</h4>
					<p>Choose the book you want, whatever it is, whenever it is, and wherever it is, you can do it
						easily.</p>
				</div>
			</div>
			<div class="col-md-4">
				<div class="how-item">
					<div class="hi-icon">
						<img src="{{ asset('assets/img/icons/smartphone.png') }}" alt="">
					</div>
					<h4>Rent</h4>
					<p>Rent books that you like repeatedly even every day, up to 5 books in a row.</p>
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
					<h2>Best-seller Books</h2>
				</div>
			</div>
			<div class="col-lg-6">
				<p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
					ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
					et dolore magna aliqua.</p>
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
					<h2>Features offered</h2>
					<h3>Try renting now</h3>
					<p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel
						facilisis. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
						incididunt ut labore et dolore magna aliqua.</p>
					<a href="{{ route('register') }}" class="site-btn">Try it now</a>
				</div>
			</div>
			<div class="col-lg-6">
				<ul class="sub-list">
					<li><img src="{{ asset('assets/img/icons/check-icon') }}.png" alt="">Duration of Loans Up to 21 Days
					</li>
					<li><img src="{{ asset('assets/img/icons/check-icon') }}.png" alt="">Full access to reading online
					</li>
					<li><img src="{{ asset('assets/img/icons/check-icon') }}.png" alt="">Borrow Now Up to 5 books</li>
					<li><img src="{{ asset('assets/img/icons/check-icon') }}.png" alt="">Free Library Membership Card
					</li>
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
				<p>Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
					ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
					et dolore magna aliqua.</p>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4 col-sm-6">
				<div class="premium-item">
					<img src="{{ asset('assets/img/avatar/rdp77.png') }}" alt="">
					<h4>Moh Ravi Dwi Putra</h4>
					<p>Cogans Abadi</p>
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