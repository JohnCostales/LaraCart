@extends('layouts.mainLayout.main_design')
@section ('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
            @include('layouts.mainLayout.main_sidebar')
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--features_items-->
                    <h2 class="title text-center">{{ $categoryList->name }}</h2>
                    @foreach ($productsAll as $product)

                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ asset('images/backend_images/products/small/'.$product->image) }}" alt="" />
                                    <h2>€ {{ $product->price }}</h2>
                                    <p>{{ $product->product_name }}</p>
                                    <a href="{{ url('product/'.$product->id) }}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>View Product</a>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
                <!--features_items-->

                <!--/category-tab-->

                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>

@endsection
