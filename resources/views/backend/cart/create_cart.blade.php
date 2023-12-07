@extends('backend.template.index')

@section('content')
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <h4 class="mb-sm-0 font-size-18">Add Cart</h4>
    
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->

    @if (session('msg'))
    <div class="card-body">
        <div class="px-4 alert alert-danger">
            {{ session('msg') }}
        </div>

    </div>
    @endif

    <!--begin::Card body BEGIN CUSTOMER -->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <form method="post" action="{{ route('cart.store') }}">

            {{ csrf_field() }}
            <!-- start page title -->
        {{-- <p class="card-title-desc">Masukkan <b><i>nomor</i></b>, <b><i>nama lengkap</b></i>, <b><i>role</b></i> customer yang tepat.</p> --}}
        
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                <!--begin::Label-->
                <label class="required form-label fs-6 mb-2">Customer</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select class="form-select" name="customer_number" data-control="select2" required data-placeholder=" Pilih Customer " data-allow-clear="true">
                    <option></option>
                    @foreach ($customer as $cus)
                        <option value="{{ $cus['customer_number'] }}" {{ (old('customer_number') == $cus['customer_number'])? 'selected' : ''; }}>{{ $cus['customer_fullname'].' - '.$cus['customer_number'] }}</option> 
                    @endforeach  
                </select>
                <!--begin::Select2-->
                </div>
            </div>
    
            <div class="col-md-6">
                <div class="mb-3">
                <!--begin::Label-->
                <label class="required form-label fs-6 mb-2">Product</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select class="form-select" name="product_code" data-control="select2" required data-placeholder=" Pilih Product " data-allow-clear="true">
                    <option></option>
                    @foreach ($product as $p)
                        <option value="{{ $p['product_code'] }}"  {{ (old('product_code') == $p['product_code'])? 'selected' : ''; }}>{{ $p['product_name'].' - Rp. '.$p['product_price_purchase'] }}</option> 
                    @endforeach  
                </select>
                <!--begin::Select2-->
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="formrow-inputCity" class="form-label">Quantity</label>
                    <input name="cart_quantity" type="number" class="form-control" min="1" id="formrow-inputCity" required value="{{ (old('cart_quantity'))? old('cart_quantity'): '1' }}" placeholder="quantity">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="formrow-inputCity" class="form-label">Notes</label>
                    <textarea name="cart_note" type="text" class="form-control" id="formrow-inputCity" rows="2" required placeholder="seller note">{{ (old('cart_note'))? old('cart_note'): '' }} </textarea>
                </div>
            </div>
        </div>
        

        <div class="row mt-3 d-flex">
            <div class="col-md-8">
            </div>
            <div class="col-md-4 text-right align-self-end d-flex justify-content-end">
                <button type="button" onclick="window.history.go(-1)" class="btn btn-secondary btn-md mx-2">
                    Kembali
                </button>
                <button type="submit" class="btn btn-primary btn-md">Save</button>
            </div>
        </div>
        </form>
    </div>                 
    <!--end::Card body-->
</div> 
@endsection
