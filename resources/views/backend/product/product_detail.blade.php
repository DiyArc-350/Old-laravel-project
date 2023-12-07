
@extends('backend.template.index')

@section('content')

<div class="card mb-5">

    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <h4 class="mb-sm-0 font-size-18">Detail Product</h4>
    
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->


    <div class="card-body pt-0">
        <!--begin::Table-->
        <form method="post" action="{{ route('product.thumbnail.update', $row->product_code) }}" enctype="multipart/form-data">

            {{ csrf_field() }}
            <!-- start page title -->
        {{-- <p class="card-title-desc">Masukkan <b><i>nomor</i></b>, <b><i>nama lengkap</b></i>, <b><i>role</b></i> customer yang tepat.</p> --}}
        <div class="row" >
            <div class="col-6 text-center">
                <img src="data:image/{{ $row->product_picture_fileext }};base64,{{ chunk_split(base64_encode($row->product_picture)) }}" class="img-fluid" style="width: 60%; height: auto;" alt="...">
            </div>
            <div class="col-6">
                
                <div class="col-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label"><span class="text-primary">New</span> Product Thumbnail</label>
                        <input class="form-control" accept="image/*" name="product_picture" type="file" id="formFile">
                    </div>
                </div>
        
                <div class="row mt-3 d-flex">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4 text-right align-self-end d-flex justify-content-end">
                        {{-- <button type="button" onclick="window.history.go(-1)" class="btn btn-secondary btn-md mx-2">
                            Kembali
                        </button> --}}
                        <button type="submit" class="btn btn-primary btn-md">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>                 

</div>

<div class=" card mb-5">
    

    <!--begin::Card body BEGIN CUSTOMER -->
    <div class="card-body">
        <!--begin::Table-->
            <!-- start page title -->
        {{-- <p class="card-title-desc">Masukkan <b><i>nomor</i></b>, <b><i>nama lengkap</b></i>, <b><i>role</b></i> customer yang tepat.</p> --}}

        <div class="row">
            <div class="col-6">
                <form action="{{ route('product.update', $row->product_code) }}" method="POST" enctype="multipart/form-data" >
                    @csrf
                <input type="hidden" name="product_category_code" value="{{ $row->product_code }}">
                <div class="col-md-12">
                    <div class="mb-3">
                        <!--begin::Label-->
                        <label class="required form-label fs-6 mb-2">Category</label>
                        <!--end::Label-->
                        <!--begin::Select2-->
                        <select class="form-select" name="product_category_code" data-control="select2" required data-placeholder=" Pilih Category " data-allow-clear="true">
                            <option></option>
                            @foreach ($ctg as $ctg)
                                <option value="{{ $ctg['product_category_code'] }}"  {{ ($ctg['product_category_code'] == $row->product_category_code)? 'selected': '' ;}}>{{ $ctg['product_category_name'] }}</option>
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
                            <option value="{{ $d['product_discount_code'] }}"  {{ ($d['product_discount_code'] == $row->discount_code)? 'selected': '' ;}}>{{ $d['product_discount_name'] }}</option> 
                        @endforeach  
                    </select>
                    <!--begin::Select2-->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Name</label>
                        <input name="product_name" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->product_name }}" placeholder="product name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Description</label>
                        <textarea name="product_info" type="text" class="form-control" id="formrow-inputCity" rows="4" required placeholder="product info"> {{ $row->product_info }} </textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Sort</label>
                        <input name="product_sort" type="text" class="form-control" id="formrow-inputCity" required value="{{ $row->product_sort }}" placeholder="product sort">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product SKU</label>
                        <input name="product_sku" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->product_sku }}" placeholder="product sku">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Price Sell</label>
                        <input name="product_price_sell" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->product_price_sell }}" placeholder="product price sell">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Price Purchase</label>
                        <input name="product_price_purchase" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->product_price_purchase }}" placeholder="product price purchase">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Stock</label>
                        <input name="product_stock" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->product_stock }}" placeholder="product stock">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Unit</label>
                        <input name="product_unit" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->product_unit }}" placeholder="product unit">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Product Weight</label>
                        <input name="product_heavy" type="text" class="form-control" id="formrow-inputCity" value="{{ $row->product_heavy }}" placeholder="product weight">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4 d-flex">
            <div class="col-md-8">
            </div>
            <div class="col-md-4 text-right align-self-end d-flex justify-content-end">
                <button type="button" onclick="window.history.go(-1)" class="btn btn-secondary btn-md mx-2">
                    Kembali
                </button>
                <button type="submit" class="btn btn-primary btn-md">Submit</button>
            </div>
        </form>
        </div>

       
            
        {{-- <div class="row ">
            <div class="col-6 card-body">
                <h4 class="card-title">Product Photos</h4>
                <p class="card-title-desc">
                    product photo for detail
                </p>
                <div class="dropzone">
                    <div class="fallback ">
                        <input name="product_image[]" type="file" id="formFile" multiple="multiple" />
                    </div>
                    <div class="dz-message needsclick">
                        <div class="mb-3">
                            <i class="display-4 text-muted bx bxs-cloud-upload"></i>
                        </div>
                        
                        <h4>Drop files here or click to upload.</h4>
                    </div>
                </div>
            </div> <!-- end col -->
            <div class="col-6 card-body">
                <input type="hidden" name="product_code" value="{{ $row->product_code }}">
                <label for="formrow-inputCity" class="form-label">Product Detail</label>
                @foreach ($info as $i)
                <input type="hidden" name="product_info_code[]" value="{{ $i->product_info_code }}">
                <div class="row">
                    <div class="col-6 mb-3">
                        <div class="mb-3">
                            <input name="product_info_name[]" type="text" class="form-control" id="formrow-inputCity" value="{{ $i->product_info_name }}"  readonly placeholder="product info name">
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="mb-3">
                            <input name="product_info_value[]" type="text" class="form-control" id="formrow-inputCity" value="{{ $i->product_info_value }}" placeholder="product info value">
                        </div>
                    </div>
                </div>
                @endforeach
                
        
                <div class="row mt-4">
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
        </div> <!-- end row --> --}}
    </div>                 
    <!--end::Card body-->

