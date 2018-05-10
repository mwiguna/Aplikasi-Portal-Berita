@extends('layouts.template')
@section('content')

	<main class="row">
		<div class="col-10 offset-1">

			<div class="col-8 col-lg-10 main-content pleft">
				<div class="col-12 pic-content">
					<div class="col-12 main-val">

						<div class="col-12 val-content pbot bbot">
							<a href="/berita/{{ $berita->path }}" class="col-12 title-news">{{ $berita->judul }}</a>
							<div class="col-12">
								<?php
									$controller->kategori($berita->kategori);
									$controller->tanggal($berita->created_at);
								?>
							</div>
							<div class="col-12"><img src="/img/{{ $berita->foto }}" class="foto-main"></div>
							<div class="col-12 val-news">{!! $berita->isi !!}</div>
						</div>

						<div class="col-12 pad2">
							@if(Auth()->guest()) <a href="/login" class="col-12">Login Untuk Komentar &rsaquo;</a>
							@else
								<form class="col-12" data-id="{{ $berita->id }}" method="POST" id="comment">
									{{ csrf_field() }}
									<textarea id="value-main" class="col-12 input-main" placeholder="Tulis Komentar Anda Disini" name="komentar" rows="5"></textarea>
									<input class="col-12 submit-main mtop" type="submit" value="Komentar">
								</form>
							@endif

							<div class="col-12 pad1 pleft">Komentar :</div>
							<div class="col-12 box-comment">
								@foreach($comments as $comment)
									<div class="col-12 comment pad1 pleft pbot bbot">
										<div class="col-1"><img src="/img/{{ $comment->profile }}" class="pp-user"></div>
										<div class="col-11 col-lg-9 col-md-7 col-sm-5 col-xs-3 pad1 ptop pright">
											<a href="" class="col-12 name-com">{{ $comment->name }}</a>
											<div class="col-12 val-com">{{ $comment->isi }}</div>
											<div class="col-12 time-com">{{ $controller->fullTime($comment->created_at) }}</div>

											<?php
												$qtyReply = 0;
												$qtyLike  = 0;
												$btn 	  = "likeBtn";
												foreach($replies as $reply){
													if($reply->parent_id == $comment->id) $qtyReply++;
												}
												foreach ($likes as $like) {
													if($like->parent_id == $comment->id){
														if(Auth::guest()) $btn = "";
														else if($like->user_id == Auth::user()->id) $btn = "unlikeBtn";
														$qtyLike++;	
													} 
												}

												
											?>
											<div class="col-12">
												<div class="col-1 mini-link like {{ $btn }} like{{ $comment->id }}" href="#" data-user="{{ $comment->user_id }}" data-id="{{ $comment->id }}">{{ $qtyLike }}</div>
												<div data-id="{{ $comment->id }}" class="col-1 mini-link reply reply{{ $comment->id }}" href="#">{{ $qtyReply }}</div>
											</div>
										</div>

										<div class="col-12 comment-hide comment-hide{{ $comment->id }}">
											<div class="col-12 repliest">
											@foreach($replies as $reply)
												@if($reply->parent_id == $comment->id)
													<div class="col-12 pad1">
														<a href="" class="col-12 name-com">{{ $reply->name }}</a>
														<div class="col-12 val-com">{{ $reply->isi }}</div>
														<div class="col-12 time-com">{{ $controller->fullTime($reply->created_at) }}</div>
													</div>
												@endif
											@endforeach
											</div>

											@if(!Auth()->guest())
												<form class="col-12 comment-reply pad1" method="POST" data-id="{{ $comment->id }}" data-parent="{{ $comment->id }}" data-user="{{ $comment->user_id }}">
												{{ csrf_field() }}
													<textarea class="col-12 input-main" placeholder="Tulis Komentar Anda Disini" id="val-reply{{ $comment->id }}" name="komentar" rows="3"></textarea>
													<input class="col-3 submit-main mtop" type="submit" value="Balas Komentar">
												</form>
											@endif
										</div>

									</div>
								@endforeach
							</div>
						</div>

						<div class="col-12 pic-content bbot">
							<div class="col-12 title-content grey">Berita Rekomendasi</div>
							<div class="col-12 main-val">
								@foreach($beritaTerkait as $berita)
									<div class="col-4 col-lg-3 col-md-2 col-sm-6 val-content">
										<a href="/berita/{{ $berita->path }}" class="col-12 sub-title-news">{{ $berita->judul }}</a>
										<div class="col-12"><img src="/img/{{ $berita->foto }}" class="berita-bot"></div>
										<div class="col-12">
											<?php
												$controller->kategori($berita->kategori);
												$controller->tanggal($berita->created_at);
											?>
										</div>
									</div>
								@endforeach
								
							</div>
						</div>

					</div>
				</div>
			</div>

@endsection