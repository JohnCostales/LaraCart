@extends('layouts.mainLayout.main_design')
@section ('content')

<section>
    <div class="container">
        <div class="row">
        @if(Session::has('flash_message_error'))
            <div class="alert alert-warning alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif
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
                    </div>
                    <div class="col-sm-7">
                        <form name="addToCart" id="addToCart" action="{{ url('/add-cart') }}" method="post">
                            {{ csrf_field() }}
                            <!-- Hidden inputs to pass through the form and add to cart -->
                            <input type="hidden" name="product_id" value="{{ $productDetails->id }}">
                            <input type="hidden" name="product_name" value="{{ $productDetails->product_name }}">
                            <input type="hidden" name="product_code" value="{{ $productDetails->product_code }}">
                            <input type="hidden" name="size" value="{{ $productDetails->size }}">
                            <input type="hidden" name="price" id="price" value="{{ $productDetails->price }}">
                            <div class="product-information">
                                <!--/product-information-->
                                <h2>{{ $productDetails->product_name }}</h2>
                                <p>Code: {{ $productDetails->product_code }}</p>
                                <p>
                                    <!-- Show each sizes available -->
                                    <select id="selSize" name="size">
                                        <option value="">Size:</option>
                                        @foreach($productDetails->attributes as $sizes)
                                        <option value="{{ $productDetails->id }}-{{ $sizes->size }}">{{ $sizes-> size
                                            }}</option>
                                        @endforeach
                                    </select>
                                </p>
                                <span>
                                    <span id="getPrice">EUR €{{ $productDetails->price }}</span>
                                    <label>Quantity:</label>
                                    <!-- Check the quantity in stock -->
                                    @if($totalStock > 0)
                                    <input type="text" name="quantity" value="{{ $totalStock }}">
                                    <button type="submit" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Add to cart
                                    </button>
                                    @else
                                    <input type="text" value="{{ $totalStock }}" disabled>
                                    @endif

                                </span>
                                <p><b>Availability:</b>
                                    <span id="stockCount">
                                        @if($totalStock > 0)
                                        In Stock
                                        @else
                                        Out of Stock
                                        @endif
                                    </span>
                                </p>
                                <p><b>Condition:</b> New</p>
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

                    </div>
                </div>
            </div>

</section>

@endsection