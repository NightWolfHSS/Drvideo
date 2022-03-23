<!DOCTYPE html>
<html lang="ru" class="no-js">

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
	<!-- Meta Description -->
	<meta name="description" content="сдесь вы найдёте отличные камеры, видеонаблюдения">
	<!-- Meta Keyword -->
	<meta name="keywords" content="камера, камеры, видеонаблюдения в Караганде, качественное, видео оборудование">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>shop.megacampro.kz - интернет магазин, качественного видеонаблюдения</title>
	<!-- CSS============================================= -->
	<link rel="stylesheet" href="{{ asset("css/linearicons.css") }}">
	<link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}">
	<link rel="stylesheet" href="{{ asset("css/themify-icons.css") }}">
	<link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
	<link rel="stylesheet" href="{{ asset("css/owl.carousel.css") }}">
	<link rel="stylesheet" href="{{ asset("css/nice-select.css") }}">
	<link rel="stylesheet" href="{{ asset("css/nouislider.min.css") }}">
	<link rel="stylesheet" href="{{ asset("css/ion.rangeSlider.css") }}">
	<link rel="stylesheet" href="{{ asset("css/ion.rangeSlider.skinFlat.css") }}">
	<link rel="stylesheet" href="{{ asset("css/magnific-popup.css") }}">
	<link rel="stylesheet" href="{{ asset("css/main.css") }}">
</head>

