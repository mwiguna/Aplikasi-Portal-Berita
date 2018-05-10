@extends('layouts.admin')
@section('content')

	<div class="col-10 col-lg-8 main-admin">
		<div class="title-admin pbot">Daftar Artikel</div>
		<div class="col-12 pic-content bbotn mtop">
				<div class="col-12 main-val">
					<div class="col-8">{{ Session::get('msg') }}</div>
					@foreach ($beritas as $berita)
						<div class="col-12 val-content subval-content pbot">
							<div class="col-1 col-xs-2"><img src="/img/{{ $berita->foto }}"></div>
							<div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-2 sub-main">
								<a href="/berita/{{ $berita->path }}" class="col-12 sub-title-news">{{ $berita->judul }}</a>
								<div class="col-12">
									<?php
										$controller->kategori($berita->kategori);
										$controller->tanggal($berita->created_at);
									?>
								</div>
								<div class="col-12 pad1 ptop">
									<a href="/edit/{{ $berita->id }}" class="col-1 col-xs-4 btn-edit">Edit</a>
									<a href="/hapus/{{ $berita->id }}" class="col-1 col-xs-4 btn-delete" onclick="return confirm('Yakin ingin menghapus berita ini?')">Hapus</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
		</div>
	</div>

@endsection