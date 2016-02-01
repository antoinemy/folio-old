<!DOCTYPE html>
<html lang="fr">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta name="description" content="{{ $project->desc }}">
	    <meta name="author" content="">
	    <link rel="icon" href="{{ asset('assets/favicon.ico') }}">
	    <title>{{ $project->title }}</title>
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	    <link href='https://fonts.googleapis.com/css?family=Raleway:400,400italic,700,700italic,900,900italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
	    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
	    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
	    <link href="{{ asset('assets/plugins/lightbox/css/lightbox.css') }}" rel="stylesheet"/>
	    <link href="{{ asset('assets/css/cover.css') }}" rel="stylesheet">
	    <!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	    <style>
			#cover-middle { background-image:url({{ route('project_image', [$project->id, 2000, 1300]) }}) }
			.full-background { background:url({{ route('about_image', [2000, 1300, 'triangulator']) }}) no-repeat center 20% fixed }
		</style>
	</head>
	<body>
		<div class="site-wrapper allow" id="cover-middle">
			<div class="site-wrapper-inner">
				
				@include('menu')
				
				<div class="cover cover-container">
					<div class="col-md-8 col-md-offset-2 col-xs-12 allow">
						<h1 class="uppercase">{{ $project->title }}</h1>
						<div class="divider"></div>
						<p class="m-b-30 desc">{{ $project->desc }}</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="top-background">
			<div class="container">			
				<div class="col-lg-10 col-lg-offset-1">
					<div class="row">
						<div class="{{ $project->url == '' ? 'col-md-12' : 'col-md-9' }}">
							<ol class="float-left">
								<li>Projets</li>
								<li>{{ $project->category->term }}</li>
								<li>{{ $project->title }}</li>
							</ol>
						</div>
						@if($project->url != '')
							<div class="col-md-3">
								<a href="{{ $project->url }}" target="_blank" class="btn btn-warning float-right">Voir le site</a>
								<div class="clear"></div>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		
		<div class="container m-t-30">
			<div class="col-lg-10 col-lg-offset-1 alone">
				<div class="row">
					<div class="{{ count($project->tools) <= 0 ? 'col-md-12' : 'col-md-8' }} text-left">
						{!! $project->content !!}
					</div>
					@if(count($project->tools) > 0)
						<div class="col-md-3 col-md-offset-1 m-b-30">
							<h4 class="uppercase">Boîte à outils</h4>
							<div class="divider"></div>
							<p>
								@foreach($project->tools as $tool)
								<span class="f-s-{{ rand(1, 4) }}">{{ $tool->tool->term }}</span>
								@endforeach
							</p>
						</div>
					@endif
				</div>
			</div>
		</div>
		
		@if(count($project->pictures) > 0)
			<div class="full-background">
				<div class="container">			
					<div class="col-lg-10 col-lg-offset-1">
						<h3 class="uppercase m-t-30">Les photos</h3>
						<div class="divider"></div>
						<div class="row">
							@if(count($project->pictures) == 1)
								@foreach($project->pictures as $key=>$p)
									<div class="col-lg-12">
										<div class="m-b-30 bloc-hover">
											<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
												<img class="img-responsive" src="{{ route('project_image', [$project->id, 1000, 400, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
											</a>
										</div>
									</div>
								@endforeach
							@elseif(count($project->pictures) == 2)
								@foreach($project->pictures as $key=>$p)
									@if($key == 0)
										<div class="col-lg-8">
											<div class="m-b-30 m-t-60 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 1000, 700, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
										</div>
									@elseif($key == 1)
										<div class="col-lg-4">
											<div class="m-b-30 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 1000, 1400, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
										</div>
									@endif
								@endforeach
							@elseif(count($project->pictures) == 3 || count($project->pictures) == 4)
								@foreach($project->pictures as $key=>$p)
									@if($key == 0 && count($project->pictures) == 4)
										<div class="col-lg-2">
											<div class="m-b-75 m-t-30 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 500, 500, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
									@elseif($key == 0 && count($project->pictures) != 4)
										<div class="col-lg-5">
											<div class="m-b-75 m-t-30 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 500, 250, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
									@elseif($key == 1)
											<div class="m-b-15 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 500, 500, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
										</div>
									@elseif($key == 2)
										<div class="col-lg-7">
											<div class="m-b-30 m-t-60 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 1000, 700, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
										</div>
									@elseif($key == 3)
										<div class="col-lg-3">
											<div class="m-b-30 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 1000, 2400, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
										</div>
									@endif
								@endforeach						
							@elseif(count($project->pictures) == 5 || count($project->pictures) == 6)
								@foreach($project->pictures as $key=>$p)
									@if($key == 0)				
										<div class="col-lg-7">
											<div class="m-b-30 m-t-60 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 1000, 700, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
										</div>
									@elseif($key == 1)
										<div class="col-lg-3">
											<div class="m-b-30 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 1000, 900, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
									@elseif($key == 2)
											<div class="m-b-30 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 1000, 1200, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
										</div>
									@elseif($key == 3)
										<div class="col-lg-2">
											<div class="m-b-75 m-t-30 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 500, 500, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
									@elseif($key == 4 && count($project->pictures) != 6)
											<div class="m-b-15 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 500, 500, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
										</div>
									@elseif($key == 4 && count($project->pictures) == 6)
											<div class="m-b-15 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 500, 500, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
									@elseif($key == 5)
											<div class="m-b-30 bloc-hover">
												<a href="{{ route('project_image', [$project->id, 1200, 700, $p->picture->url]) }}" data-lightbox="example-1">
													<img class="img-responsive" src="{{ route('project_image', [$project->id, 500, 500, $p->picture->url]) }}" alt="{{ $p->picture->name }}">
												</a>
											</div>
										</div>
									@endif
								@endforeach
							@endif
						</div>
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