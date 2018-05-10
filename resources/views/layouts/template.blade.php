<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Portal Berita</title>
	<link rel="shortcut icon" href="/img/newspaper.png"> 
	<link rel="stylesheet" type="text/css" href="/css/rewidify.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<script src="/tinymce/tinymce.min.js"></script>
	<script src="/js/jquery3.min.js"></script>
	<script src="/js/script.js"></script>
</head>
<body>

	<header class="row">
		<div class="col-2 col-lg-10 offset-1 logo">
			<div class="col-12 logo-big">PORTAL BERITA</div>
			<div class="col-12 logo-small">Kabar Berita Terbaru</div>
		</div>
		<nav class="col-10 offset-1 nav-header">
			<ul>
				<a href="/" class="col-1"><li>Home</li></a>
				<a href="/kategori/Nasional"  class="col-1"><li>Nasional</li></a>
				<a href="/kategori/Edukasi"   class="col-1"><li>Edukasi</li></a>
				<a href="/kategori/Ekonomi"   class="col-1"><li>Ekonomi</li></a>
				<a href="/kategori/Teknologi" class="col-1"><li>Teknologi</li></a>
				<a href="/kategori/Olahraga"  class="col-1"><li>Olahraga</li></a>
				<a href="/kategori/Health"    class="col-1"><li>Health</li></a>
				<a href="/kategori/Otomotif"  class="col-1"><li>Otomotif</li></a>
				@if(Auth::guest())
					<a href="/login" class="col-1 id-log"><li>Login</li></a>
					<a href="/register" class="col-1 id-log"><li>Register</li></a>
				@else
					<a href="/logout" class="col-1 id-log" onclick="event.preventDefault();document.getElementById('logout').submit();"><li>Logout</li></a>
					<a href="/home" class="col-1 id-log"><li>Profile</li></a>
				@endif
			</ul>
			<div class="col-3 offset-1 col-lg-10 search-box">
				<form method="post" action="/cari" class="col-10">
					{{ csrf_field() }}
					<input type="text" class="search-text" name="search" placeholder="Cari Berita">
					<input type="submit" class="search-sub" value=" ">
				</form>
				<div class="col-2" id="log-btn">&nbsp;</div>
			</div>
		</nav>
		@if(Auth::guest()) <div id="log-menu">
		@else <div id="log-menu" style="top: 9%">
		@endif
			@if(Auth::guest())
				<a href="/login" class="col-6 col-lg-10">Login</a>
				<a href="/register" class="col-6 col-lg-10">Register</a>
			@else
				<div class="col-12">
					<div class="col-2 col-lg-10"><img src="/img/{{ Auth::user()->profile }}"></div>
					<div class="col-10 dlog">
						@if(strlen(Auth::user()->name) > 20){{ substr(Auth::user()->name, 0, 20)."..." }}
						@else {{ Auth::user()->name }}
						@endif
					</div>
				</div>
				<a href="/home" class="col-6 col-lg-10">Profile</a>
				<a href="/logout" class="col-6 col-lg-10" onclick="event.preventDefault();document.getElementById('logout').submit();">Logout</a>
			@endif
		</div>
		<form id="logout" action="{{ url('/logout') }}" method="POST">{{ csrf_field() }}</form>
	</header>

	@yield('content')

			<div class="col-4 col-lg-10 main-content pright">
				<div class="col-12 pic-content">
					<div class="col-12 title-sub-content blue">Artikel Populer</div>
					<div class="col-12 main-val">
						@foreach ($beritaPopuler as $berita)
							<div class="col-12 val-content subval-content">
								<div class="col-2"><img src="/img/{{ $berita->foto }}"></div>
								<div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-2 sub-main">
									<a href="/berita/{{ $berita->path }}" class="col-12 sub-title-news">{{ $berita->judul }}</a>
									<div class="col-12">
										<?php
											$controller->kategori($berita->kategori);
											$controller->tanggal($berita->created_at);
										?>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
				<div class="col-12 pic-content bbotn">
					<div class="col-12 title-sub-content green">Berita Terbaru</div>
					<div class="col-12 main-val">
						@foreach ($beritaBaru as $berita)
							<div class="col-12 val-content subval-content">
								<div class="col-2"><img src="/img/{{ $berita->foto }}"></div>
								<div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-2 sub-main">
									<a href="/berita/{{ $berita->path }}" class="col-12 sub-title-news">{{ $berita->judul }}</a>
									<div class="col-12">
										<?php
											$controller->kategori($berita->kategori);
											$controller->tanggal($berita->created_at);
										?>
									</div>
								</div>
							</div>
						@endforeach
					</div>
				</div>
			</div>

		</div>
	</main>

	<footer class="row">
		<div class="col-12 copyright">Copyright &copy; 2016</div>
	</footer>

</body>
</html>