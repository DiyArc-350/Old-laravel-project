@extends('backend.template.index')

@section('content')
<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <h4 class="mb-sm-0 font-size-18">Add Product Info</h4>
    
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->



    <!--begin::Card body BEGIN CUSTOMER -->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <form method="post" action="{{ route('product.info.store') }}">

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

        <div class="row">
            <div class="col-4 mb-3">
                <div class="mb-3">
                    <label for="formrow-inputCity" class="form-label">Info Name</label>
                    <input name="product_info_name[]" type="text" class="form-control form-control-md" id="formrow-inputCity" required value=""  placeholder=" input info name">
                </div> 
            </div>
            <div class="col-4 mb-3">
                <div class="mb-3">
                    <label for="formrow-inputCity" class="form-label">Info Value</label>
                    <input name="product_info_value[]" type="text" class="form-control form-control-md" id="formrow-inputCity" required value="" placeholder=" input info value">
                </div> 
            </div>
            <div class="col-3 mb-3">
                <div class="mb-3">
                    <label class="required form-label fs-6 mb-2">Status</label>
                    <select class="form-select" name="product_info_visible[]" required data-placeholder=" info status" data-allow-clear="true">
                        <option value="active">active</option>
                        <option value="disabled">disabled</option> 
                    </select>
                </div>
            </div>
        </div>

         <!-- jquery append -->
         <div class="paste-new-form"></div>
         <!-- end append -->

        <div class="row mt-3 d-flex">
            <div class="col-md-8">
                <a href="javascript:void(0)" class="btn btn-primary text-white btn-sm add-info"><h3 class="m-0"><b class="text-white">+</b></h3></a>
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

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
<script>
    $(document).ready(function () {

        $(document).on('click', '.hapus', function (){
            $(this).closest('.main-forms').remove();
    
        });

        $(document).on('click', '.add-info', function (){
            $('.paste-new-form').append('<div class="row main-forms">\
            <div class="col-4 mb-3">\
                <div class="mb-3">\
                    <input name="product_info_name[]" type="text" class="form-control form-control-md" id="formrow-inputCity" required value=""  placeholder=" input info name">\
                </div>\
            </div>\
            <div class="col-4 mb-3">\
                <div class="mb-3">\
                    <input name="product_info_value[]" type="text" class="form-control form-control-md" id="formrow-inputCity" required value="" placeholder=" input info value">\
                </div>\
            </div>\
            <div class="col-3 mb-3">\
                <div class="mb-3">\
                    <select class="form-select" name="product_info_visible[]" required data-placeholder=" info status"data-allow-clear="true">\
                        <option value="active">active</option>\
                        <option value="disabled">disabled</option> \
                    </select>\
                </div>\
            </div>\
            <div class="col   mb-3 align-self-end">\
                <div class="mb-3">\
                    <button type="button" class="hapus btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>\
                </div>\
            </div>\
        </div>\ ');
    
        });

    })
</script>
@endsection