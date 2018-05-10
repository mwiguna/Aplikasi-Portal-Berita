/**
 * Javascript Document
 * Portal Berita
 * 2016
 */

 $(document).ready(function(){
 	
 	/* --------- Main ---------- */

 	$("#log-btn").click(function(event){
 		$("#log-menu").toggle();
 		event.stopPropagation();
 	});
 	$(window).click(function(){
 		$("#log-menu").hide();
 	});

 	
 	$(document).on("click", ".reply", function(){
 		var id = $(this).attr("data-id");
 		$(this).addClass("close-comment");
 		$(".comment-hide"+id).css({height: "100%"});
 	});
 	$(document).on("click", ".close-comment", function(){
 		var id = $(this).attr("data-id");
 		$(this).removeClass("close-comment");
 		$(".comment-hide"+id).css({height: "0"});
 	});
 	

 	/* --------- Admin ---------- */


 	/* --------- User ---------- */


 	$("#comment").submit(function(){
 		var token    = $('input[name="_token"]').val();
 		var komentar = $('#value-main').val();
 		var id       = $('#comment').attr("data-id");
 		
 		$.ajax({
          method: "POST",
          url: "/userInfo",
          data: { _token : token },
          success: function(data){
          	$('textarea').val("");
          	name    = data.name;
          	profile = data.profile;

          	$.ajax({
          		method: "POST",
            	url: "/addComment",
            	data: { _token: token, komentar : komentar, id: id },
            	success: function(data){
            		$(".box-comment").prepend('<div class="col-12 comment pad1 pleft pbot bbot"><div class="col-1"><img src="/img/'+profile+'" class="pp-user"></div><div class="col-11 col-lg-9 col-md-7 col-sm-5 col-xs-3 pad1 ptop pright"><a href="" class="col-12 name-com">'+name+'</a><div class="col-12 val-com">'+komentar+'</div><div class="col-12 time-com"><div class="time-news">'+data+'</div></div></div></div>'); 
            	}
          	});

          }
        });

 		return false;
 	});

 	$(".comment-reply").submit(function(){
 		var replyId   = $(this).attr('data-id');
 		var token     = $('input[name="_token"]').val();
 		var komentar  = $('#val-reply'+replyId).val();
 		var post_id   = $('#comment').attr("data-id");
 		var parent_id = $(this).attr('data-parent');	
    var parentuser_id = $(this).attr('data-user');

 		$.ajax({
          method: "POST",
          url: "/userInfo",
          data: {_token : token},
          success: function(data){
          	$('textarea').val("");
          	name    = data.name;
          	profile = data.profile;

          	$.ajax({
          		method: "POST",
          		url: "/reply",
          		data: { _token: token, komentar: komentar, post_id: post_id, parent_id: parent_id, parentuser_id: parentuser_id},
          		success: function(data){
          			qtyReply = $(".reply"+replyId).html() * 1 + 1;
          			$(".reply"+replyId).html(qtyReply);
          			$(".repliest").prepend('<div class="col-12 pad1"><a href="" class="col-12 name-com">'+name+'</a><div class="col-12 val-com">'+komentar+'</div><div class="col-12 time-com"><div class="time-news">'+data+'</div></div></div>');
          		}
          	});
          }
        });

 		return false;
 	});

 	$(document).on("click", ".likeBtn", function(){
 		var token     = $('input[name="_token"]').val();
 		var parent_id = $(this).attr("data-id");
 		var post_id   = $('#comment').attr("data-id");
    var parentuser_id = $(this).attr("data-user");

 		$.ajax({
 			method: "POST",
 			url: "/like",
 			data: {_token: token, parent_id: parent_id, post_id: post_id, parentuser_id: parentuser_id},
 			success: function(){
 				$('.like'+parent_id).addClass('unlikeBtn');
 				$('.like'+parent_id).removeClass('likeBtn');
 				qtyLike = $('.like'+parent_id).html() * 1 + 1;
 				$('.like'+parent_id).html(qtyLike);
 			}
 		});
 	});

 	$(document).on("click", ".unlikeBtn", function(){
 		var token     = $('input[name="_token"]').val();
 		var parent_id = $(this).attr("data-id");
 		var post_id   = $('#comment').attr("data-id");
    var parentuser_id = $(this).attr("data-user");

 		$.ajax({
 			method: "POST",
 			url: "/unlike",
 			data: {_token: token, parent_id: parent_id, post_id: post_id, parentuser_id: parentuser_id},
 			success: function(){
 				$('.like'+parent_id).addClass('likeBtn');
 				$('.like'+parent_id).removeClass('unlikeBtn');
 				qtyLike = $('.like'+parent_id).html() * 1 - 1;
 				$('.like'+parent_id).html(qtyLike);
 			}
 		});
 	});

 	/* --------- Slider ---------- */

 	$(window).resize(function(event) {
 		if($(window).width() > 1500){
 			$(".main-slider").hide(function(){
 				alert("Sorry, Slider is not supported for your window size.");
 			});
 		}
 		else if($(window).width() > 1200) $(".main-slider").show();
 		else $(".main-slider").hide();
 	});

 	function slider(){
 		mLeft = $(".slider").css("margin-left");
 		mLeft = mLeft.substring(0, mLeft.length - 2) * 1;
 		if(mLeft > -1540){

 			mLeft = mLeft - 768;
			if(mLeft != 768 && mLeft > 0) mLeft = 768;
			if(mLeft != 1536 && mLeft > 768) mLeft = 1536;
			if(mLeft != 2304 && mLeft > 1536) mLeft = 2304;	 

			$(".nextBtn").removeClass('nextBtn');
			$(".prevBtn").removeClass('prevBtn');

	 		$(".slider").stop().animate({
	 			marginLeft: mLeft + 'px'
	 		}, 800, function(){
	 			$(".next").addClass("nextBtn");
	 			$(".prev").addClass("prevBtn");
	 		});
	 		
 		} else $(".slider").css({marginLeft: '0px'});
 	}

 	if($(".slider").html() !== undefined) setInterval(slider, 3000);
 	$(document).on("click", ".nextBtn", function() { slider(); });

 	$(document).on("click", ".prevBtn", function() {
 		mLeft = $(".slider").css("margin-left");
 		mLeft = mLeft.substring(0, mLeft.length - 2) * 1;
 		if(mLeft < -767 && mLeft != 0){
 			$(".prevBtn").removeClass('prevBtn');
	 		$(".slider").stop().animate({
	 			marginLeft: mLeft + 768 + 'px'
	 		}, 800, function(){
	 			$(".prev").addClass("prevBtn");
	 		});
 		} else $(".slider").css({marginLeft: '-2304px'});
 	});
 	
 });