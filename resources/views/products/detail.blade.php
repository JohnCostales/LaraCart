@extends('layouts.mainLayout.main_design')
@section ('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                @include('layouts.mainLayout.main_sidebar')
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details">
                    <!--product-details-->
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
                        <form name="addToCart" id="addToCart" action="{{ url('add-cart') }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                            <input type="hidden" name="product_name" value="{{ $productDetails->name }}">
                            <input type="hidden" name="product_code" value="{{ $productDetails->code }}">
                            <input type="hidden" name="price" value="{{ $productDetails->price }}">
                            <div class="product-information">
                                <!--/product-information-->
                                <img src="" class="newarrival" alt="" />
                                <h2>{{ $productDetails->product_name }}</h2>
                                <p>Code: {{ $productDetails->product_code }}</p>
                                <p>
                                    <!-- Show each sizes available -->
                                    <select id="selSize" name="size">
                                        <option value="">Select Size</option>
                                        @foreach($productDetails->attributes as $sizes)
                                        <option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes-> size
                                            }}</option>
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
                                <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
                            </div>
                            <!--/product-information-->
                        </form>
                    </div>
                </div>
                <!--/product-details-->
                <div class="category-tab shop-details-tab">
                    <!--category-tab-->
                    <div class="col-sm-12">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#description" data-toggle="tab">Description</a></li>
                            <li><a href="#shipping" data-toggle="tab">Shipping</a></li>
                            <li class=""><a href="#reviews" data-toggle="tab">Reviews</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="description">
                            <div class="col-sm-12">
                                <p>{{ $productDetails->description }}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="shipping">
                        </div>

                        <div class="tab-pane fade" id="reviews">
                            <div class="col-sm-12">
                                <ul>
                                    <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                                    <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                                    <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                                </ul>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur.</p>
                                <p><b>Write Your Review</b></p>

                                <form action="#">
                                    <span>
                                        <input type="text" placeholder="Your Name">
                                        <input type="email" placeholder="Email Address">
                                    </span>
                                    <textarea name=""></textarea>
                                    <b>Rating: </b> <img src="images/product-details/rating.png" alt="">
                                    <button type="button" class="btn btn-default pull-right">
                                        Submit
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

</section>

@endsection
