<!DOCTYPE html>
<html lang="fr">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="{{ $page->meta_desc }}">
	    <meta name="author" content="">
	    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
	    <title>{{ $page->meta_title }}</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	    <link href='https://fonts.googleapis.com/css?family=Raleway:400,400italic,700,700italic,900,900italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
	    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('assets/css/cover.css') }}" rel="stylesheet">
	    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    <style>
			#cover-middle { background-image:url({{ route('cover_image', ['contact', 2000, 1300]) }}) }
		</style>
	</head>
	<body>
		<div class="site-wrapper allow" id="cover-middle">
			<div class="site-wrapper-inner">
				
				@include('menu')
				
				<div class="cover cover-container">
					<div class="col-md-8 col-md-offset-2 col-xs-12 allow">
						<h1 class="uppercase">{{ $page->title_h1 }}</h1>
						<div class="divider"></div>
						<p class="m-b-30 desc">{{ $page->desc }}</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container">
			<div class="col-md-10 col-md-offset-1">
				<div class="row m-t-30">
					@if(session('type') && session('message'))
						<div class="col-md-12">
							@if(session('type') == "success")
								<p class="alert alert-success text-left"><span class="fa fa-check"></span> {{ session('message') }}</p>
							@else	  
								<p class="alert alert-danger text-left"><span class="fa fa-ban"></span> {{ session('message') }}</p>
							@endif
						</div>
					@endif
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<form role="form" action="{{ route('post_contact') }}" method="post">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<input type="text" class="form-control" name="name" placeholder="Nom et prénom" value="{{ old('name') }}" required>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
							</div>
							<div class="form-group">
								<textarea rows="5" class="form-control" name="content" placeholder="Contenu du message" required>{{ old('content') }}</textarea>
							</div>
							<div class="form-group">
								<input type="text" class="form-control" name="spam" placeholder="Vérification anti-spam : 4 + 3 =" required>
							</div>
							<input type="submit" name="submit" id="submit" value="Envoyer" class="btn btn-warning pull-left m-b-30">
						</form>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						{!! $page->content !!}
					</div>
				</div>
			</div>
		</div>

		@include('footer')
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script>
			function load() {
				$('.cover').css({
					'opacity':'0'
				});
			}
			
			function animate() {
				$('.cover').animate({
					'opacity':'1'
				}, 3500);
			}
			
			function checkScroll(startY){	
			    if($(window).scrollTop() > startY){
			        $('.navbar').addClass("scrolled");
			        $('#cover-middle').removeClass("allow");
			    }else{
			        $('.navbar').removeClass("scrolled");
			        $('#cover-middle').addClass("allow");
			    }
			}
			
			$(document).ready(function() {
				if($(window).width() > 752) {
					load();
					animate();
				}
			});
			
			$(window).on("scroll load resize", function(){
			    if($(window).width() > 752) {
				    checkScroll(0);
			    }
			    else {
				    checkScroll(-1);
			    }
		    });
		</script>
	</body>
</html>