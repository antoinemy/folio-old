<!DOCTYPE html>
<html lang="fr">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="{{ $article->desc }}">
	    <meta name="author" content="">
	    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
	    <title>{{ $article->title }}</title>
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
			#cover-middle { background-image:url({{ route('article_image', [$article->id, 2000, 1300]) }}) }
			.full-background { background:url({{ route('about_image', [2000, 1300, 'triangulator']) }}) no-repeat center 20% fixed }
		</style>
	</head>
	<body>
		<div class="site-wrapper allow" id="cover-middle">
			<div class="site-wrapper-inner">
				
				@include('menu')
				
				<div class="cover cover-container">
					<div class="col-md-10 col-md-offset-1 col-xs-12 allow">
						<h1 class="uppercase">{{ $article->title }}</h1>
						<div class="divider"></div>
					</div>
					<div class="col-md-8 col-md-offset-2 col-xs-12 allow">
						<p class="m-b-30 desc">{{ $article->desc }}</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="top-background">
			<div class="container">			
				<div class="col-lg-10 col-lg-offset-1">
					<ol class="float-left">
						<li>Articles</li>
						<li>{{ $article->category->term }}</li>
						<li>{{ $article->title }}</li>
					</ol>
				</div>
			</div>
		</div>
		
		<div class="container m-t-30">
			<div class="col-lg-10 col-lg-offset-1 m-b-30 text-left alone">
				{!! $article->content !!}
			</div>
		</div>
		
		@if(count($articles) > 0)
		<div class="full-background">
			<div class="container">			
				<div class="col-lg-10 col-lg-offset-1 m-b-30">
					<h3 class="uppercase m-t-30">Autres articles</h3>
					<div class="divider"></div>
					<ul class="media-list text-left">
						@foreach($articles as $num=>$a)
							<li class="media {{ $num == 1 ? 'm-l-75' : '' }} {{ $num == 2 ? 'm-l-150' : '' }} bloc-hover">
								<div class="media-left">
									<a href="{{ route('article', $a->id) }}">
										<img class="media-object" alt="{{ $a->cover->name }}" src="{{ route('article_image', [$a->id, 64, 64]) }}"/>
									</a>
								</div>
								<div class="media-body">
									<a href="{{ route('article', $a->id) }}">
										<h4 class="media-heading">{{ $a->title }}</h4>
										<p>{{ $a->desc }}</p>
									</a>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		@endif

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