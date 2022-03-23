<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="{{ asset("img/fav.png") }}">
	<!-- Meta Description -->
	<meta name="description" content="{{ $product->seo_desk }}">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>{{ $product->seo_desk }}</title>
	<!--CSS============================================= -->
	<link rel="stylesheet" href="{{ asset("css/linearicons.css") }}">
	<link rel="stylesheet" href="{{ asset("css/font-awesome.min.css") }}">
	<link rel="stylesheet" href="{{ asset("css/themify-icons.css") }}">
	<link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
	<link rel="stylesheet" href="{{ asset("css/owl.carousel.css") }}">
	<link rel="stylesheet" href="{{ asset("css/nice-select.css") }}">
	<link rel="stylesheet" href="{{ asset("css/nouislider.min.css") }}">
	<link rel="stylesheet" href="{{ asset("css/ion.rangeSlider.css") }}" />
	<link rel="stylesheet" href="{{ asset("css/ion.rangeSlider.skinFlat.css") }}" />
	<link rel="stylesheet" href="{{ asset("css/main.css") }}">
</head>
<body>
	@auth('web')
		<div class="adm_bare">
			<a href="/admin"><img  title="вернуться в админку" src="{{ asset("img/gear.png") }}"></a>
		</div>
	@endauth
	{{-- start-header --}}
        @include('home.homestaf.header')
	{{-- and-header --}}

	<!--================Single Product Area =================-->
	<div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6"><br>
					@if(json_decode($product->images) !== null)
						<div class="s_Product_carousel">
							@foreach(json_decode($product->images) as $key)
								<div class="single-prd-item">
									<img class="img-fluid" src="/storage/{{ $key }}" alt="нет картинки">
								</div>
							@endforeach
						</div>
					@else
						<div class="single-prd-item">
							<img class="img-fluid" src="{{ asset('/img/custom.png') }}" alt="картинки нет">
						</div>
					@endif
				</div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3 class="product_name">{{ $product->name }}</h3>
						<h2 class="price">{{ $product->price }} <span>тг</span> </h2>
						<ul class="list">
							<li><a class="active" href="#"><span>Категория</span>{{ $product->selecter }}</a></li>
							@if( $product->count !== 0)
								<li><a href="#"><span>Наличие</span>{{ $product->count }} <span>шт.</span> </a></li>
							@else
								<li><a href="#"><span>Наличие</span>Под Заказ</a></li>
							@endif
						</ul>
						<p>{{ $product->desc_short }}</p>
						<div class="card_area d-flex align-items-center">
							<div class="primary-btn" article="{{ $product->id }}" img="{{ asset('storage/'. $product->images) }}">добавить в корзину</div>
							<!-- <a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->

	<!--================Product Description Area =================-->
	<section class="product_description_area">
		<div class="container">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item">
					<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Описание</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
					 aria-selected="false">Характеристики</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
					 aria-selected="false">Отзывы</a>
				</li>
			</ul>

			

			<div class="tab-content" id="myTabContent">
					<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
						<div class="player_engine">
							{!! $product->you_tb !!}
						</div>
						{!! $product->desk_large !!}						
					</div>
					
					<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
						<div class="table-responsive">
							{!! $product->more_option !!}
						</div>
					</div>			
				<div class="staf_box_fone" style="display:none"></div>
				<div class="tab-pane fade show active" id="review" role="tabpanel" aria-labelledby="review-tab">
					<div class="row">
						<div class="col-lg-6">
							<div class="row total_rate">
								<div class="col-6">
									<div class="box_total">
										<h5>Общий</h5>
										<h4>4.0</h4>
										<h6>рэйтинг</h6>
									</div>
								</div>
								<div class="col-6">
									<div class="rating_list">
										<h3>рэйтинг людей</h3>
										<ul class="list">
											<li>5 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i> 500</li>
											<li>4 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="mix"></i> 01</li>
											<li>3 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="mix"></i><i class="mix"></i> 01</li>
											<li>2 Star <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="mix"></i><i class="mix"></i><i class="mix"></i> 01</li>
											<li>1 Star <i class="fa fa-star"></i><i class="mix"></i></i><i class="mix"></i></i><i class="mix"></i></i><i class="mix"></i> 01</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="review_list">
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
											<img src="{{ asset('img/product/review-1.png') }}" alt="картинка не установлена">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<!-- <i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i> -->
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
										<img src="{{ asset('img/product/review-1.png') }}" alt="картинка не установлена">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
								<div class="review_item">
									<div class="media">
										<div class="d-flex">
										<img src="{{ asset('img/product/review-1.png') }}" alt="картинка не установлена">
										</div>
										<div class="media-body">
											<h4>Blake Ruiz</h4>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
										</div>
									</div>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
										dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
										commodo</p>
								</div>
							</div>
						</div>

						@if(Auth::guard('user')->check())
							{{-- @if($comment) --}}
						<div class="col-lg-6">
							<div class="review_box">
								<h4>Ваш отзыв</h4>
								<p>Ваша оценка</p>
								<!-- /send_recall -->
								<form  action="#" method="get" class="row contact_form"  id="contactForm" novalidate="novalidate">
								<input type="hidden" name="_token" value="{{ csrf_token() }}" />
									<div class="raiting-conteiner">
										<div class="rating-area">
											<input type="radio" id="star-5" name="rating" value="5">
											<label for="star-5" title="Оценка «5»"></label>	
											<input type="radio" id="star-4" name="rating" value="4">
											<label for="star-4" title="Оценка «4»"></label>    
											<input type="radio" id="star-3" name="rating" value="3">
											<label for="star-3" title="Оценка «3»"></label>  
											<input type="radio" id="star-2" name="rating" value="2">
											<label for="star-2" title="Оценка «2»"></label>    
											<input type="radio" id="star-1" name="rating" value="1">
											<label for="star-1" title="Оценка «1»"></label>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="hidden" class="form-control" id="id_product" name="id_product" value="{{ $product->id }}">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="hidden" class="form-control" id="id_user" name="id_user" value="{{ $user->id }}">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											@if($user->img === null)
												<input type="hidden" class="form-control" id="img" name="img" value="null">
											@else
												<input type="hidden" class="form-control" id="img" name="img" value="{{ $user->img }}">
											@endif
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" readonly class="form-control" id="user" name="user" value="{{ $user->name }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $user->name }}'">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<input type="text" readonly class="form-control" id="patronymic" name="patronymic" value="{{ $user->patronymic }}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{ $user->patronymic }}'">
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group">
											<textarea class="form-control" name="comment" id="comment" rows="1" placeholder="здесь можно оставить свой отзыв" onfocus="this.placeholder = ''" onblur="this.placeholder = 'здесь можно оставить свой отзыв!'"></textarea></textarea>
										</div>
									</div>
									<div class="col-md-12 text-right">
										<button type="submit" value="submit" class="primary-btn">Отправить отзыв</button>
									</div>
								</form>
							</div>
							<div class="mode_native">
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
							</div>
							{{-- show Errors --}}
						</div> {{-- end col-lg-6 --}}
						@else
							<div class="col-lg-6  line_box_s">
								<h4>что бы оставить отзыв нужно войти</h4>
								<p>сдесь вы сможете оставить свой замечательный отзыв! </p>
								<br/>
								<a href="/login" class="opn_doors">войти</a>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Product Description Area =================-->

	{{-- Start related-product Area --}} 
		@include('home.homestaf.best-item')
	{{-- End related-product Area --}}

    {{-- footer --}}
	    @include('home.homestaf.footer')
	{{-- and footer --}}
</body>

</html>