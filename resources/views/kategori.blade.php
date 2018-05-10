@extends('layouts.template')
@section('content')

	<main class="row">
		<div class="col-10 offset-1">

			<div class="col-8 col-lg-10 main-content pleft">
				<div class="col-12 pic-content">
					<div class="col-12 main-val">

					@foreach($beritas as $berita)

						<div class="col-12 val-content pbot bbot">
							<a href="/berita/{{ $berita->path }}" class="col-12 title-news">{{ $berita->judul }}</a>
							<div class="col-12">
								<?php
									$controller->kategori($berita->kategori);
									$controller->tanggal($berita->created_at);
								?>
							</div>
							<div class="col-2 pad1"><img src="/img/{{ $berita->foto }}" style="max-height: 80px"></div>
							<?php $isi = (strlen($berita->isi) > 200) ? substr($berita->isi, 0, 200) . "..." : $berita->isi; ?>
							<div class="col-10 val-news">{!! $isi !!}</div>
						</div>

					@endforeach

					</div>
				</div>
			</div>

@endsection