</div> 
{{-- 
<div class="card">
    
    <div class="card-body mt-3 pt-0">
        <div class="row">
            <div class="col-6">
                <div class="row ">
                    <div class="col">
                        <div class="card-img rounded text-center">
                            <img src="data:image/{{ $row->product_picture_filetype }};base64,{{ chunk_split(base64_encode($row->product_picture)) }}" class="card-img-top" style="width: 50%; height: auto;" alt="...">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="card-body">
                        @foreach ($img as $i )
                            <div class="row">
                                <div class="col-md-10">
                                    <img src="data:image/{{ $i->product_image_small_filetype }};base64,{{ chunk_split(base64_encode($i->product_image_small)) }}" class="img-fluid" style="width: 20%; height: auto;" alt="...">
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('product.delete.images', $i->product_image_id) }}" class="btn btn-md btn-danger">delate</a>
                                </div>
                            </div>
                            <hr class="m-0">
                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="card" style="">
                    
                    <div class="card-body">
                        <hr>
                        <form action="{{ route('product.store.photo.detail') }}" method="POST" enctype="multipart/form-data" >
                        <div class="row ">
                                {{ csrf_field() }}
                                <input type="hidden" name="product_code" value="{{ $row->product_code }}">
                                <div class="col-md-10">
                                    <label for="formrow-inputCity" class="form-label">Product Photo Detail</label>
                                <input class="form-control" accept="image/*" name="product_images[]" type="file" multiple="multiple" id="formFile">
                            </div>
                            <div class="col-md-2 text-right align-self-end d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary btn-md">Submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
                  </div>
            </div>
            <div class="col-6 ">
                
                
                <div class="row mt-4">
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
        </div>
    </div>
    
</div> --}}
@endsection