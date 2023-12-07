@extends('frontend.template.index')


@section('content')

{{-- @livewire('frontend.product.product', ['code' => $code]) --}}


<div class="page-header">
    <div class="page-header__container container">
        <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                
            </nav>
        </div>
    </div>
</div>
<div class="block" wire:ignore>
    <div class="container">
        <div class="product product--layout--standard" data-layout="standard">
            @if (session('msg'))
            <div class="alert alert-warning">
                {{ session('msg') }}
            </div>
            @endif
            <div class="product__content">
                <!-- .product__gallery -->
                <div class="product__gallery">
                    <div class="product-gallery">
                        <div class="product-gallery__featured">
                            <button class="product-gallery__zoom">
                                <svg width="24px" height="24px">
                                    <use xlink:href="images/sprite.svg#zoom-in-24"></use>
                                </svg>
                            </button>
                            <div class="owl-carousel" id="product-image">
                                <!-- <div class="product-image product-image--location--gallery">
                                    <a href="data:image/{{ $product->product_picture }};base64,{{ chunk_split(base64_encode($product->product_picture)) }}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                        <img class="product-image__img" src="data:image/{{ $product->product_picture }};base64,{{ chunk_split(base64_encode($product->product_picture)) }}" alt="">
                                    </a>
                                </div> -->
                                
                                @foreach($image as $i)
                                
                                <div class="product-image product-image--location--gallery">
                                    <a href="data:image/{{ $i->product_image_big }};base64,{{ chunk_split(base64_encode($i->product_image_big)) }}" data-width="700" data-height="700" class="product-image__body" target="_blank">
                                        <img class="product-image__img" src="data:image/{{ $i->product_image_big }};base64,{{ chunk_split(base64_encode($i->product_image_big)) }}" alt="">
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="product-gallery__carousel">
                            <div class="owl-carousel" id="product-carousel">
                                
                                @foreach($image as $i)
                                
                                <a href="data:image/{{ $i->product_image_small }};base64,{{ chunk_split(base64_encode($i->product_image_small)) }}" class="product-image product-gallery__carousel-item">
                                    <div class="product-image__body">
                                        <img class="product-image__img product-gallery__carousel-image" src="data:image/{{ $i->product_image_small }};base64,{{ chunk_split(base64_encode($i->product_image_small)) }}" alt="">
                                    </div>
                                </a>

                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .product__gallery / end -->
                <!-- .product__info -->
                <div class="product__info">
                    <div class="product__wishlist-compare">
                        <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Wishlist">
                            <svg width="16px" height="16px">
                                <use xlink:href="images/sprite.svg#wishlist-16"></use>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip" data-placement="right" title="Compare">
                            <svg width="16px" height="16px">
                                <use xlink:href="images/sprite.svg#compare-16"></use>
                            </svg>
                        </button>
                    </div>
                    <h1 class="product__name"><?= $product['product_name']; ?></h1>
                    <div class="product__prices text-primary">
                        Rp <?= $product['product_price_purchase']; ?>
                    </div>
                </div>
                <!-- .product__info / end -->
                <!-- .product__sidebar -->
                <div class="product__sidebar">
                    <div class="product__availability">
                        Availability: <span class="text-success">In Stock</span>
                    </div>
                    <!-- <div class="product__prices">
                        Rp<?= $product['product_price_sell']; ?>
                    </div> -->
                    <!-- .product__options -->
                    <form class="product__options my-3" method="post" action="{{ route('fe.add.cart') }}">
                        {{ csrf_field() }}
                        <div class="form-group product__option">
                            <label class="product__option-label" for="product-quantity">Quantity</label>
                            <div class="product__actions">
                                <input type="hidden" name="product_code" value="{{ $product->product_code }}">
                                <div class="product__actions-item">
                                    <div class="input-number product__quantity">
                                        <input id="product-quantity" class="input-number__input form-control form-control-lg" name="cart_quantity" type="number" min="1" value="1">
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                </div>
                                <div class="product__actions-item product__actions-item--addtocart">
                                    @if (auth()->guard('customer')->check())
                                    <button type="submit" class="btn btn-primary btn-lg">Add to cart</button>
                                        
                                    @else
                                        <a href="{{ route('login') }}" Class="btn btn-primary btn-lg"> Add to cart</a>
                                    @endif
                                </div>
                              
                            </div>
                        </div>
                    </form>
                    <!-- .product__options / end -->
                </div>
            </div>
        </div>
        <div class="product-tabs  product-tabs--sticky">
            <div class="product-tabs__list">
                <div class="product-tabs__list-body">
                    <div class="product-tabs__list-container container">
                        <a href="#tab-description" class="product-tabs__item product-tabs__item--active">Description</a>
                        <a href="#tab-specification" class="product-tabs__item">Info</a>
                        <!-- <a href="#tab-reviews" class="product-tabs__item">Reviews</a> -->
                    </div>
                </div>
            </div>
            <div class="product-tabs__content">
                <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                    <div class="typography">
                        <h3>Product Full Description</h3>
                        <p>
                            {{ $product->product_info }}
                        </p>
                    </div>
                </div>
                <div class="product-tabs__pane" id="tab-specification">
                    <div class="spec">
                        <h3 class="spec__header">Product Info</h3>
                        <div class="spec__section">
                            <!-- <h4 class="spec__section-title">General</h4> -->
                            @foreach ($info as $pi)
                            <div class="spec__row">
                                <div class="spec__name">{{ $pi->product_info_name }}</div>
                                <div class="spec__value">{{ $pi->product_info_value }}</div>
                            </div>
                            @endforeach
                            
                        </div>
                    
                        <div class="spec__disclaimer">
                            Information on technical characteristics, the delivery set, the country of manufacture and the appearance
                            of the goods is for reference only and is based on the latest information available at the time of publication.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- .block-products-carousel -->
