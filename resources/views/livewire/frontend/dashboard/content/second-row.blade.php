 <!-- .block-products-carousel -->
 <div class="block block-products-carousel" data-layout="grid-5" data-mobile-grid-columns="2">
    <div class="container">
        <div class="block-header">
            <h3 class="block-header__title">Related Products</h3>
            <div class="block-header__divider"></div>
            <div class="block-header__arrows-list">
                <button class="block-header__arrow block-header__arrow--left" type="button">
                    <svg width="7px" height="11px">
                        <i class="fas fa-angle-double-left"></i>
                    </svg>
                </button>
                <button class="block-header__arrow block-header__arrow--right" type="button">
                    <svg width="7px" height="11px">
                        <i class="fas fa-angle-double-right"></i>
                    </svg>
                </button>
            </div>
        </div>
        <div class="block-products-carousel__slider">
            <div class="block-products-carousel__preloader"></div>
            <div class="owl-carousel">
                @foreach ($product as $p )
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
                                    <a href="product.html">{{ $p->product_name }}</a>
                                </div>
                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__prices">
                                    Rp {{ $p->product_price_purchase }}
                                </div>
                                {{-- <div class="product-card__buttons">
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
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<!-- .block-products-carousel / end -->
