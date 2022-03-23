<!DOCTYPE html>
<html lang="ru" class="no-js">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
	<!-- Meta Description -->
	<meta name="description" content="Регистрация на сайт shoptd.kz">
	<!-- Meta Keyword -->
	<meta name="keywords" content="форма, регистрация, сайт, shoptd.kz">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Страница регистрации</title>

	<!--CSS============================================= -->
	<link rel="stylesheet" href="{{ asset( "css/linearicons.css") }}">
	<link rel="stylesheet" href="{{ asset( "css/owl.carousel.css") }}">
	<link rel="stylesheet" href="{{ asset( "css/themify-icons.css") }}">
	<link rel="stylesheet" href="{{ asset( "css/font-awesome.min.css") }}">
	<link rel="stylesheet" href="{{ asset( "css/nice-select.css") }}">
	<link rel="stylesheet" href="{{ asset( "css/nouislider.min.css") }}">
	<link rel="stylesheet" href="{{ asset( "css/bootstrap.css") }}">
	<link rel="stylesheet" href="{{ asset( "css/main.css") }}">
</head>

<body>

	<!-- start-header -->
	@include('home.homestaf.header')
	<!-- and-header -->

	<!-- Start Banner Area -->
	<!-- <section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Регистрация</h1>
					<nav class="d-flex align-items-center">
						<a href="/">Главная<span class="lnr lnr-arrow-right"></span></a>
						<a href="/registration">регистрация</a>
					</nav>
				</div>
			</div>
		</div>
	</section> -->
	<!-- End Banner Area -->
	<!-- is error -->
	@if ($errors->any()) 
			<div class="pop_error">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
	@endif
	{{-- status output --}}
	@if (session('status'))
		<div class="pop_error"> 	
			<div class="success"><h2>{{ session('status') }}</h2></div>
		</div>
	@endif
	<!--================Login Box Area =================-->
	<section class="login_box_area section_gap">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<img class="img-fluid" src="img/mi.jpg" alt="нет изображения">
						<div class="hover">
							<h4>Скоро вы сможете...</h4>
							<p>Смотреть, делиться, оставлять отзывы...</p>
						</div>
					</div>
				</div>

				<!-- verification is needed here [VALIDA] -->

				<div class="col-lg-6">
					<div class="login_form_inner">
						<h3>Регистрация</h3>
						<form class="row login_form" action="/registrationIn" method="post" id="contactForm" novalidate="novalidate">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Ваше имя" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваше имя'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="patronymic" placeholder="Ваше отчество" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваше отчество'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="email" placeholder="ваш e-mail" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Ваш E-mail'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password" placeholder="ваш пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'вашь пароль'">
							</div>
							<div class="col-md-12 form-group">
								<input type="password" class="form-control" id="name" name="password_confirmation" placeholder="повторите пароль" onfocus="this.placeholder = ''" onblur="this.placeholder = 'повторите пароль'">
							</div>
							<div class="col-md-12 form-group">
								<div class="creat_account">
									
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="primary-btn">Регистрация</button>
								<!-- <a href="#">Забыли пароль?</a> -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->
    {{-- footer --}}
	@include('home.homestaf/footer')
	{{-- and footer --}}
</body>

</html>