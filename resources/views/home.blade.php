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
	    <link href='https://fonts.googleapis.com/css?family=Raleway:400,700,900,300,100' rel='stylesheet' type='text/css'>
	    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('assets/plugins/lightbox/css/lightbox.css') }}" rel="stylesheet"/>
	    <link href="{{ asset('assets/css/cover.css') }}" rel="stylesheet">
	    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    <style>
			#cover { background-image:url({{ route('about_image', [2000, 1300]) }}) }
			.full-background { background:url({{ route('about_image', [2000, 1300, 'triangulator']) }}) no-repeat center 20% fixed }
		</style>
	</head>
	<body>
		<div class="site-wrapper allow" id="cover">
			<div class="site-wrapper-inner">
				
				@include('menu')
				
				<div class="cover cover-container">
					<div class="col-md-8 col-md-offset-2 col-lg-8 col-lg-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 allow">
						<h1 class="uppercase">{{ $page->title_h1 }}</h1>
						<h2 class="uppercase lucide">{{ $page->title_h2 }}</h2>
						<div class="divider"></div>
						<p class="m-b-30 desc">{{ $page->desc }}</p>
						@if(!empty($page->sender))
						<div class="m-b-30">
							<a href="{{ $page->sender }}" target="_blank" class="btn btn-lg btn-custom">Télécharger mon cv</a>
						</div>
						@endif
						<div id="bloc-invisible">
							<a href="#about">
								<span class="fa fa-angle-double-down arrow-animate"></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="container" id="about">
			<div class="col-lg-10 col-lg-offset-1 alone">
				<h3 class="uppercase m-t-30">À propos de moi</h3>
				<div class="divider"></div>
				<p class="m-b-30">
					{{ $page->content }}
				</p>
				@if(count($page->pictures) > 1)
					<div class="row">
						@foreach($page->pictures as $key=>$pic)
							@if($key == 0)
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<div class="m-b-30 m-t-60 bloc-hover">
									<a href="{{ route('about_image', [722, 722, $pic->picture->url]) }}" data-lightbox="example-1">
										<img class="img-responsive" src="{{ route('about_image', [722, 722, $pic->picture->url]) }}" alt="{{ $pic->picture->name }}">
									</a>
								</div>
							@elseif($key == 1)
								<div class="m-b-30 bloc-hover">
									<a href="{{ route('about_image', [722, 1076, $pic->picture->url]) }}" data-lightbox="example-1">
										<img class="img-responsive" src="{{ route('about_image', [722, 1076, $pic->picture->url]) }}" alt="{{ $pic->picture->name }}">
									</a>
								</div>
							</div>
							@elseif($key == 2)
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<div class="m-b-30 bloc-hover">
									<a href="{{ route('about_image', [722, 604, $pic->picture->url]) }}" data-lightbox="example-1">
										<img class="img-responsive" src="{{ route('about_image', [722, 604, $pic->picture->url]) }}" alt="{{ $pic->picture->name }}">
									</a>
								</div>
							@elseif($key == 3)
								<div class="m-b-30 bloc-hover">
									<a href="{{ route('about_image', [722, 958, $pic->picture->url]) }}" data-lightbox="example-1">
										<img class="img-responsive" src="{{ route('about_image', [722, 958, $pic->picture->url]) }}" alt="{{ $pic->picture->name }}">
									</a>
								</div>
							@elseif($key == 4)
								<div class="m-b-30 bloc-hover">
									<a href="{{ route('about_image', [722, 722, $pic->picture->url]) }}" data-lightbox="example-1">
										<img class="img-responsive" src="{{ route('about_image', [722, 722, $pic->picture->url]) }}" alt="{{ $pic->picture->name }}">
									</a>
								</div>
							</div>
							@elseif($key == 5)
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 m-b-30">
								<div class="m-b-30 m-t-30 bloc-hover">
									<a href="{{ route('about_image', [722, 1194, $pic->picture->url]) }}" data-lightbox="example-1">
										<img class="img-responsive" src="{{ route('about_image', [722, 1194, $pic->picture->url]) }}" alt="{{ $pic->picture->name }}">
									</a>
								</div>
							@elseif($key == 6)
								<div class="m-b-30 bloc-hover">
									<a href="{{ route('about_image', [722, 958, $pic->picture->url]) }}" data-lightbox="example-1">
										<img class="img-responsive" src="{{ route('about_image', [722, 958, $pic->picture->url]) }}" alt="{{ $pic->picture->name }}">
									</a>
								</div>
							</div>
							@endif
						@endforeach
					</div>
				@endif
			</div>
		</div>
		
		@if(count($articles) > 0)
		<div class="full-background" id="last-articles">
			<div class="container">			
				<div class="col-lg-10 col-lg-offset-1">
					<h3 class="uppercase m-t-30">Mes derniers articles</h3>
					<div class="divider"></div>
					<div class="row m-b-30">
						@foreach($articles as $num=>$a)
							@if($num == 0)
								<a href="{{ route('article', $a->id) }}">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-b-30 bloc-hover">
										<div class="row">
											<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-8 col-xs-12">
												<h3 class="text-right">{{ $a->title }}</h3>
												<p class="text-right">
													{{ $a->desc }}
												</p>
											</div>
											<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
												<img class="img-responsive" src="{{ route('article_image', [$a->id, 722, 361]) }}" alt="{{ $a->cover->name }}">
											</div>
										</div>
									</div>
								</a>
							@elseif($num == 1)
								<a href="{{ route('article', $a->id) }}">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 m-b-30 bloc-hover">
										<div class="row">
											<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
												<img class="img-responsive" src="{{ route('article_image', [$a->id, 722, 722]) }}" alt="{{ $a->cover->name }}">
											</div>
											<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
												<h3 class="text-left">{{ $a->title }}</h3>
												<p class="text-left">
													{{ $a->desc }}
												</p>
											</div>
										</div>
									</div>
								</a>
							@else
								<a href="{{ route('article', $a->id) }}">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bloc-hover">
										<div class="row">
											<div class="col-lg-6 col-lg-offset-2 col-md-6 col-md-offset-2 col-sm-6 col-sm-offset-2 col-xs-12">
												<h3 class="text-right">{{ $a->title }}</h3>
												<p class="text-right">
													{{ $a->desc }}
												</p>
											</div>
											<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
												<img class="img-responsive" src="{{ route('article_image', [$a->id, 722, 318]) }}" alt="{{ $a->cover->name }}">
											</div>
										</div>
									</div>
								</a>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
		@endif
		
		@if(count($projects) > 0)
		<div class="container m-b-30" id="last-creations">			
			<div class="col-lg-10 col-lg-offset-1">
				<h3 class="uppercase m-t-30">Mes derniers projets</h3>
				<div class="divider"></div>
				<div class="row">
					@foreach($projects as $num=>$p)
						<a href="{{ route('project', $p->id) }}">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 bloc-hover p-25 {{ $num == 1 ? 'm-t-120' : '' }} {{ $num == 2 ? 'm-t-60' : '' }} }}">
								<img class="img-circle img-responsive" src="{{ route('project_image', [$p->id, 722, 722]) }}" alt="Custom image">
								<div class="caption">
									<h4>{{ $p->title }}</h4>
									<p>{{ $p->desc }}</p>
								</div>
							</div>
						</a>
					@endforeach
				</div>
			</div>
		</div>
		@endif

		@include('footer')
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/lightbox/js/lightbox-2.6.min.js') }}"></script>
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
				
				setInterval(function() {
					$('.arrow-animate').animate({
						'bottom':'-5px'
					});
					
					$('.arrow-animate').animate({
						'bottom':'5px'
					});
				}, 500);
				
				$('a[href*=#]:not([href=#])').click(function() {
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
						var target = $(this.hash);
						target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
						if (target.length) {
							$('html,body').animate({
								scrollTop: target.offset().top
							}, 1000);
							return false;
						}
					}
				});
			}
			
			function checkScroll(startY){	
			    if($(window).scrollTop() > startY){
			        $('.navbar').addClass("scrolled");
			        $('#cover').removeClass("allow");
			    }else{
			        $('.navbar').removeClass("scrolled");
			        $('#cover').addClass("allow");
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
				    animate();
			    }
		    });
		</script>
	</body>
</html>