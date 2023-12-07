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
        <form method="post" action="{{ route('customer.address.update', $row->customer_address_id) }}">

            {{ csrf_field() }}
            <!-- start page title -->
        {{-- <p class="card-title-desc">Masukkan <b><i>nomor</i></b>, <b><i>nama lengkap</b></i>, <b><i>role</b></i> customer yang tepat.</p> --}}
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Customer Number</label>
                <select class="form-select" name="customer_number" aria-label="Default select example"  data-control="select2" data-placeholder=" Pilih Customer " data-allow-clear="true">
                    <option selected>--select customer--</option>
                    @foreach ($customer as $c )
                        <option value="{{ $c['customer_number'] }}" {{ ($row->customer_number == $c['customer_number'])? 'selected' : ''; }}>{{ $c['customer_fullname']."-".$c['customer_number'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Address Type</label>
                <select class="form-select" name="customer_address_type" aria-label="Default select example"  data-control="select2" data-placeholder=" Pilih Customer " data-allow-clear="true">
                    <option selected>--select address type--</option>
                    <option value="rumah" {{ ('rumah' == $row->customer_address_type)? 'selected': ''; }}>Rumah</option>
                    <option value="kantor" {{ ('kantor' == $row->customer_address_type)? 'selected': ''; }}>Kantor</option>
                    <option value="gedung" {{ ('gedung' == $row->customer_address_type)? 'selected': ''; }}>Gedung</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Address Name</label>
                <input name="customer_address_name" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->customer_address_name }}" placeholder="address name">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Phone</label>
                <input name="customer_address_phone" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->customer_address_phone }}" placeholder="address phone">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Address</label>
                <input name="customer_address_address" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->customer_address_address }}" placeholder="full address">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">City</label>
                <input name="customer_address_city" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->customer_address_city }}" placeholder="city">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Province</label>
                <input name="customer_address_province" type="text" class="form-control" id="formrow-inputprovince" value="{{ $row->customer_address_province }}" placeholder="province">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Postcode</label>
                <input name="customer_address_postcode" type="number" class="form-control" id="formrow-inputpostcode" value="{{ $row->customer_address_postcode }}" placeholder="postcode">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
            </div>
            <div class="col-md-4 text-right align-self-end d-flex justify-content-end">
                <button type="button" onclick="window.history.go(-1)" class="btn btn-secondary btn-md mx-2">
                    Kembali
                </button>
                <button type="submit" class="btn btn-primary btn-md">Update</button>
            </div>
        </div>
        </form>
    </div>                 
    <!--end::Card body-->
</div> 
@endsection