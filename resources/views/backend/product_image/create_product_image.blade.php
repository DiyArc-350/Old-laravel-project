@extends('backend.template.index')

@section('content')
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <h4 class="mb-sm-0 font-size-18">Add Product Image</h4>
    
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->



    <!--begin::Card body BEGIN CUSTOMER -->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <form method="post" action="{{ route('product.image.store') }}" enctype="multipart/form-data">

            {{ csrf_field() }}
            <!-- start page title -->
        {{-- <p class="card-title-desc">Masukkan <b><i>nomor</i></b>, <b><i>nama lengkap</b></i>, <b><i>role</b></i> customer yang tepat.</p> --}}
        <div class="col-md-12">
            <div class="mb-3">
            <!--begin::Label-->
            <label class="required form-label fs-6 mb-2">Product</label>
            <!--end::Label-->
            <!--begin::Select2-->
            <select class="form-select" name="product_code" data-control="select2" required data-placeholder=" Pilih Product " data-allow-clear="true">
                <option></option>
                @foreach ($product as $p)
                    <option value="{{ $p['product_code'] }}">{{ $p['product_name'].' - '.$p['product_code'] }}</option> 
                @endforeach  
            </select>
            <!--begin::Select2-->
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Product Photo Detail</label>
                <input class="form-control" accept="image/*" name="product_images[]" type="file" multiple="multiple" id="formFile">
            </div>
        </div>

        <div class="row mt-3 d-flex">
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

