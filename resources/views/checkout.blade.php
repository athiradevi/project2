@extends('customerlayout')
  
@section('content')

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Checkout</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<div class="untree_co-section">
		    <div class="container">
		      <div class="row mb-5">
		        <div class="col-md-12">
		          <div class="border p-4 rounded" role="alert">
		            Returning customer? <a href="#">Click here</a> to login
		          </div>
		        </div>
		      </div>
		      <div class="row">
		        <div class="col-md-6 mb-5 mb-md-0">
		          <h2 class="h3 mb-3 text-black">Billing Details</h2>
		          <div class="p-3 p-lg-5 border bg-white">
		            <!-- <div class="form-group">
		              <label for="c_country" class="text-black">Country <span class="text-danger">*</span></label>
		              <select id="c_country" class="form-control">
		                <option value="1">Select a country</option>    
		                <option value="2">bangladesh</option>    
		                <option value="3">Algeria</option>    
		                <option value="4">Afghanistan</option>    
		                <option value="5">Ghana</option>    
		                <option value="6">Albania</option>    
		                <option value="7">Bahrain</option>    
		                <option value="8">Colombia</option>    
		                <option value="9">Dominican Republic</option>    
		              </select>
		            </div> -->
		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="name" class="text-black">Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
		              </div>
		              <!-- <div class="col-md-6">
		                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="c_lname" name="c_lname">
		              </div> -->
		            </div>

		            <div class="form-group row mb-5">
		              <div class="col-md-6">
		                <label for="email" class="text-black">Email Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="email" name="email" value="{{ $user->email }}">
		              </div>
		              <div class="col-md-6">
		                <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ $user->phoneno }}">
		              </div>
		            </div>


		            <div class="form-group row">
		              <div class="col-md-12">
		                <label for="address" class="text-black">Address <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="address" name="address" placeholder="Street address" value="{{ $user->address }}">
		              </div>

		              
		            </div>


		            <div class="form-group row">
		              <div class="col-md-6">
		                <label for="state" class="text-black">State <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="state" name="state" value="{{ $user->state }}">
		              </div>

		              <div class="col-md-6">
		                <label for="country" class="text-black">Country <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="country" name="country" value="{{ $user->country }}">
		              </div>
		            </div>
		            <div class="form-group row">

		              <div class="col-md-6">
		                <label for="zip" class="text-black">Posta / Zip <span class="text-danger">*</span></label>
		                <input type="text" class="form-control" id="zip" name="zip" value="{{ $user->zip_code }}">
		              </div>
		              <div class="col-md-6">
		            	<div class="input-group-append">
		                    <button class="btn btn-black btn-sm save" type="button" id="button-addon2" >Save</button>
		                  </div>
		              </div>
		            </div>


		          </div>

		         
		        </div>
		        <div class="col-md-6">


		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">Your Order</h2>
		              <div class="p-3 p-lg-5 border bg-white">
		                <table class="table site-block-order-table mb-5">
		                  <thead>
		                    <th>Product</th>
		                    <th>Total</th>
		                  </thead>
		                  <tbody>
		                  	@foreach($cart as $cart_value)
		                    <tr>
		                      <td>{{ $cart_value->p_name }} <strong class="mx-2">x</strong> {{ $cart_value->qty }}</td>
		                      <td>Rs {{ $cart_value->grand_total }}</td>
		                    </tr>
		                    @endforeach
		                    <tr>
		                      <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
		                      <td class="text-black">Rs {{ $grand_total }}</td>
		                    </tr>
		                    <tr>
		                      <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
		                      <td class="text-black font-weight-bold"><strong>Rs {{ $grand_total }}</strong></td>
		                    </tr>
		                  </tbody>
		                </table>

		                <div class="border p-3 mb-3">
		                	<input type="radio" name="radios" id="radio1" />
									    <label for="radio1">Creadi card</label>
		                </div>

		                <div class="border p-3 mb-3">
		                	<input type="radio" name="radios" id="radio2" />
									    <label for="radio1">UPI</label>
		                </div>

		                <div class="border p-3 mb-5">
		                	<input type="radio" name="radios" id="radio3"  checked="checked" value="Cash on delivery"/>
									    <label for="radio1">Cash on delivery</label>
		                </div>

		                <div class="form-group">
		                  <button class="btn btn-black btn-lg py-3 btn-block placeorder" >Place Order</button>
		                </div>

		              </div>
		            </div>
		          </div>

		        </div>
		      </div>
		      <!-- </form> -->
		    </div>
		  </div>

	
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
$(document).ready(function() {
   
    $('.save').click(function () {
      var name = $('#name').val();
      var email = $('#email').val();
      var phone = $('#phone').val();
      var address = $('#address').val();
      var country = $('#country').val();
      var state = $('#state').val();
      var zip = $('#zip').val();
          $.ajax({
              url: "{{url('/updateuserdata')}}",
              type: "GET",
              data: {
                  //_token: $("#csrf").val(),
                  name: name,
                  email: email,
                  phone: phone,
                  address:address,
                  state:state,
                  country:country,
                  zip:zip
              },
              success:function(response){
              if(response.success){
                  alert(response.message) //Message come from controller
                  window.location = "{{url('/checkout')}}";
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
<script>
$(document).ready(function() {
   
    $('.placeorder').click(function () {
          $.ajax({
              url: "{{url('/placeorder')}}",
              type: "GET",
              success:function(response){
              if(response.success){
                  alert(response.message) //Message come from controller
                  window.location = "{{url('/thanks')}}";
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

