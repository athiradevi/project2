@extends('customerlayout')
  
@section('content')

		<!-- Start Hero Section -->
			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Order Status</h1>
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
		      <div class="row">
		        <div class="col-md-6">

		        	@foreach($status as $status)
		          <div class="row mb-5">
		            <div class="col-md-12">
		              <h2 class="h3 mb-3 text-black">{{ $status->p_name}}</h2>
		              <div class="p-3 p-lg-5 border bg-white">

		                <div class="border p-3 mb-3">
		                	<input type="checkbox" name="checkbox" id="checkbox1" <?php if($status->status >= 1 ) { echo "checked"; } ?>/>
									    <label for="radio1">Order Placed</label>
		                </div>

		                <div class="border p-3 mb-3">
		                	<input type="checkbox" name="checkbox" id="checkbox2" <?php if($status->status >= 2 ) { echo "checked"; } ?>/>
									    <label for="radio1">Shipped</label>
		                </div>

		                <div class="border p-3 mb-5">
		                	<input type="checkbox" name="checkbox" id="checkbox3"  <?php if($status->status == 3 ) { echo "checked"; } ?> />
									    <label for="radio1">Delivered</label>
		                </div>


		              </div>
		            </div>
		          </div>
		          @endforeach

		        </div>
		      </div>
		      <!-- </form> -->
		    </div>
		  </div>

	
 
@endsection

