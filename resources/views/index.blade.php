@extends('layouts.template')
@section('content')

	<main class="row">
		<div class="col-10 offset-1">
		<div class="col-8 col-lg-10 main-content pleft">
				<div class="col-12 pic-content">
					<div class="col-12 red title-content">Kabar Berita</div>
					<div class="col-12 main-val">

							<div class="col-12 val-content pbot bbot main-slider">
									<div class="col-12 slider">
										@foreach($slides as $slide)
											<div class="oslide"><img src="/img/{{ $slide->foto }}" class="foto-main"></div>
										@endforeach
										<div class="oslide"><img src="/img/{{ $slides[0]->foto }}" class="foto-main"></div>
									</div>

									<div class="col-12 slider mbot2 cap-main">
										@foreach($slides as $slide)
											<div class="oslide">
												<div class="col-12 cap-slide">
													<a href="/berita/{{ $slide->path }}" class="col-12 title-news">{{ $slide->judul }}</a>
													<div class="col-12">
														<?php
															$controller->kategori($slide->kategori);
															$controller->tanggal($slide->created_at);
														?>
													</div>
												</div>
											</div>
										@endforeach

										<div class="oslide">
											<div class="col-12 cap-slide">
												<a href="/berita/{{ $slides[0]->path }}" class="col-12 title-news">{{ $slides[0]->judul }}</a>
												<div class="col-12">
													<?php
														$controller->kategori($slides[0]->kategori);
														$controller->tanggal($slides[0]->created_at);
													?>
												</div>
											</div>
										</div>
									</div>

									<div class="arslide prev prevBtn">&lsaquo;</div>
									<div class="arslide next nextBtn">&rsaquo;</div>
							</div>

						@foreach ($beritas as $berita)

							<div class="col-12 val-content pbot bbot">
									<a href="/berita/{{ $berita->path }}" class="col-12 title-news">{{ $berita->judul }}</a>
									<div class="col-12">
										<?php
											$controller->kategori($berita->kategori);
											$controller->tanggal($berita->created_at);
										?>
									</div>

									<div class="col-2 col-xs-1 pad1"><img src="/img/{{ $berita->foto }}"></div>
									<?php $isi = (strlen($berita->isi) > 200) ? substr($berita->isi, 0, 200) . "..." : $berita->isi; ?>
									<div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-3 val-news">{!! $isi !!}</div>
							</div>							

						@endforeach

						<div class="col-12">{{ $beritas->links() }}</div>
					</div>
				</div>
				<div class="col-12 pic-content bbot">
					<div class="col-12 title-content grey">Berita Rekomendasi</div>
					<div class="col-12 main-val">
						@foreach($beritaSaran as $berita)
							<div class="col-4 col-lg-10 val-content">
								<a href="/berita/{{ $berita->path }}" class="col-12 sub-title-news">{{ $berita->judul }}</a>
								<div class="col-12 col-lg-2"><img src="/img/{{ $berita->foto }}" class="berita-bot"></div>
								<div class="col-12">
									<?php
										$controller->kategori($berita->kategori);
										$controller->tanggal($berita->created_at);
									?>
								</div>
							</div>
						@endforeach
						
					</div>
				</div>
			</div>

@endsection