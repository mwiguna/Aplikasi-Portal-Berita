@extends('layouts.admin')
@section('content')

	<div class="col-10 col-lg-8 main-admin">
		<div class="title-admin">Edit Artikel</div>
		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<div class="col-8">{{ $error }}</div>
			@endforeach
		@endif
		<div class="col-8">{{ Session::get('msg') }}</div>
		<form class="col-12" action="/editPost/{{ $berita->id }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input class="col-8 input-main" type="text" name="judul" placeholder="Judul Artikel" value="{{ $berita->judul }}" required>
			<input class="col-8 input-main" type="file" name="foto" placeholder="Foto">
			<div class="col-12">Kategori :</div>
			<?php function cek($cat, $berita){if(strpos($berita->kategori, $cat) !== false) echo 'checked';} ?>
			<div class="col-12 main-cat">
				<input type="checkbox" name="kategori[]" value="Nasional"<?php cek('Nasional', $berita); ?>>Nasional
				<input type="checkbox" name="kategori[]" value="Edukasi"<?php cek('Edukasi', $berita); ?>>Edukasi
				<input type="checkbox" name="kategori[]" value="Ekonomi"<?php cek('Ekonomi', $berita); ?>>Ekonomi
				<input type="checkbox" name="kategori[]" value="Teknologi"<?php cek('Teknologi', $berita); ?>>Teknologi
				<input type="checkbox" name="kategori[]" value="Olahraga"<?php cek('Olahraga', $berita); ?>>Olahraga
				<input type="checkbox" name="kategori[]" value="Health"<?php cek('Health', $berita); ?>>Health
				<input type="checkbox" name="kategori[]" value="Otomotif"<?php cek('Otomotif', $berita); ?>>Otomotif
			</div>
			<div class="col-9"><textarea name="isi" id="addPost">{{ $berita->isi }}</textarea></div>
			<input class="col-4 submit-main" type="submit" value="Edit Artikel">
		</form>
		<script>
			
		</script>
	</div>

@endsection