<div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title">Related Products</h3>
            <div class="block-header__divider"></div>
            <div class="block-header__arrows-list">
                <button class="block-header__arrow block-header__arrow--left" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                    </svg>
                </button>
                <button class="block-header__arrow block-header__arrow--right" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div class="block-products-carousel__slider">
            <div class="block-products-carousel__preloader"></div>
            <div class="owl-carousel">
                @foreach ($productlist as $p )
                <div class="block-products-carousel__column">
                    <div class="block-products-carousel__cell">
                        <div class="product-card product-card--hidden-actions ">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use xlink:href="images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span>
                            </button>
                            <div class="product-card__badges-list">
                                <div class="product-card__badge product-card__badge--new">New</div>
                            </div>
                            <div class="product-card__image product-image">
                                <a href="{{ route('fe.product', $p->product_code) }}" class="product-image__body">
                                    <img class="product-image__img" src="data:image/{{ $p->product_icon_fileext }};base64,{{ chunk_split(base64_encode($p->product_icon)) }}" alt="">
                                </a>
                            </div>
                            <div class="product-card__info">
                                <div class="product-card__name">
                                    <a href="product.html">{{ $p->product_id }}</a>
                                </div>
                            </div>
                            {{-- <div class="product-card__actions">
                                <div class="product-card__availability">
                                    Availability: <span class="text-success">In Stock</span>
                                </div>
                                <div class="product-card__prices">
                                    $749.00
                                </div>
                                <div class="product-card__buttons">
                                    <button class="btn btn-primary product-card__addtocart" type="button">Add To Cart</button>
                                    <button class="btn btn-secondary product-card__addtocart product-card__addtocart--list" type="button">Add To Cart</button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                    </button>
                                    <button class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare" type="button">
                                        <svg width="16px" height="16px">
                                            <use xlink:href="images/sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                    </button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- .block-products-carousel / end -->

@endsection