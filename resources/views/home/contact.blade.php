<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
    <link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
	<!-- Meta Description -->
	<meta name="description" content="О нас страница Megacampro.kz">
	<!-- Meta Keyword -->
	<meta name="keywords" content="megacampro.kz">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>О нас</title>

    {{-- CSS --}}
    <link rel="stylesheet" href="{{ asset("css/linearicons.css") }}">
	<link rel="stylesheet" href="{{ asset("css/linearicons.css") }}">
	<link rel="stylesheet" href="{{ asset("css/owl.carousel.css") }}">
	<link rel="stylesheet" href="{{ asset("css/themify-icons.css") }}">
	<link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}">
	<link rel="stylesheet" href="{{ asset("css/nice-select.css") }}">
	<link rel="stylesheet" href="{{ asset("css/nouislider.min.css") }}">
	<link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
	<link rel="stylesheet" href="{{ asset("css/main.css") }}">
</head>
<body>

	<!-- Start Header Area -->
	@auth('web')
		<div class="adm_bare">
			<a href="/admin"><img  title="вернуться в админку" src="{{ asset("img/gear.png") }}"></a>
		</div>
	@endauth
	{{-- start-header --}}
        @include('home.homestaf.header')
	{{-- and-header --}}
	<!-- End Header Area -->

	<!-- Start Banner Area -->
	<div class="abtus">
		<h1>О нас</h1>
	</div>
	<!-- End Banner Area -->

	<!--================Contact Area =================-->
	<section class="contact_area section_gap_bottom">
		<div class="container">
			<div id="mapBox" class="mapBox" data-lat="40.701083" data-lon="-74.1522848" data-zoom="13" data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
			 data-mlat="40.701083" data-mlon="-74.1522848">
			</div>
			<div class="row">
				<div class="col-lg-3">
					<div class="contact_info">
						<div class="info_item">
							<i class="lnr lnr-home"></i>
							<h6>California, United States</h6>
							<p>Santa monica bullevard</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-phone-handset"></i>
							<h6><a href="#">00 (440) 9865 562</a></h6>
							<p>Mon to Fri 9am to 6 pm</p>
						</div>
						<div class="info_item">
							<i class="lnr lnr-envelope"></i>
							<h6><a href="#">support@colorlib.com</a></h6>
							<p>Send us your query anytime!</p>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
						<div class="col-md-6">
							<div class="form-group">
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'">
							</div>
							<div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<textarea class="form-control" name="message" id="message" rows="1" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'"></textarea>
							</div>
						</div>
						<div class="col-md-12 text-right">
							<button type="submit" value="submit" class="primary-btn">Send Message</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
	<!--================Contact Area =================-->

	{{-- footer --}}
	    @include('home.homestaf.footer')
	{{-- and footer --}}

	<!--================Contact Success and Error message Area =================-->
	<div id="success" class="modal modal-message fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-close"></i>
					</button>
					<h2>Сообщение отправлено!</h2>
					<p>Ваше сообщение успешно отправлено!</p>
				</div>
			</div>
		</div>
	</div>

	<!-- Modals error -->

	<div id="error" class="modal modal-message fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="fa fa-close"></i>
					</button>
					<h2>Ошибка!</h2>
					<p> Что то пошло не так... </p>
				</div>
			</div>
		</div>
	</div>
	<!--================End Contact Success and Error message Area =================-->

</body>

</html>