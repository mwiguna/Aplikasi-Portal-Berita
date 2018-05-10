@extends('layouts.admin')
@section('content')

	<div class="col-10 col-lg-8 main-admin">
		<div class="title-admin pbot">Pemberitahuan</div>
		<div class="col-12 pic-content bbotn mtop">
				<div class="col-12 main-val">
					@foreach ($notifs as $notif)
						<div class="col-12 val-content subval-content pbot">
							<div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-2 sub-main">
								<div class="col-12">
									{{ $notif->name }} 
									@if($notif->type == 1) menyukai komentar anda.
									@else membalas komentar anda.
									@endif
								</div>
								<div class="col-12 ket-com">
									<?php $controller->fullTime($notif->created_at); ?>
									<div class="col-9">Pada : <a href="/berita/{{ $notif->path }}">{{ $notif->judul }}</a></div>
								</div>
							</div>
						</div>
					@endforeach
				</div>
		</div>
	</div>

@endsection