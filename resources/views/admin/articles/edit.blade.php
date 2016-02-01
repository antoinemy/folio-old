<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Dashboard</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="{{ asset('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/theme/default.css') }}" rel="stylesheet" id="theme" />
	<link href="{{ asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-calendar/css/bootstrap_calendar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/gritter/css/jquery.gritter.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/morris/morris.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('assets/plugins/DataTables/css/data-table.css') }}" rel="stylesheet" />
</head>
<body>
	<!-- begin #page-loader -->
	<div id="page-loader" class="fade in m-t-0"><span class="spinner"></span></div>
	<!-- end #page-loader -->
	
	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed">		
		
		@include('admin.includes.menu')
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb pull-right">
				<li>Administration</li>
				<li>Articles</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Gestion des articles</h1>			
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
			    <div class="col-md-12">
			        <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="form-stuff-1">
                        <div class="panel-heading">
                            <h4 class="panel-title">Informations de la page</h4>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('article_update', $publish->id) }}" enctype="multipart/form-data">
	                            <div class="form-group">
                                    <label class="col-md-1 control-label">Image de fond</label>
                                    <div class="col-md-11">
                                    	<div class="row">
		                                    <div class="col-md-2">
			                                    <span class="btn btn-white btn-file">
			                                    	Télécharger une image <input name="background_image" type="file">
			                                    </span>
		                                    </div>
		                                    <div class="col-md-9">
		                                        <input type="text" class="form-control" placeholder="Nom de l'image" name="background_image_name" value="{{ $publish->cover->name }}"/>
		                                    </div>
		                                    <div class="col-md-1">
		                                    	<img class="img-responsive" width="250px" src="{{ route('article_image', [$publish->id, 100, 35]) }}"/>
		                                    </div>
                                    	</div>
                                    </div>
                                </div>
                                
                                
                                
	                            @include('admin.articles.form')
	                            
                            </form>
                        </div>
                    </div>
                    <!-- end panel -->
                </div>
			</div>
			<!-- end row -->
		</div>
		<!-- end #content -->
	</div>

	<script src="{{ asset('assets/plugins/jquery/jquery-1.9.1.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery/jquery-migrate-1.1.0.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	<!--[if lt IE 9]>
		<script src="{{ asset('assets/crossbrowserjs/html5shiv.js') }}"></script>
		<script src="{{ asset('assets/crossbrowserjs/respond.min.js') }}"></script>
		<script src="{{ asset('assets/crossbrowserjs/excanvas.min.js') }}"></script>
	<![endif]-->
	<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/jquery-cookie/jquery.cookie.js') }}"></script>
	<script src="{{ asset('assets/plugins/morris/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/morris/morris.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-jvectormap/jquery-jvectormap-world-merc-en.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-calendar/js/bootstrap_calendar.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/gritter/js/jquery.gritter.js') }}"></script>
	<script src="{{ asset('assets/js/dashboard-v2.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/DataTables/js/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('assets/js/table-manage-default.demo.js') }}"></script>
	<script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
	<script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}"></script>
	<script src="{{ asset('assets/js/apps.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			App.init();			
			TableManageDefault.init();
		});
	</script>
</body>
</html>
