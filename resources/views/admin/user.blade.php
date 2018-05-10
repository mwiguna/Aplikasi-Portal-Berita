@extends('layouts.admin')
@section('content')

	<div class="col-10 col-lg-8 main-admin">
		<div class="title-admin">Daftar User</div>
		<div class="col-12 pic-content bbotn mtop">
				<div class="col-12 main-val">
					<div class="col-8">{{ Session::get('msg') }}</div>
					@foreach ($users as $user)
						<div class="col-10 val-content subval-content pbot">
							<div class="col-1 col-xs-2 pp-user"><img src="/img/{{ $user->profile }}"></div>
							<div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-2 sub-main">
								<a href="/profile/{{ $user->id }}" class="col-12 sub-title-news">{{ $user->name }}</a>
								<div class="col-12 time-news pleft">{{ $user->email }}</div>
								<div class="col-12 pad1">
									<a href="/hapusUser/{{ $user->id }}" class="col-1 col-xs-4 btn-delete" onclick="return confirm('Yakin ingin menghapus pengguna ini?')">Hapus</a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
		</div>
	</div>

@endsection