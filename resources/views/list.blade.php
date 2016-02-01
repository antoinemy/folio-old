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
			<?php $type = $page->id == 2 ? 'articles' : 'projects'; ?>
			#cover-middle { background-image:url({{ route('cover_image', [$type, 2000, 1300]) }}) }
			.full-background { background:url({{ route('about_image', [2000, 1300, 'triangulator']) }}) no-repeat center 20% fixed }
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
			<div class="col-lg-10 col-lg-offset-1 m-b-30">
				<div class="row">
					<ul class="media-list text-left">
						@foreach($publish as $p)
						<li class="media {{ count($publish) >= 5 ? 'col-md-6' : '' }} bloc-hover m-t-30">
							<div class="media-left">
								@if($p->type == 'project')
								<a href="{{ route('project', $p->id) }}">
									<img class="media-object" alt="{{ $p->cover->name }}" src="{{ route('project_image', [$p->id, 100, 100]) }}"/>
								</a>
							</div>
							<div class="media-body">
								<a href="{{ route('project', $p->id) }}">
								@else
								<a href="{{ route('article', $p->id) }}">
									<img class="media-object" alt="{{ $p->cover->name }}" src="{{ route('article_image', [$p->id, 100, 100]) }}"/>
								</a>
							</div>
							<div class="media-body">
								<a href="{{ route('article', $p->id) }}">	
								@endif
									<h3 class="media-heading">{{ $p->title }}</h3>
									<h4 class="media-heading">{{ $p->category->term }}</h4>
									@if(count($publish) >= 5)
										<p>{{ clean($p->desc, 90) }}</p>
									@else
										<p>{{ $p->desc }}</p>
									@endif
								</a>
							</div>
						</li>
						@endforeach
					</ul>
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