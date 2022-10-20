@extends('customerlayout')
  
@section('content')

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Order Details</h1>
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
            	@if(!$order_details->isEmpty())
              <div class="row mb-5">
                <form class="col-md-12" method="post">
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Image</th>
                          <th class="product-name">Product</th>
                          <th class="product-price">Price</th>
                          <th class="product-total">Total</th>
                          <th class="product-remove">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      	@foreach($order_details as $order_details)
                        <tr>
                          <td class="product-thumbnail">
                            <img src="{{ asset('project/images/product-1.png') }}" alt="Image" class="img-fluid">
                          </td>
                          <td class="product-name">
                            <h2 class="h5 text-black">{{ $order_details->p_name }}</h2>
                          </td>
                          <td>Rs {{ $order_details->p_rate }}</td>
                          <td >Rs {{ $order_details->p_rate *  $order_details->qty}}</td>
                          <td>
                            @if($order_details->status == 0)
                            <button class="btn btn-outline-green btn-sm btn-block changestatus" data-id="{{ $order_details->id }}" data-value="1">Pick</button>
                            @elseif($order_details->status == 1)
                            <button class="btn btn-outline-green btn-sm btn-block changestatus" data-id="{{ $order_details->id }}" data-value="2">Ordered</button>
                            @elseif($order_details->status == 2)
                            <button class="btn btn-outline-green btn-sm btn-block changestatus" data-id="{{ $order_details->id }}" data-value="3">Shipped</button>
                            @elseif($order_details->status == 3)
                            <strong class="btn btn-outline-green btn-sm btn-block "  >Deliverd</strong>
                            @endif
                          </td>
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
                    <!-- <div class="col-md-6">
                      <button class="btn btn-outline-black btn-sm btn-block">Continue Shopping</button>
                    </div> -->
                  </div>
                </div>
               
              </div>
              @else

                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Order is empty</h3>
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
    $('.changestatus').on('click', function(){
    	var id = $(this).attr('data-id');
      var status = $(this).attr('data-value');
        $.ajax({
        url: "{{url('/updatestatus')}}",
        method: "GET",
        dataType: "json",
        data: {
            id: id,
            status: status
        },
          success:function(response){
              if(response.success){
                  window.location.reload();
              }else{
                  alert("Error")
              }
           },
           error:function(error){
              console.log(error)
           }
    });
    });
   
</script>	
@endsection

