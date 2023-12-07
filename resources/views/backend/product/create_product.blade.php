
@extends('backend.template.index')

@section('content')
<div class=" card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <h4 class="mb-sm-0 font-size-18">Add Product</h4>
    
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->



    <!--begin::Card body BEGIN CUSTOMER -->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">

            {{ csrf_field() }}
            <!-- start page title -->
        {{-- <p class="card-title-desc">Masukkan <b><i>nomor</i></b>, <b><i>nama lengkap</b></i>, <b><i>role</b></i> customer yang tepat.</p> --}}
        <div class="row">
            <div class="col-6">
                <input type="hidden" name="product_code" value="{{ "PRD-".date("y").substr(time(),-6) }}">
                
                <div class="col-md-12">
                    <div class="mb-3">
                        <!--begin::Label-->
                        <label class="required form-label fs-6 mb-2">Category</label>
                        <!--end::Label-->
                        <!--begin::Select2-->
                        <select class="form-select" name="product_category_code" data-control="select2" required data-placeholder=" Pilih Category " data-allow-clear="true">
                            <option></option>
                            @foreach ($ctg as $ctg)
                                <option value="{{ $ctg['product_category_code'] }}">{{ $ctg['product_category_name'] }}</option>
                            @endforeach 
                        </select>
                        <!--begin::Select2-->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <!--begin::Label-->
                    <label class="required form-label fs-6 mb-2">Discount</label>
                    <!--end::Label-->
                    <!--begin::Select2-->
                    <select class="form-select" name="discount_code" data-control="select2" data-placeholder=" Pilih Discount " data-allow-clear="true">
                        <option></option>
                        @foreach ($discount as $d)
                            <option value="{{ $d['product_discount_code'] }}">{{ $d['product_discount_name'] }}</option> 
                        @endforeach  
                    </select>
                 <!--begin::Select2-->
                        
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Name</label>
                        <input name="product_name" type="text" class="form-control" id="formrow-inputCity" required value="" placeholder="product name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Description</label>
                        <textarea name="product_info" type="text" class="form-control" id="formrow-inputCity" rows="3" required placeholder="product info"> </textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Sort</label>
                        <input name="product_sort" type="text" class="form-control" id="formrow-inputCity" required value="" placeholder="product sort">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product SKU</label>
                        <input name="product_sku" type="text" class="form-control" id="formrow-inputCity" required value="" placeholder="product sku">
                    </div>
                </div>
                
            </div>
            <div class="col-6">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Price Sell</label>
                        <input name="product_price_sell" type="text" class="form-control" id="formrow-inputCity" required value="" placeholder="product price sell">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Price Purchase</label>
                        <input name="product_price_purchase" type="text" class="form-control" id="formrow-inputCity" required value="" placeholder="product price purchase">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Stock</label>
                        <input name="product_stock" type="text" class="form-control" id="formrow-inputCity" required value="" placeholder="product stock">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Unit</label>
                        <input name="product_unit" type="text" class="form-control" id="formrow-inputCity" required value="" placeholder="product unit">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Weight</label>
                        <input name="product_heavy" type="text" class="form-control" id="formrow-inputCity" required value="" placeholder="product weight">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Photo Thumbnail</label>
                        <input class="form-control" name="product_picture" accept="image/*"
                        multiple="multiple" type="file" id="formFile">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
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