@extends('backend.template.index')

@section('content')

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="card-body">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold">
                    DETAIL TRANSAKSI
                </h6>
            </div>
            <form action="{{ Route('orders.detail.update', $orders->orders_code) }}" method="POST">
                {{ csrf_field() }}
                <div class="card-body">
                    <table class="table table-sm table-striped">
                        <thead>
                            <tr>
                                <td class="border-1" width="30%">Kode Invoice</td>
                                <td>&nbsp<?= $orders['orders_invoice']; ?></td>
                            </tr>
                            <tr>
                                <td class="border-1" width="30%">Nama</td>
                                <td>&nbsp<?= $orders['customer_fullname']; ?></td>
                            </tr>
                            <tr>
                                <td class="border-1" width="30%">Status Pembayaran</td>
                                <td>
                                    <select class="form-control form-control-sm" id="orders_payment_status" name="orders_payment_status">

                                        @if ($orders['orders_payment_status']=== 'unpaid')
                                        <option {{ ($orders->orders_payment_status == "unpaid")? 'selected': ''; }} value="unpaid">Unpaid</option>
                                        @endif
                                        <option {{ ($orders->orders_payment_status == "paid")? 'selected': ''; }} value="paid">Paid</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="border-1" width="30%">Status Order</td>
                                <td>
                                    <select class="form-control form-control-sm" id="orders_status" name="orders_status">
                                        <option {{ ($orders->orders_status == "paid")? 'selected' : ''; }} value="paid">Paid</option>
                                        <option {{ ($orders->orders_status == "prepaid")? 'selected' : ''; }} value="prepaid">Prepaid</option>
                                        <option {{ ($orders->orders_status == "diantar")? 'selected' : ''; }} value="diantar">Diantar</option>
                                        <option {{ ($orders->orders_status == "diterima")? 'selected' : ''; }} value="diterima">Diterima</option>
                                    </select>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <div class="card-body">
                        <table class="table table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                @foreach ($cart as $c)
                                <tr>
                                    <th scope="row" style="text-align: center;"><?= $i++; ?></th>
                                    <td><?= $c['product_name']; ?></td>
                                    <td><?= $c['cart_quantity']; ?></td>
                                    <td><?= $c['product_price_purchase']; ?></td>
                                    <td>Rp.<?= $c['cart_price_subtotal']; ?></td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tbody>
                                <tr>
                                    <td colspan='4' class='border-1'>
                                        <center><strong>TOTAL SHIPMENT</strong></center>
                                    </td>
                                    <td></td>
                                    <td>Rp. 8000</td>
                                </tr>
                                <tr>
                                    <td colspan='4' class='border-1'>
                                        <center><strong>TOTAL PESANAN</strong></center>
                                    </td>
                                    <td></td>
                                    <td>Rp.{{ $orders['orders_total_price'] }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-15">
                            <button type="submit" class="btn btn-primary">Update Order</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection