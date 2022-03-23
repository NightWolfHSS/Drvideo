<!-- start footer Area -->
	<footer class="footer-area section_gap">
		<div class="container">
			<div class="row">

				@foreach($footer as $foo)
				<div class="col-lg-3  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>{{ $foo->column_1 }}</h6>
						<p>
							{{$foo->desk_1}}
						</p>
					</div>
				</div>
				<div class="col-lg-4  col-md-6 col-sm-6">
					<div class="single-footer-widget">
						<h6>{{ $foo->column_2}}</h6>
						<p>{{ $foo->desk_2}}</p>
						<div class="" id="mc_embed_signup">

							<form target="_blank" novalidate="true" action="#" method="get" class="form-inline">
								<div class="d-flex flex-row">
									<input class="form-control" name="EMAIL" placeholder="введи свою почту" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '"
									 required="" type="email">
									<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
									<div style="position: absolute; left: -5000px;">
										<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
									</div>

								</div>
								<div class="info"></div>
							</form>
						</div>
					</div>
				</div>
				@endforeach
				
				<div class="col-lg-3  col-md-6 col-sm-6">
					@foreach($footer as $foo)
					<div class="single-footer-widget mail-chimp">
						<h6 class="mb-20">{{ $foo->column_3 }}</h6>
					@endforeach
						<ul class="instafeed d-flex flex-wrap box_resize">
						@foreach($mini_img as $mini)
							<li><img src="{{ asset('storage/' . $mini->mini) }}"></li>
						@endforeach
						</ul>
					</div>
				</div>
				
				<div class="col-lg-2 col-md-6 col-sm-6">
					<div class="single-footer-widget">
						@foreach($footer as $foo)
						<h6>{{ $foo->column_4 }}</h6>
						<p>{{ $foo->desk_4 }}</p>
						@endforeach
						<div class="footer-social d-flex align-items-center">
							@foreach($soc as $i)
								<a href="{{ $i->href }}"><i class="{{ $i->icon }}"></i></a>
							@endforeach
						</div>
					</div>
				</div>
			</div>
			<div class="footer-bottom d-flex justify-content-center align-items-center flex-wrap">
				<p class="footer-text m-0">
Копирайтинг &copy;<script>document.write(new Date().getFullYear());</script> Все права сохранены | Разработан  -  <a href="#" target="_blank">Ss</a>
</p>
			</div>
		</div>
		
		{{-- scripts staff --}}
		{{-- popper --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
		crossorigin="anonymous"></script>
		<script src="{{ asset("js/vendor/jquery-2.2.4.min.js") }}"></script>
		<script src="{{ asset("js/vendor/bootstrap.min.js") }}"></script>
		<script src="{{ asset("js/jquery.ajaxchimp.min.js") }}"></script>
		<script src="{{ asset("js/jquery.nice-select.min.js") }}"></script>
		<script src="{{ asset("js/jquery.sticky.js") }}"></script>
		<script src="{{ asset("js/nouislider.min.js") }}"></script>
		<script src="{{ asset("js/jquery.magnific-popup.min.js") }}"></script>
		<script src="{{ asset("js/owl.carousel.min.js") }}"></script>
		<script src="{{ asset("js/nouislider.min.js") }}"></script>
		<script src="{{ asset("js/main.js") }}"></script>
		<script defer src="{{ asset("js/cart.js") }}"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
		<script src="{{ asset("js/gmaps.min.js") }}"></script> 
		<script src="{{ asset("js/countdown.js") }}"></script>
	
	</footer>
	<!-- End footer Area -->