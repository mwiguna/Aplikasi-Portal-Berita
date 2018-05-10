@extends('layouts.admin')
@section('content')

	<div class="col-10 col-lg-8 main-admin">
		<div class="title-admin pbot">Edit Komentar</div>
		<div class="col-12 pic-content bbotn mtop">
			<div class="col-12 main-val pleft">
				<form method="POST" action="/updateComment/{{ $comment->id }}">
					{{ csrf_field() }}
					<textarea class="col-8 push-4 input-main" name="komentar" rows="4">{{ $comment->isi }}</textarea>
					<input class="col-2 submit-main mtop" type="submit" value="Komentar">
				</form>
			</div>
		</div>
	</div>

@endsection