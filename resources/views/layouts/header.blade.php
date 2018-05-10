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
				<a href="/logout" class="col-1 id-log" onclick="event.preventDefault();document.getElementById('logout').submit();"><li>Logout</li></a>
				<a href="/home" class="col-1 id-log"><li>Profile</li></a>
			</ul>
			<div class="col-3 offset-1 col-lg-10 search-box">
				<form method="post" class="col-10">
					<input type="text" class="search-text" name="search" placeholder="Cari Berita">
					<input type="submit" class="search-sub" value=" ">
				</form>
				<div class="col-2" id="log-btn">&nbsp;</div>
			</div>
		</nav>
		<div id="log-menu" style="top: 9%">
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
		</div>
		<form id="logout" action="{{ url('/logout') }}" method="POST">{{ csrf_field() }}</form>
	</header>