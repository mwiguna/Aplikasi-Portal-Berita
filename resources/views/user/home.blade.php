@extends('layouts.admin')
@section('content')

	<div class="col-10 col-lg-8 main-admin">
		<div class="title-admin">Biodata</div>
		<div class="col-8">{{ Session::get('msg') }}</div>
		<form class="col-10" method="POST" action="/editBiodata">
			{{ csrf_field() }}
			<input class="col-10 input-main" type="text" name="nama" value="{{ Auth::user()->name }}">
			<input class="col-10 input-main" type="text" name="email" value="{{ Auth::user()->email }}">
			<input class="col-10 input-main" type="text" name="alamat" placeholder="Alamat" value="{{ Auth::user()->alamat }}">
			<input class="col-10 input-main" type="date" name="tgl" placeholder="Tanggal Lahir yyyy/mm/dd" value="{{ Auth::user()->tgl_lahir }}">
			<input class="col-10 input-main" type="text" name="nohp" placeholder="No. HP" value="{{ Auth::user()->nohp }}">
			<input class="col-3 submit-main" type="submit" value="Edit Biodata">
		</form>
	</div>

@endsection