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
                            @if($cat->status=="1")
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#{{ $cat->id }}">
                                            <span class="pull-right"><i class=""></i></span>
                                            {{ $cat->name }}
                                        </a>
                                    </h4>
                                </div>
                            <div id="{{ $cat->id }}" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        @foreach ($cat->categories as $subcat)
                                        @if($subcat->status=="1")
                                        <li><a href="{{ asset('/products/'.$subcat->url) }}">{{ $subcat->name }}</a></li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <!--/category-products-->

                    <!--/shipping-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <!--All_items-->
                    <h2 class="title text-center">All Items</h2>
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
