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
				<p>We also have Best-seller books that are made by well-known journalists and are currently booming. All
					of these books are valid for the past 1 year, so you don't need to worry about this best-seller
					books data because this data is truly original based on user surveys.</p>
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
					<p>To satisfy readers in the Dryas Library we want to give some advantages to our library that are
						not in other libraries, or even yet. For that we want to show this feature as well as pamper you
						as a book enthusiast.</p>
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
@endsection