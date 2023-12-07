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
        {{-- <div class="page-header__title mt-3">
            <h1>Checkout Details</h1>
        </div> --}}
    </div>
</div>
<div class="checkout block">
    <div class="container">
        {{-- <div class="row mb-2">
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
        </div> --}}
        <form method="post" action="{{ route('fe.checkout') }}">
        <div class="row d-flex justify-content-center">
                {{ csrf_field() }}
            <div class="col-9">
                <div class="card mb-0">
                    <div class="card-body">
                        <h1>Checkout Details</h1>
                        <hr>
                        {{-- <h3 class="card-title">Your Order</h3> --}}
                        <table class="checkout__totals">
                            <thead class="checkout__totals-header">
                                <tr>
                                    <th>Product</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody class="checkout__totals-products">
                                @foreach ($cart as  $c )
                                    <input type="hidden" name="cart_id[]" value={{ $c->cart_id }}>
                                    <td>{{ $c->product_name. ' x ' . $c->cart_quantity }}</td>
                                    <td>Rp {{ $c->cart_price_subtotal }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tbody class="checkout__totals-subtotals ">
                                <tr>
                                    <td>
                                        <select class="form-control form-control-select2 text-left" name="customer_address_code" required data-control="select2" data-placeholder=" Select Address" data-allow-clear="true">
                                            @foreach ($address as $a )
                                            <option value="{{ $a->customer_address_code }}">{{ $a->customer_address_name. ' - '. $a->customer_address_address }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="font-weight-bold">Address</td>
                                </tr>
                            </tbody>
                            <tbody class="checkout__totals-subtotals ">
                                <tr>
                                    <th>Subtotal</th>
                                    <td>Rp {{ $total }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <?php $shipment = 8000; ?>
                                    <td>Rp {{ $shipment }}</td>
                                </tr>
                            </tbody>
                            <tfoot class="checkout__totals-footer">
                                <tr>
                                    <th>Total</th>
                                    <input type="hidden" name="orders_total_price" value="{{ $total + $shipment }}">
                                    <td>Rp {{ $total + $shipment }}</td>
                                </tr>
                            </tfoot>
                        </table>
                        {{-- <div class="payment-methods">
                            <ul class="payment-methods__list">
                                <li class="payment-methods__item payment-methods__item--active">
                                    <label class="payment-methods__item-header">
                                        <span class="payment-methods__item-radio input-radio">
                                            <span class="input-radio__body">
                                                <input class="input-radio__input" name="checkout_payment_method" type="radio" checked>
                                                <span class="input-radio__circle"></span>
                                            </span>
                                        </span>
                                        <span class="payment-methods__item-title">Direct bank transfer</span>
                                    </label>
                                    <div class="payment-methods__item-container">
                                        <div class="payment-methods__item-description text-muted">
                                            Make your payment directly into our bank account. Please use your Order ID as the payment
                                            reference. Your order will not be shipped until the funds have cleared in our account.
                                        </div>
                                    </div>
                                </li>
                                <li class="payment-methods__item">
                                    <label class="payment-methods__item-header">
                                        <span class="payment-methods__item-radio input-radio">
                                            <span class="input-radio__body">
                                                <input class="input-radio__input" name="checkout_payment_method" type="radio">
                                                <span class="input-radio__circle"></span>
                                            </span>
                                        </span>
                                        <span class="payment-methods__item-title">Check payments</span>
                                    </label>
                                    <div class="payment-methods__item-container">
                                        <div class="payment-methods__item-description text-muted">
                                            Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                        </div>
                                    </div>
                                </li>
                                <li class="payment-methods__item">
                                    <label class="payment-methods__item-header">
                                        <span class="payment-methods__item-radio input-radio">
                                            <span class="input-radio__body">
                                                <input class="input-radio__input" name="checkout_payment_method" type="radio">
                                                <span class="input-radio__circle"></span>
                                            </span>
                                        </span>
                                        <span class="payment-methods__item-title">Cash on delivery</span>
                                    </label>
                                    <div class="payment-methods__item-container">
                                        <div class="payment-methods__item-description text-muted">
                                            Pay with cash upon delivery.
                                        </div>
                                    </div>
                                </li>
                                <li class="payment-methods__item">
                                    <label class="payment-methods__item-header">
                                        <span class="payment-methods__item-radio input-radio">
                                            <span class="input-radio__body">
                                                <input class="input-radio__input" name="checkout_payment_method" type="radio">
                                                <span class="input-radio__circle"></span>
                                            </span>
                                        </span>
                                        <span class="payment-methods__item-title">PayPal</span>
                                    </label>
                                    <div class="payment-methods__item-container">
                                        <div class="payment-methods__item-description text-muted">
                                            Pay via PayPal; you can pay with your credit card if you don’t have a PayPal account.
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="checkout__agree form-group">
                            <div class="form-check">
                                <span class="form-check-input input-check">
                                    <span class="input-check__body">
                                        <input class="input-check__input" type="checkbox" id="checkout-terms">
                                        <span class="input-check__box"></span>
                                        <svg class="input-check__icon" width="9px" height="7px">
                                            <use xlink:href="images/sprite.svg#check-9x7"></use>
                                        </svg>
                                    </span>
                                </span>
                                <label class="form-check-label" for="checkout-terms">
                                    I have read and agree to the website <a target="_blank" href="terms-and-conditions.html">terms and conditions</a>*
                                </label>
                            </div>
                        </div> --}}
                        <button type="submit" class="btn btn-primary btn-xl btn-block">Place Order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>


@endsection