<body>	

	@auth('web')
		<div class="adm_bare">
			<a href="/admin"><img  title="вернуться в админку" src="{{ asset("img/gear.png") }}"></a>
		</div>
	@endauth
	<!-- start-header -->
	@include('home.homestaf.header')
	<!-- and-header -->

	<!-- start banner Area -->
	@if($slides !== null)
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						@foreach($slides as $sld)
						<!-- single-slide -->
						<div class="row single-slide align-items-center d-flex">
							<div class="col-lg-5 col-md-6">
								<div class="banner-content">
									<h3>{{$sld->name}}</h3>
									<p>{{$sld->deskroption}}</p>
									<div class="add-bag d-flex align-items-center">
										<a class="next_time" href="{{ $sld->href }}"></a>
										<span class="add-text text-uppercase">перейти к товару</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								@if($sld->image ?? null)
									<div class="banner-img">
										<img class="img-fluid" src="{{ asset('storage/' . $sld->image) }}" alt="logo">
									</div>
								@else
									<div class="banner-img">
										<img class="img-fluid" src="{{ asset('/img/custom.png') }}" >	
									</div>
								@endif
							</div>
						</div>
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h3>show.megacampro.kz <br></h3>
									<p>сдесь вы сможите найти лучшее видеонаблюдение и оборудование</p>
									<div class="add-bag d-flex align-items-center">
										<a class="next_time" href="https://shoptd.kz/products"></a>
										<span class="add-text text-uppercase">перейти к товару</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/banner-img.png" alt="">
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	@else
	<section class="banner-area">
		<div class="container">
			<div class="row fullscreen align-items-center justify-content-start">
				<div class="col-lg-12">
					<div class="active-banner-slider owl-carousel">
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h3>show.megacampro.kz <br></h3>
									<p>сдесь вы сможите найти лучшее видеонаблюдение и оборудование</p>
									<div class="add-bag d-flex align-items-center">
										<a class="next_time" href="https://shoptd.kz/products"></a>
										<span class="add-text text-uppercase">перейти к товару</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/banner-img.png" alt="">
								</div>
							</div>
						</div>
						<!-- single-slide -->
						<div class="row single-slide">
							<div class="col-lg-5">
								<div class="banner-content">
									<h3>show.megacampro.kz <br></h3>
									<p>сдесь вы сможите найти лучшее видеонаблюдение и оборудование</p>
									<div class="add-bag d-flex align-items-center">
										<a class="next_time" href="https://shoptd.kz/products"></a>
										<span class="add-text text-uppercase">перейти к товару</span>
									</div>
								</div>
							</div>
							<div class="col-lg-7">
								<div class="banner-img">
									<img class="img-fluid" src="img/banner/banner-img.png" alt="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	@endif
	<!-- End banner Area -->

	<!-- start features Area -->
	<section class="features-area section_gap">
		<div class="container">
			<div class="row features-inner">
				@foreach($pieces as $p)
				<!-- single features -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="single-features">
						<div class="f-icon">
							<img class="img-fluid" src="{{ asset('storage/' . $p->icon) }}" alt="logo">
						</div>
						<h6>{{$p->name}}</h6>
						<p>{{$p->desk}}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- end features Area -->
	<!-- Start category Area -->
	<section class="category-area">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-md-12">
					<div class="row">
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100 hide_and_seek" src="{{ asset("img/category/k12.jpg") }}"  alt="">
								<a href="img/category/k12.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">услуги</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100 hide_and_seek" src="{{ asset("img/category/k12.jpg") }}" alt="">
								<a href="img/category/k12.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">лучшие камеры</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-4 col-md-4">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100 hide_and_seek" src="{{ asset("img/category/k12.jpg") }}" alt="">
								<a href="img/category/k12.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">продукт</h6>
									</div>
								</a>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="single-deal">
								<div class="overlay"></div>
								<img class="img-fluid w-100 hide_and_seek" src="{{ asset("img/category/k12.jpg") }}" alt="">
								<a href="img/category/k12.jpg" class="img-pop-up" target="_blank">
									<div class="deal-details">
										<h6 class="deal-title">ищи на сайте</h6>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="single-deal">
						<div class="overlay"></div>
						<img class="img-fluid w-100 hide_and_seek_quad" src="{{ asset("img/category/k12.jpg") }}" alt="">
						<a href="img/category/k12.jpg" class="img-pop-up" target="_blank">
							<div class="deal-details">
								<h6 class="deal-title">видеонаблюдение</h6>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- End category Area -->
	<!-- start product Area -->
	 <section class="owl-carousel active-product-area section_gap">
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>новые товары</h1>
							<p>недавно добавленный ассоритимент</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>Тг-150000</h6>
									<h6 class="l-through">тг500</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">
									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- single product slide -->
		<div class="single-product-slider">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-6 text-center">
						<div class="section-title">
							<h1>популярные товары</h1>
							<p>сдесь  популярные товары</p>
						</div>
					</div>
				</div>
				<div class="row">
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">
									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
					<!-- single product -->
					<div class="col-lg-3 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="{{ asset("/img/product/p1.jpg") }}" alt="">
							<div class="product-details">
								<h6>addidas New Hammer sole
									for Sports person</h6>
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<div class="prd-bottom">

									<a href="" class="social-info">
										<span class="ti-bag"></span>
										<p class="hover-text">add to bag</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-heart"></span>
										<p class="hover-text">Wishlist</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-sync"></span>
										<p class="hover-text">compare</p>
									</a>
									<a href="" class="social-info">
										<span class="lnr lnr-move"></span>
										<p class="hover-text">view more</p>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- end product Area -->

	<!-- Start exclusive deal Area -->
	<section class="exclusive-deal-area">
		<div class="container-fluid">
			<div class="row justify-content-center align-items-center">
				<div class="col-lg-6 no-padding exclusive-left">
					<div class="row clock_sec clockdiv" id="clockdiv">
						<div class="col-lg-12">
							<h1>Внимание! специальное предложение</h1>
							<p>Получи профессиональное оборудование сейчас!</p>
						</div>
						<div class="col-lg-12">
							<div class="row clock-wrap">
								<div class="col clockinner1 clockinner">
									<h1 class="days">150</h1>
									<span class="smalltext">дни(ей)</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="hours">23</h1>
									<span class="smalltext">час(ов)</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="minutes">47</h1>
									<span class="smalltext">минут(ы)</span>
								</div>
								<div class="col clockinner clockinner1">
									<h1 class="seconds">59</h1>
									<span class="smalltext">секунд(ы)</span>
								</div>
							</div>
						</div>
					</div>
					<a href="" class="primary-btn">Купить сейчас</a>
				</div>
				<div class="col-lg-6 no-padding exclusive-right">
					<div class="active-exclusive-product-slider">
						<!-- single exclusive carousel -->
						<div class="single-exclusive-slider">
							<img class="img-fluid" src="{{ asset("img/product/e-p1.png") }}" alt="">
							<div class="product-details">
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<h4>addidas New Hammer sole
									for Sports person</h4>
								<div class="add-bag d-flex align-items-center justify-content-center">
									<a class="add-btn" href=""><span class="ti-bag"></span></a>
									<span class="add-text text-uppercase">в Карзину</span>
								</div>
							</div>
						</div>
						<!-- single exclusive carousel -->
						<div class="single-exclusive-slider">
							<img class="img-fluid" src="{{ asset("img/product/e-p1.png") }}" alt="">
							<div class="product-details">
								<div class="price">
									<h6>$150.00</h6>
									<h6 class="l-through">$210.00</h6>
								</div>
								<h4>addidas New Hammer sole
									for Sports person</h4>
								<div class="add-bag d-flex align-items-center justify-content-center">
									<a class="add-btn" href=""><span class="ti-bag"></span></a>
									<span class="add-text text-uppercase">Add to Bag</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End exclusive deal Area -->

	<!-- Start brand Area -->
	<section class="brand-area section_gap">
		<div class="container">
			<div class="row">
				@foreach($partner as $p)
					<a class="col single-img" href="{{ $p->href_p}}">
						<img class="img-fluid d-block mx-auto"  src="{{ asset('storage/' . $p->logo_p) }}" alt="logo">
					</a>
				@endforeach
			</div>
		</div>
	</section>
	<!-- End brand Area -->

	<!-- Start related-product Area -->
	{{-- Start related-product Area --}} 
		@include('home.homestaf.best-item')
	{{-- End related-product Area --}}
	<!-- End related-product Area -->
	{{-- footer --}}
	@include('home.homestaf/footer')
</body>

</html>