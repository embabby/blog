@extends('shop.master')
@section('body')

<style>
#myModal .form-group, #myModal button {
    margin-left: 10px;
}
#myModal .form-group {
    width: 450px;
    margin-top: 10px;
}
 #myModal {
    color: #000;    
}
 #myModal h4 {
    margin-left: 130px;
    font-weight: bold; 
}
</style>

@if(Auth::check())
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
	        <form action="{{route('shop.contact')}}" method="post" style="direction: ltr">
	            <div class="form-group">
	                <input type="email" required class="form-control" name="email" value="{{Auth::user()->email}}" placeholder="Enter email">
	            </div>
	            <div class="form-group">
	                <textarea placeholder="Leave a message" id="body" name="body" class="form-control" rows="5" maxlength="255" required ></textarea>
	            </div>
	            <input type="hidden" name="receiver_email" value="{{$product->email}}">
	            <input type="hidden" name="receiver_id" value="{{$product->vendor_id}}">
	            <button type="submit" class="btn btn-primary" value="Send">Send</button>
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	         </form>
	     </div>

      </div>
    </div>
  </div>
 @endif 

<section class="product">
	<div class="container">
		<div class="row">

			<div id="snackbar"style="
    visibility: hidden; 
    min-width: 350px; 
    margin-left: -125px; 
    background-color: #333; 
    color: #fff; 
    text-align: center; 
    border-radius: 2px; 
    padding: 16px; 
    position: fixed; 
    z-index: 1; 
    left: 50%; 
    bottom: 230px; 
" ></div>

			<div class="col-md-8">
				<h4>{{$product->selected_subject->$selected_lang}}</h4>
				<figure class="figure mt-2" style="width: 100%">
          @foreach ($product->all_images_paths() as $path)

					<img src="{{asset($path)}}" class="figure-img img-fluid rounded" style="width: 100%" alt="A generic square placeholder image with rounded corners in a figure.">
          @endforeach

          <figcaption class="figure-caption">
						{{$product->selected_subject->$selected_lang}}
					</figcaption>
				</figure>
        
        <div class="description">
          <h5>{{trans('layout.Description')}}:</h5>
          @if(!empty($product->selected_description->$selected_lang))
          	<p>{{$product->selected_description->$selected_lang}}</p>
          @else
          	<p>{{trans('layout.No_description')}}.</p>
          @endif
        </div>
        
        		@if(Auth::check())
				<div class="comment">
					<h4>{{trans('layout.Reviews')}}:</h4>

						<div class="form-group col-12">

							<textarea placeholder="Leave a note" id="review" name="review" class="form-control" rows="7" maxlength="255" required ></textarea>
						</div>
						<div class="col-12 text-center">							
							<button type="submit" id="post_review" class="btn btn-primary btn-block">Post</button>

                            <input type="hidden" name="product_id" id="product_review_id" value="{{$product->id}}">
						</div>

				</div>
				@endif


				<!--Notes-->
                    @if(count($reviews))

			        <div class="container bd-example">
			                <div class="row comments">
			                    <div class="col-lg-12" id="reviews_show" style="max-height: 350px;overflow: auto;" >

			                    <big >Reviews</big>
			                    <hr>
			                        @foreach($reviews as $review)
			                        <article class="article" style="position:relative;" id="{{$review->id}}">
			                            <big>{{($review->user->name)}} </big>
			                            <hr>
			                            <p>{{$review->body}}</p>
			                            @if(Auth::user() && $review->user_id == Auth::user()->id)
			                            <section id="{{$review->id}}" class="close1" data-href="{{route('remove.review', $review->id)}}"> </section>
			                            @endif
			                        </article>
			                        @endforeach
			                </div>
			                </div>
			            
			        </div>
                    @endif

        <!-- END Notes-->

			</div>
			<div class="col-md-4 text-center">
				<div class="product-info">
					<div class="price-info">
						
						<p class="text-muted">{{$product->price}}</p>
					</div>

					<div class="sub-info">
						
						<p class="text-muted">{{trans('layout.Category')}}:

							<span class="">{{$product->category->en}}</span>

						</p>
						<!-- <p class="text-muted">viewed:
							<span class="float-right">9</span>
						</p> -->
					</div>
				</div>
					<div class="clearfix"></div>

				<div class="text-left more-info product-info">
					<h6>{{trans('layout.Contact seller')}}</h6>
					<div class="col-sm-4 float-left">
						<img src="{{asset('website_includes/img/avatar.jpg')}}" alt="" class="img-fluid rounded-circle">

					</div>
					
					<!--<div class="clearfix"></div>-->
					<div class="sub-info">
						
					@if( $product->mobile != 0)	
					<p class="text-muted">5646:
						<span class="">{{$product->mobile}}</span>
					</p>
					@endif
					 
					<p class="text-muted">{{trans('layout.Email')}}:
						<span class="">{{$product->email}}</span>
					</p>

					@if(Auth::check())
					<a href="#myModal" data-toggle="modal" data-target="#myModal" class="btn btn-primary d-block"><i class="fa fa-envelope"></i> {{trans('layout.send mail')}}</a>
					@endif
					</div>
				</div>


				@if(count($sponser_ads))
				<div class="sponser-ads text-left">
					<div class="wrap">
						<h6>{{trans('layout.Sponser ads')}}</h6>
						@foreach( $sponser_ads as $ad)
						<div class="item">
							<a href="#">
								<img src="{{asset('website_includes/img/item.jpg')}}" alt="" class="">
							</a>
							<div class="price-info ">
								<a href="{{$ad->path().getRequest()}}">{{$ad->selected_subject->$selected_lang}}</a>
								<p class="text-muted">{{$ad->price}}</p>
							</div>
						</div>
						@endforeach															
					</div>
				</div>
				@endif

			</div>
		</div>
	</div>
</section>










<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.2/axios.js"></script>

<script>
    var snackbar = document.getElementById("snackbar");
    $(document).on("click", ".close1", function(e){
            e.preventDefault();
            var url = ($(this).attr('data-href'));
            var id=$(this).attr('id');
            swal({
                title: "{{trans('layout.alert_title')}}",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#7901FB",
                confirmButtonText: "{{trans('layout.confirm_button')}}!",
                closeOnConfirm: true,
                cancelButtonText: "{{trans('layout.cancel_button')}}",
            },
                function () {
                    //window.location = url;
                    $.ajax({
                        url: url,
                        type: 'GET',
                        success: function (data) {
                            snackbar.innerHTML = 'your review has been deleted!';
                            snackbar.style.visibility = "visible";
                            setTimeout(function () { snackbar.style.visibility = snackbar.style.visibility.replace("visible", "hidden"); }, 2500);
                            $('#'+id+'').hide();
                        }, error: function (error) {
                            snackbar.innerHTML = 'something went wrong';
                            snackbar.style.visibility = "visible";
                            setTimeout(function () { snackbar.style.visibility = snackbar.style.visibility.replace("visible", "hidden"); }, 2500);
                        }
                    })
                });
})
</script>


<script src="{{asset('website_includes/js/shop.js')}}"></script>

        @stop
