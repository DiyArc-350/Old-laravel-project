@extends('frontend.template.index')


@section('content')

{{-- @livewire('frontend.account.cart', ['custnum' => auth()->guard('customer')->user()->customer_number]) --}}


<div class="page-header">
    <div class="page-header__container container">
        {{-- <div class="page-header__breadcrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="">Breadcrumb</a>
                        <svg class="breadcrumb-arrow" width="6px" height="9px">
                            <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                        </svg>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                </ol>
            </nav>
        </div> --}}
        <div class="page-header__title mt-3">
            <h1>Shopping Cart</h1>
        </div>
    </div>
</div>
<div class="cart block">
    <div class="container">
        <div class="row mb-2">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0 px-2 py-2">
                        <div class="row">
                            <div class="col-9 text-right">
                                <h4 class="m-0 text-primary">Total :  </h4>
                            </div>
                            <div class="col-3 text-center">
                                <h5 class="m-0">Rp {{ $total }}</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <table class="cart__table cart-table">
            <thead class="cart-table__head">
                <tr class="cart-table__row">
                    <th class="cart-table__column cart-table__column--image"></th>
                    <th class="cart-table__column cart-table__column--product">Product</th>
                    <th class="cart-table__column cart-table__column--price">Price</th>
                    <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                    <th class="cart-table__column cart-table__column--total">Subtotal</th>
                    <th class="cart-table__column cart-table__column--remove"></th>
                </tr>
            </thead>
            @foreach($cart as $c)
            <form method="post" action="{{ route('fe.update.cart') }}">
                {{ csrf_field() }}
                <input type="hidden" name="cart_id[]" value="{{ $c->cart_id }}">
                <input type="hidden" name="cart_price_item[]" value="{{ $c->cart_price_item }}">
            <tbody class="cart-table__body">
                <tr class="cart-table__row">
                    <td class="cart-table__column cart-table__column--image">
                        <div class="product-image">
                            <a href="" class="product-image__body">
                                <img class="product-image__img" src="data:image/{{ $c->product_icon }};base64,{{ chunk_split(base64_encode($c->product_icon)) }}" alt="">
                            </a>
                        </div>
                    </td>
                    <td class="cart-table__column cart-table__column--product">
                        <a href="" class="cart-table__product-name">{{ $c->product_name }}</a>
                    </td>
                    <td class="cart-table__column cart-table__column--price" data-title="Price">Rp {{ $c->product_price_purchase }}</td>
                    <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                        <div class="input-number">
                            <input class="form-control input-number__input" name="cart_quantity[]" type="number" min="1" value="{{ $c->cart_quantity }}">
                            <div class="input-number__add"></div>
                            <div class="input-number__sub"></div>
                        </div>
                    </td>
                    <td class="cart-table__column cart-table__column--total" data-title="Total">Rp {{ $c->cart_price_subtotal }}</td>
                    <td class="cart-table__column cart-table__column--remove">
                        <a href="{{ Route('fe.cart.delete', $c->cart_id) }}" class="btn btn-light btn-sm btn-svg-icon">
                            <svg width="12px" height="12px">
                                <use xlink:href="/frontend/images/sprite.svg#cross-12"></use>
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="cart__actions">
            <div class="cart__coupon-form">
                <a href="{{ route('fe.dashboard') }}" class="btn btn-light">Continue Shopping</a>

                {{-- <label for="input-coupon-code" class="sr-only">Password</label>
                <input type="text" class="div-control" id="input-coupon-code" placeholder="Coupon Code">
                <button type="submit" class="btn btn-primary">Apply Coupon</button> --}}
            </div>
            <div class="cart__buttons">
                <button type="submit" class="btn btn-secondary cart__update-button">Update Cart</button>
                {{-- @dd()
                @dd(empty($cart)) --}}
                @if (!empty($total))
                <a href="{{ route('fe.pre.checkout') }}" class="btn btn-primary cart__update-button" id="conf-btn" data-title="Proceed to Checkout" data-text="make sure to update the cart before proceeding" data-icon="warning">Checkout</a>
                @endif

            </div>
        </div>
        </form>

     
    </div>
</div>

@endsection