@extends('backend.template.index')

@section('content')
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <h4 class="mb-sm-0 font-size-18">Add Customer Address</h4>
    
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->



    <!--begin::Card body BEGIN CUSTOMER -->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <form method="post" action="{{ route('customer.address.store') }}">

            {{ csrf_field() }}
            <!-- start page title -->
        {{-- <p class="card-title-desc">Masukkan <b><i>nomor</i></b>, <b><i>nama lengkap</b></i>, <b><i>role</b></i> customer yang tepat.</p> --}}
        @if (!empty($custnum))
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Customer Number</label>
                <input name="customer_number" type="text" class="form-control" id="formrow-inputCity" value="{{ $custnum }}" readonly>
            </div>
        </div>
        @else
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Customer Number</label>
                <select class="form-select" name="customer_number" data-control="select2" data-placeholder=" Pilih Customer " data-allow-clear="true">
                    <option selected>--select customer--</option>
                    @foreach ($customer as $c )
                        <option value="{{ $c['customer_number'] }}">{{ $c['customer_fullname']."-".$c['customer_number'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
            
        @endif
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Address Type</label>
                <select class="form-select" name="customer_address_type" data-control="select2" data-placeholder=" Pilih Type " data-allow-clear="true">
                    <option selected>--select address type--</option>
                    <option value="rumah">Rumah</option>
                    <option value="kantor">Kantor</option>
                    <option value="gedung">Gedung</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Address Name</label>
                <input name="customer_address_name" type="text" class="form-control" id="formrow-inputCity" value="" placeholder="address name">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Phone</label>
                <input name="customer_address_phone" type="text" class="form-control" id="formrow-inputCity" value="" placeholder="address phone">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Address</label>
                <input name="customer_address_address" type="text" class="form-control" id="formrow-inputCity" value="" placeholder="full address">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">City</label>
                <input name="customer_address_city" type="text" class="form-control" id="formrow-inputCity" value="" placeholder="city">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Province</label>
                <input name="customer_address_province" type="text" class="form-control" id="formrow-inputprovince" value="" placeholder="province">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Postcode</label>
                <input name="customer_address_postcode" type="number" class="form-control" id="formrow-inputpostcode" value="" placeholder="postcode">
            </div>
        </div>
        <div class="row mt-3">
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