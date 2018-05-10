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

	@if (!Auth::guest())
	@include('layouts.header')
	<main class="row admin">
		<div class="col-12">
			@if(Auth::user()->email == "admin@portal.com") @include('layouts.adminT')
			@else @include('layouts.userT')
			@endif

			@yield('content')
		</div>
	</main>

	<footer class="row">
		<div class="col-12 copyright">Copyright &copy; 2016</div>
	</footer>

	 <script>
	  tinymce.init({
	    selector: 'textarea#addPost',
	    plugins: [
	      'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
	      'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
	      'save table contextmenu directionality emoticons template paste textcolor'
	    ],
	    height : '350'
	  });
  	</script>
  	@else @yield('content')
  	@endif


</body>
</html>