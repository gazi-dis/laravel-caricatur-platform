<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="utf-8">
  <title>{{ config('settings.title') }}</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="shortcut icon" type="image/png" href="{{ asset('uploads/favicon/'.config('settings.favicon')) }}"/>
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
<link rel="stylesheet" href="{{ asset('src/frontend/plugins/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('src/frontend/plugins/themify/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('src/frontend/plugins/counto/animate.css') }}">
  <link rel="stylesheet" href="{{ asset('src/frontend/plugins/aos/aos.css') }}">
  <link rel="stylesheet" href="{{ asset('src/frontend/plugins/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('src/frontend/plugins/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('src/frontend/plugins/magnific-popup/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('src/frontend/plugins/animated-text/animated-text.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('src/frontend/gallery/css/lightbox.min.css') }}" />
  <!-- Main Stylesheet -->
  <link href="{{ asset('src/frontend/css/style.css') }}" rel="stylesheet">

</head>

<body>
  
<!-- Navigation Start -->
<!-- Header Start --> 

<nav class="navbar navbar-expand-lg  main-nav " id="navbar">
	<div class="container">
	  <a class="navbar-brand" href="{{ route('frontend.index') }}">
	  	<img src="{{ asset('uploads/logo/'.config('settings.logo')) }}" alt="" class="img-fluid">
	  </a>

	  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
		<span class="ti-align-justify"></span>
	  </button>
  
		  <div class="collapse navbar-collapse" id="navbarsExample09">
			<ul class="navbar-nav ml-auto">
			  <li class="nav-item  active"><a class="nav-link" href="{{ route('frontend.index') }}">Anasayfa</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('frontend.contact-index') }}">İletişim</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('admin.index') }}">Giriş Yap</a></li>
			</ul>
		</div>
	</div>
</nav>

<!-- Header Close --> 


<!-- Navigation ENd -->