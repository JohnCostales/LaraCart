@extends('layouts.mainLayout.main_design')
@section ('content')

<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Category</h2>
                    <!--category-products-->
                    <div class="panel-group category-products" id="accordian">
                        <div class="panel panel-default">
                            <?php //echo $categories_menu; ?>
                            @foreach ($categories as $cat)
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#{{ $cat->id }}">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            {{ $cat->name }}
                                        </a>
                                    </h4>
                                </div>
                            <div id="{{ $cat->id }}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach ($cat->categories as $subcat)
                                        <li><a href="{{ asset('/products/'.$subcat->url) }}">{{ $subcat->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!--/category-products-->

                    <!--/price-range-->

                    <!--/shipping-->

                </div>
				</div>
				
				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="{{ asset('images/backend_images/products/medium/'.$productDetails->image) }}" alt="" />
								<!-- <h3>ZOOM</h3> -->
							</div>
							<div id="similar-product" class="carousel slide" data-ride="carousel">
								
								  <!-- Wrapper for slides -->
								    <div class="carousel-inner">
										<div class="item active">
										  <a href=""><img src="assetimages/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										<div class="item">
										  <a href=""><img src="images/product-details/similar1.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar2.jpg" alt=""></a>
										  <a href=""><img src="images/product-details/similar3.jpg" alt=""></a>
										</div>
										
									</div>

								  <!-- Controls -->
								  <a class="left item-control" href="#similar-product" data-slide="prev">
									<i class="fa fa-angle-left"></i>
								  </a>
								  <a class="right item-control" href="#similar-product" data-slide="next">
									<i class="fa fa-angle-right"></i>
								  </a>
							</div>

						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="" class="newarrival" alt="" />
								<h2>{{ $productDetails->product_name }}</h2>
								<p>Code: {{ $productDetails->product_code }}</p>
								<p>
								<!-- Show each sizes available -->
									<select id="selSize" name="size">
										<option value="">Select Size</option>
										@foreach($productDetails->attributes as $sizes)
										<option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes-> size }}</option>
										@endforeach
									</select>
								</p>
								<img src="images/product-details/rating.png" alt="" />
								<span>
									<span id="getPrice">EUR €{{ $productDetails->price }}</span>
									<label>Quantity:</label>
									<input type="text" value="3" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Availability:</b> In Stock</p>
								<p><b>Condition:</b> New</p>
								<p><b>Brand:</b> E-SHOPPER</p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
					</div>
					<!--/product-details-->
					
					
				</div>
			</div>
        </div>
        
	</section>

@endsection
