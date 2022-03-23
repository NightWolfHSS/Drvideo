<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	{{-- token --}}
	<meta name="csrf-token" content="{{ csrf_token() }}">
	{{-- Mobile Specific Meta --}}
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	{{-- Favicon --}}
	<link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
	{{-- Meta Description --}}
	<meta name="description" content="выбрать что то из товаров на сайте">
	{{-- meta character set --}}
	<meta charset="UTF-8">
	{{-- Site Title --}}
	<!-- не индексировать эти страници  -->
	<title>shoptd.kz - весь ассортимент товаров</title>
	{{-- ===CSS ============================================= --}}
        <link rel="stylesheet" href="{{ asset("css/linearicons.css") }}">
	<link rel="stylesheet" href="{{ asset("css/owl.carousel.css") }}">
	<link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}">
	<link rel="stylesheet" href="{{ asset("css/themify-icons.css") }}">
	<link rel="stylesheet" href="{{ asset("css/nice-select.css") }}">
	<link rel="stylesheet" href="{{ asset("css/nouislider.min.css") }}">
	<link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
	<link rel="stylesheet" href="{{ asset("css/main.css") }}">
</head>
<body id="category">
	@auth('web')
		<div class="adm_bare">
			<a href="/admin"><img  title="вернуться в админку" src="{{ asset("img/gear.png") }}"></a>
		</div>
	@endauth
	<!-- start-header -->
		@include('home.homestaf.header')
	<!-- and-header -->

	<!-- Start Banner Area -->
	<section class="space_header">
		<div class="container"></div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">
			<div class="col-xl-3 col-lg-4 col-md-5">
				<div class="sidebar-categories">
					<div class="head">Категории</div>

						@foreach($args as $asrx)
							<div class="main-categories">
								<ul class="navigate_wp">
									<li>{!! $asrx->name !!}</li>
									<ul class="wp_cats">
										<div class="main-flower">
											@if($asrx->img ?? null)
												<img src="{{ asset('storage/' . $asrx->img) }}" alt="picture">	
											@else 			
												<img class="img-fluid" src="{{ asset('/img/custom.png') }}" >	
											@endif	
										</div>
										{{-- не на id а на name что бы искать фильтру по ключ слову --}}
										@foreach($asrx->childsArgs as $chld)
											<div class="list_down">
												<li><a href="#">{!! $chld->name !!}</a></li>
											</div>
										@endforeach
									</ul>
								</ul>
							</div>
						@endforeach

				</div> {{-- sidebar-categories --}}

				<div class="sidebar-filter mt-50">
					<div class="top-filter-head">Фильтр товаров</div>
					<div class="common-filter">
						<div class="head">Брэнд</div>
						<form action="/filter" method="post">	
						<input type="hidden" name="_token" value="{{ csrf_token() }}" />
							@if($filter ?? '')
								@foreach ($filter as $elem) 
									<ul>
										<li class="filter-list">
											<input class="pixel-radio" type="radio" id="{{ $elem->brand }}" name="exsp" value="brand/{{ $elem->brand }}" onChange="this.form.submit()">
											<label for="exsp">{{ $elem->brand }}</label>
										</li>
									</ul>
								@endforeach
							@endif
						</form>
					</div>
			
					{{--<div class="common-filter">
						<div class="head">характеристики</div>
						<form action="/filter" method="post">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
						@if($options ?? '')
                            @foreach ($options as $elem) 
								<ul>
									<li class="filter-list">
										<input class="pixel-radio" type="radio" id="{{ $elem->feature }}" name="stmt" value="feature/{{ $elem->feature }}" onChange="this.form.submit()">
										<label for="stmt">{{ $elem->feature }}</label>
									</li>
								</ul>
							@endforeach
						@endif
						</form> 
					</div>--}}
					
					<div class="common-filter">
						<div class="head">цена</div>
						<div class="price-range-area">
							<div id="price-range"></div>
							<div class="value-wrapper d-flex">
								<div class="price">цена:</div>
								<hr>
								<div id="lower-value"></div>
									<span>тг</span>
								<div class="to">до</div>
								<div id="upper-value"></div>
								<span>тг</span>
							</div>
						</div>
					</div>
				</div> {{--  end common-filter --}}

			</div>
			<div class="col-xl-9 col-lg-8 col-md-7">
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto">
						<select onChange="top.location=this.value">
							<option value="/products/price/low">с начало дешевле</option>
							<option value="/products/price/more">с начало дороже</option>
						</select>
					</div>
					<div class="pagination"></div> {{-- decoration? --}}
				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
				<div class="filters_name"><h4>Все товары</h4></div>
					<div class="row">
					@if($products !== null)	
					{{-- output data --}}
					@foreach ($products as $elem) 
						<!-- single product -->
					
						<div class="col-lg-4 col-md-6">
							<div class="single-product">

									@if($elem->img ?? null)
										<img class="img-fluid" src="{{ asset('storage/' . $elem->img) }}" >	
									@else 			
										<img class="img-fluid" src="{{ asset('/img/custom.png') }}" >	
									@endif	

								<div class="product-details">
						
									<h6>{{ $elem->name }}</h6>
									<div class="price">
										<h6>{{ $elem->price }}тг</h6>
										@if($elem->oldPrice !== "0.000")
											<h6 class="l-through">{{ $elem->oldPrice }}<span>тг</span></h6>
										@endif
									</div>
									<div class="prd-bottom">

										<a href="" class="social-info">
											<span class="ti-bag"></span>
											<p class="hover-text">в корзину</p>
										</a> 
									{{-- 	<a href="" class="social-info">
											<span class="lnr lnr-heart"></span>
											<p class="hover-text">нравится</p>
										</a> --}}
										
										<a href="/product/{{ $elem->id }}" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">посмотреть</p>
										</a>
									</div>
								</div> 
							</div>
						</div>
						@endforeach
					@else 
						<div class="no_data">
							<p>данных пока нет</p>
						</div>
					@endif
					</div>
				</section>
				<!-- End Best Seller -->
				<!-- Start Filter Bar -->
				<div class="filter-bar d-flex flex-wrap align-items-center">
					<div class="sorting mr-auto"></div>
					@if($products !== null)
						{{ $products->links('custom') }} {{-- pagination here --}}
					@endif
				</div>
				<!-- End Filter Bar -->
			</div>
		</div>
	</div>
	
	{{-- Start related-product Area --}} 
		@include('home.homestaf.best-item')
	{{-- End related-product Area --}}

	{{-- footer --}}
		@include('home.homestaf.footer')
	{{-- and footer --}}

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url( {{ asset("img/organic-food/q1.jpg") }} );">

								</div>
								<div class="item" style="background: url( {{ asset("img/organic-food/q1.jpg") }} );">

								</div>
								<div class="item" style="background: url( {{ asset("img/organic-food/q1.jpg") }} );">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>