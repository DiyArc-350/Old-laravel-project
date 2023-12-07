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
                    <form class="product__options my-3" wire:submit.prevent="addCart">
                        <div class="form-group product__option">
                            <label class="product__option-label" for="product-quantity">Quantity</label>
                            <div class="product__actions">
                                <div class="product__actions-item">
                                    <div class="input-number product__quantity">
                                        <input id="product-quantity" class="input-number__input form-control form-control-lg" wire:model="cart_quantity" type="number" min="1" value="1">
                                        <div class="input-number__add"></div>
                                        <div class="input-number__sub"></div>
                                    </div>
                                </div>
                                <div class="product__actions-item product__actions-item--addtocart">
                                    <button type="submit" class="btn btn-primary btn-lg">Add to cart</button>
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
                        <!-- <div class="spec__section">
                            <h4 class="spec__section-title">Dimensions</h4>
                            <div class="spec__row">
                                <div class="spec__name">Length</div>
                                <div class="spec__value">99 mm</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Width</div>
                                <div class="spec__value">207 mm</div>
                            </div>
                            <div class="spec__row">
                                <div class="spec__name">Height</div>
                                <div class="spec__value">208 mm</div>
                            </div>
                        </div> -->
                        <div class="spec__disclaimer">
                            Information on technical characteristics, the delivery set, the country of manufacture and the appearance
                            of the goods is for reference only and is based on the latest information available at the time of publication.
                        </div>
                    </div>
                </div>
                <!-- <div class="product-tabs__pane" id="tab-reviews">
                    <div class="reviews-view">
                        <div class="reviews-view__list">
                            <h3 class="reviews-view__header">Customer Reviews</h3>
                            <div class="reviews-list">
                                <ol class="reviews-list__content">
                                    <li class="reviews-list__item">
                                        <div class="review">
                                            <div class="review__avatar"><img src="images/avatars/avatar-1.jpg" alt=""></div>
                                            <div class="review__content">
                                                <div class="review__author">Samantha Smith</div>
                                                <div class="review__rating">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review__text">Phasellus id mattis nulla. Mauris velit nisi, imperdiet vitae sodales in, maximus ut lectus. Vivamus commodo scelerisque lacus, at porttitor dui iaculis id. Curabitur imperdiet ultrices fermentum.</div>
                                                <div class="review__date">27 May, 2018</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="reviews-list__item">
                                        <div class="review">
                                            <div class="review__avatar"><img src="images/avatars/avatar-2.jpg" alt=""></div>
                                            <div class="review__content">
                                                <div class="review__author">Adam Taylor</div>
                                                <div class="review__rating">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star " width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge ">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review__text">Aenean non lorem nisl. Duis tempor sollicitudin orci, eget tincidunt ex semper sit amet. Nullam neque justo, sodales congue feugiat ac, facilisis a augue. Donec tempor sapien et fringilla facilisis. Nam maximus consectetur diam. Nulla ut ex mollis, volutpat tellus vitae, accumsan ligula.</div>
                                                <div class="review__date">12 April, 2018</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="reviews-list__item">
                                        <div class="review">
                                            <div class="review__avatar"><img src="images/avatars/avatar-3.jpg" alt=""></div>
                                            <div class="review__content">
                                                <div class="review__author">Helena Garcia</div>
                                                <div class="review__rating">
                                                    <div class="rating">
                                                        <div class="rating__body">
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                            <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                                <g class="rating__fill">
                                                                    <use xlink:href="images/sprite.svg#star-normal"></use>
                                                                </g>
                                                                <g class="rating__stroke">
                                                                    <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                                </g>
                                                            </svg>
                                                            <div class="rating__star rating__star--only-edge rating__star--active">
                                                                <div class="rating__fill">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                                <div class="rating__stroke">
                                                                    <div class="fake-svg-icon"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review__text">Duis ac lectus scelerisque quam blandit egestas. Pellentesque hendrerit eros laoreet suscipit ultrices.</div>
                                                <div class="review__date">2 January, 2018</div>
                                            </div>
                                        </div>
                                    </li>
                                </ol>
                                <div class="reviews-list__pagination">
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item disabled">
                                            <a class="page-link page-link--with-arrow" href="" aria-label="Previous">
                                                <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true" width="8px" height="13px">
                                                    <use xlink:href="images/sprite.svg#arrow-rounded-left-8x13"></use>
                                                </svg>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="">1</a></li>
                                        <li class="page-item active"><a class="page-link" href="">2 <span class="sr-only">(current)</span></a></li>
                                        <li class="page-item"><a class="page-link" href="">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link page-link--with-arrow" href="" aria-label="Next">
                                                <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true" width="8px" height="13px">
                                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-8x13"></use>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <form class="reviews-view__form">
                            <h3 class="reviews-view__header">Write A Review</h3>
                            <div class="row">
                                <div class="col-12 col-lg-9 col-xl-8">
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="review-stars">Review Stars</label>
                                            <select id="review-stars" class="form-control">
                                                <option>5 Stars Rating</option>
                                                <option>4 Stars Rating</option>
                                                <option>3 Stars Rating</option>
                                                <option>2 Stars Rating</option>
                                                <option>1 Stars Rating</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="review-author">Your Name</label>
                                            <input type="text" class="form-control" id="review-author" placeholder="Your Name">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="review-email">Email Address</label>
                                            <input type="text" class="form-control" id="review-email" placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="review-text">Your Review</label>
                                        <textarea class="form-control" id="review-text" rows="6"></textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary btn-lg">Post Your Review</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
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
                                <div class="product-card__rating">
                                    <div class="product-card__rating-stars">
                                        <div class="rating">
                                            <div class="rating__body">
                                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                                <svg class="rating__star rating__star--active" width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge rating__star--active">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                                <svg class="rating__star " width="13px" height="12px">
                                                    <g class="rating__fill">
                                                        <use xlink:href="images/sprite.svg#star-normal"></use>
                                                    </g>
                                                    <g class="rating__stroke">
                                                        <use xlink:href="images/sprite.svg#star-normal-stroke"></use>
                                                    </g>
                                                </svg>
                                                <div class="rating__star rating__star--only-edge ">
                                                    <div class="rating__fill">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                    <div class="rating__stroke">
                                                        <div class="fake-svg-icon"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">9 Reviews</div>
                                </div>
                                <ul class="product-card__features-list">
                                    <li>Speed: 750 RPM</li>
                                    <li>Power Source: Cordless-Electric</li>
                                    <li>Battery Cell Type: Lithium</li>
                                    <li>Voltage: 20 Volts</li>
                                    <li>Battery Capacity: 2 Ah</li>
                                </ul>
                            </div>
                            <div class="product-card__actions">
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