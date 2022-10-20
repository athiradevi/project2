@extends('customerlayout')
  
@section('content')
		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Modern Interior <span clsas="d-block">Design Studio</span></h1>
								<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique.</p>
								<p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#" class="btn btn-white-outline">Explore</a></p>
							</div>
						</div>
						<div class="col-lg-7">
							<div class="hero-img-wrap">
								<img src="{{ asset('project/images/couch.png')}}" class="img-fluid">
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<!-- Start Product Section -->
		<div class="product-section">
			<div class="container">
				<div class="row">

					<!-- Start Column 1 -->
					<div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
						<h2 class="mb-4 section-title">Crafted with excellent material.</h2>
						<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. </p>
						<p><a href="shop.html" class="btn">Explore</a></p>
					</div> 
					<!-- End Column 1 -->

					<!-- Start Column 2 -->
					<input type="hidden" value="{{ auth()->user()->id }}" id="user_id">
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item AddToCart">
							<img src="{{ asset('project/images/product-1.png')}}" class="img-fluid product-thumbnail" id="pimage">
							<h3 class="product-title pname" id="pname">Nordic Chair</h3>
							Rs<strong class="product-price" id="prate"> 5000</strong>

							<span class="icon-cross">
								<img src="{{ asset('project/images/cross.svg')}}" class="img-fluid ">
							</span>
						</a>
					</div> 
					<!-- End Column 2 -->

					<!-- Start Column 3 -->
					<div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
						<a class="product-item" href="cart.html">
							<img src="{{ asset('project/images/product-2.png')}}" class="img-fluid product-thumbnail">
							<h3 class="product-title" >Kruzo Aero Chair</h3>
							Rs<strong class="product-price"> 78.00</strong>

							<span class="icon-cross">
								<img src="{{ asset('project/images/cross.svg')}}" class="img-fluid">
							</span>
						</a>
					</div>
					<!-- End Column 3 -->


				</div>
			</div>
		</div>
		<!-- End Product Section -->

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
$(document).ready(function() {
   
    $('.AddToCart').click(function () {
      var p_name = $("a.product-item.AddToCart h3").text();
      var p_rate = $('a.product-item.AddToCart strong').text();
      var user_id = $('#user_id').val();
          $.ajax({
              url: "{{url('/AddToCart')}}",
              type: "GET",
              data: {
                  //_token: $("#csrf").val(),
                  user_id: user_id,
                  p_name: p_name,
                  p_rate: p_rate,
                  qty:1,
                  grand_total:p_rate
              },
              success:function(response){
              if(response.success){
                  alert(response.message) //Message come from controller
                  window.location = "{{url('/cart')}}";
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }

          });
      
  });
});
</script>	
@endsection
