@extends('customerlayout')
  
@section('content')

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cart</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		

		<div class="untree_co-section before-footer-section">
            <div class="container">
            	@if(!$cart->isEmpty())
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-quantity">Quantity</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($cart as $cart_val)
                        <tr>
                          <td class="product-thumbnail">
                            <img src="{{ asset('project/images/product-1.png') }}" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">{{ $cart_val->p_name }}</h2>
                          </td>
                          <td>Rs {{ $cart_val->p_rate }}</td>
                          <td>
                            <div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 120px;">
                              <div class="input-group-prepend">
                                <button class="btn btn-outline-black decrease" data-type="{{ $cart_val->p_rate *  $cart_val->qty}}" data-value="{{ $cart_val->qty }}" data-id="{{ $cart_val->c_id }}" type="button">&minus;</button>
                              </div>
                              <input type="hidden" class="p_id" value="{{ $cart_val->c_id }}">
                              <input type="text" class="form-control text-center quantity-amount" value="{{ $cart_val->qty }}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                              <div class="input-group-append">
                                <button class="btn btn-outline-black increase" data-type="{{ $cart_val->p_rate *  $cart_val->qty}}" data-value="{{ $cart_val->qty }}" data-id="{{ $cart_val->c_id }}" type="button">&plus;</button>
                              </div>
                            </div>
        
                          </td>
                          <td >Rs {{ $cart_val->p_rate *  $cart_val->qty}}</td>
                          <td><a href="#" class="btn btn-black btn-sm">X</a></td>
                        </tr>
        								@endforeach
                      </tbody>
                    </table>
                  </div>
                </form>
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <!-- <div class="col-md-6 mb-3 mb-md-0">
                      <button class="btn btn-black btn-sm btn-block">Update Cart</button>
                    </div> -->
                    <div class="col-md-6">
                      <button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">Rs {{ $grand_total }}</strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Total</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">Rs {{ $grand_total }}</strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" onclick="window.location='{{ url('checkout') }}';">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              @else

                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Cart is empty</h3>
                        </div>
                      </div>
        
                    </div>
                  </div>
                </div>
              </div>
              @endif
            </div>
          </div>
		
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
$(document).ready(function(){
    $('.increase').on('click', function(){
    	var id = $(this).attr('data-id');
    	var qty = $(this).attr('data-value');
    	var grand_total = $(this).attr('data-type');
        $.ajax({
        url: "{{url('/qty_plus')}}",
        method: "GET",
        dataType: "json",
        data: {
            _token: "{{ csrf_token() }}",
            qty: qty,
            id: id,
            grand_total: grand_total
        },
          success:function(response){
              if(response.success){
                  alert(response.message) //Message come from controller
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
    });
    });
    $('.decrease').on('click', function(){
    	var id = $(this).attr('data-id');
    	var qty = $(this).attr('data-value');
    	var grand_total = $(this).attr('data-type');
        $.ajax({
        url: "{{url('/qty_minus')}}",
        method: "GET",
        dataType: "json",
        data: {
            _token: "{{ csrf_token() }}",
            qty: qty,
            id: id,
            grand_total: grand_total
        },
          success:function(response){
              if(response.success){
                  alert(response.message) //Message come from controller
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

