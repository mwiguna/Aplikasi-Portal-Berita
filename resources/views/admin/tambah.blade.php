@extends('layouts.admin')
@section('content')

	<div class="col-10 col-lg-8 main-admin">
		<div class="title-admin">Tambah Artikel</div>
		@if(count($errors) > 0)
			@foreach($errors->all() as $error)
				<div class="col-8">{{ $error }}</div>
			@endforeach
		@endif
		<div class="col-8">{{ Session::get('msg') }}</div>
		<form class="col-12" action="/addPost" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}
			<input class="col-8 input-main" type="text" name="judul" placeholder="Judul Artikel" required value="{{ old('judul') }}">
			<input class="col-8 input-main" type="file" name="foto" placeholder="Foto" required>
			<div class="col-12">Kategori :</div>
			<div class="col-12 main-cat">
				<input type="checkbox" name="kategori[]" value="Nasional">Nasional
				<input type="checkbox" name="kategori[]" value="Edukasi">Edukasi
				<input type="checkbox" name="kategori[]" value="Ekonomi">Ekonomi
				<input type="checkbox" name="kategori[]" value="Teknologi">Teknologi
				<input type="checkbox" name="kategori[]" value="Olahraga">Olahraga
				<input type="checkbox" name="kategori[]" value="Health">Health
				<input type="checkbox" name="kategori[]" value="Otomotif">Otomotif
			</div>
			<div class="col-9"><textarea name="isi" id="addPost">{{ old('isi') }}</textarea></div>
			<input class="col-4 submit-main" type="submit" value="Tambah Artikel">
		</form>
		<script>
			
		</script>
	</div>

@endsection