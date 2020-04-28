@extends('layouts_frontend._main')

@section('content')
	<section class="similar-songs-section">
		<div class="container-fluid">
			<h3>Katalog	</h3>
			<div class="row">
				<div class="col-xl-3 col-sm-6">
					<div class="similar-song">
						<img class="ss-thumb" src="{{ asset('assets/img/playlist/1.jpg') }}" alt="">
						<h4>MOMENTUM</h4>
						<p>A book of Azriel in <b>Category</b></p>
						<div class="single_player">
							<div class="jp-jplayer jplayer" data-ancestor=".jp_container_8" data-url="music-files/3.mp3"></div>
							<div class="jp-audio jp_container_8" role="application" aria-label="media player">
								
								<div class="jp-no-solution">
									<span>Update Required</span>
									To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="similar-song">
						<img class="ss-thumb" src="{{ asset('assets/img/playlist/2.jpg') }}" alt="">
						<h4>THE BOY</h4>
						<p>A book of Azriel in <b>Category</b></p>
						<div class="single_player">
							<div class="jp-jplayer jplayer" data-ancestor=".jp_container_9" data-url="music-files/4.mp3"></div>
							<div class="jp-audio jp_container_9" role="application" aria-label="media player">
								
								<div class="jp-no-solution">
									<span>Update Required</span>
									To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="similar-song">
						<img class="ss-thumb" src="{{ asset('assets/img/playlist/3.jpg') }}" alt="">
						<h4>PATHWAY TO LOVE</h4>
						<p>A book of Azriel in <b>Category</b></p>
						<div class="single_player">
							<div class="jp-jplayer jplayer" data-ancestor=".jp_container_10" data-url="music-files/5.mp3"></div>
							<div class="jp-audio jp_container_10" role="application" aria-label="media player">
								
								<div class="jp-no-solution">
									<span>Update Required</span>
									To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-sm-6">
					<div class="similar-song">
						<img class="ss-thumb" src="{{ asset('assets/img/playlist/4.jpg') }}" alt="">
						<h4>CATCHER IN THE RYE</h4>
						<p>A book of Azriel in <b>Category</b></p>
						<div class="single_player">
							<div class="jp-jplayer jplayer" data-ancestor=".jp_container_11" data-url="music-files/7.mp3"></div>
							<div class="jp-audio jp_container_11" role="application" aria-label="media player">
								
								<div class="jp-no-solution">
									<span>Update Required</span>
									To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection

