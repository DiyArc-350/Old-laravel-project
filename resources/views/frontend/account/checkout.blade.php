@extends('frontend.template.index')


@section('content')

{{-- @livewire('frontend.account.cart', ['custnum' => auth()->guard('customer')->user()->customer_number]) --}}

<div class="page-header">
    <div class="page-header__container container">
     
    </div>
</div>
<div class="checkout block">
    <div class="container">
        <div class="row d-flex justify-content-center">
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
                                    <td>{{ $c->product_name. ' x ' . $c->cart_quantity }}</td>
                                    <td>Rp {{ $c->cart_price_subtotal }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tbody class="checkout__totals-subtotals ">
                                <tr>
                                    <td class="font-weight-bold">Address</td>
                                    <td>
                                        {{ $a->customer_address_name. ' - '. $a->customer_address_address }}
                                    </td>
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
                       
                        {{-- <button type="submit" class="btn btn-primary btn-xl btn-block">Place Order</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection