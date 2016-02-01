<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="fr">
<!--<![endif]-->
<head>
	<meta charset="utf-8" />
	<title>Connexion à l'administration</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="{{ asset('assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/style.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/style-responsive.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('assets/css/theme/default.css') }}" rel="stylesheet" id="theme" />
</head>
<body>
	<div id="page-loader" class="fade in"><span class="spinner"></span></div>
	<div id="page-container" class="fade">
        <div class="login bg-black animated fadeInDown">
            <div class="login-content">
                <form action="{{ route('post_login') }}" method="POST" class="margin-bottom-0">
	                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group m-b-20">
                        <input type="email" class="form-control input-lg" name="email" value="{{ old('email') }}" placeholder="Email"/>
                    </div>
                    <div class="form-group m-b-20">
                        <input type="password" class="form-control input-lg" placeholder="Mot de passe"  name="password" id="password"/>
                    </div>
                    <div class="checkbox m-b-20">
                        <label>
                            <input type="checkbox" name="remember"> Se souvenir de moi
                        </label>
                    </div>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-success btn-block btn-lg">Connexion</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- end login -->
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
	<script src="{{ asset('assets/js/apps.min.js') }}"></script>
	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>
</body>
</html>
