@extends('backend.template.index')

@section('content')
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <h4 class="mb-sm-0 font-size-18">Add Discount</h4>
    
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->



    <!--begin::Card body BEGIN CUSTOMER -->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <form method="post" action="{{ route('discount.store') }}">

            {{ csrf_field() }}
            <!-- start page title -->
        {{-- <p class="card-title-desc">Masukkan <b><i>nomor</i></b>, <b><i>nama lengkap</b></i>, <b><i>role</b></i> customer yang tepat.</p> --}}
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Discount Name</label>
                <input name="discount_name" type="text" class="form-control" id="formrow-inputCity" required value="" placeholder="Discount Name">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Start Date</label>
                <input name="discount_startdate" type="date" class="form-control" id="formrow-inputCity" required value="" placeholder="">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">End Date</label>
                <input name="discount_enddate" type="date" class="form-control" id="formrow-inputCity" required value="" placeholder="">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Discount Info</label>
                <input name="discount_info" type="text" class="form-control" id="formrow-inputCity" required value="" placeholder="Discount Info">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Discount Percent</label>
                <input name="discount_percent" type="number" class="form-control" id="formrow-inputCity" required value="" placeholder="discount percent">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <!--begin::Label-->
                <label class="required form-label fs-6 mb-2">Set Status</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select class="form-select" name="discount_active" data-control="select2" required data-placeholder=" discount status" data-allow-clear="true">
                    <option></option>
                    <option value="active">active</option>
                    <option value="disabled">disabled</option> 
                </select>
                <!--begin::Select2-->
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-8">
            </div>
            <div class="col-md-4 text-right align-self-end d-flex justify-content-end">
                <button type="button" onclick="window.history.go(-1)" class="btn btn-secondary btn-md mx-2">
                    Kembali
                </button>
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </div>
        </div>
        </form>
    </div>                 
    <!--end::Card body-->
</div> 
@endsection