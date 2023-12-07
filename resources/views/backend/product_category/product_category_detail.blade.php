{{-- @extends('backend.template.index')

@section('content')
	<!--begin::Section-->
	<div class="row g-5 g-xl-8">
        <div class="col-8">
            <!--begin::Block-->
            <div class="py-5">
                <div class="card card-bordered">
                    <div class="card-body">
                        <!--begin::Form-->
                        <form action="{{ Route('product-category.store') }}" method="POST" class="form">
                        {{ csrf_field() }}
                            <!--begin::Options-->
                            <div class="row ">
                                <div class="col-lg-8"> 
                                    <div class="fv-row mb-10">
                                        <!--begin::Label-->
                                        <label class="required form-label fs-6 mb-2">Company</label>
                                        <!--end::Label-->
                                        <!--begin::Select2-->
                                        <select class="form-select" name="company_code" data-control="select2" required data-placeholder=" Pilih Company " data-allow-clear="true">
                                            <option></option>
                                            @foreach ($company as $com)
                                                <option value="{{ $com['company_code'] }}">{{ $com['company_name'].' ~ '.$com['company_code'] }}</option>
                                            @endforeach 
                                        </select>
                                        <!--begin::Select2-->
                                    </div>
                                    
                                    <div class="form-group mb-5">
                                        <label class="fw-bolder mb-3">Category Code</label>
                                        <input name="sekolah" id="sekolah" type="text" class="form-control" placeholder="Kategori" />
                                    </div> 
                                    <div class="form-group mb-5">
                                        <label class="fw-bolder mb-3">Category</label>
                                        <input name="sekolah" id="sekolah" type="text" class="form-control" placeholder="Kategori" />
                                    </div> 
                                    <div class="form-group mb-5">
                                        <label class="fw-bolder mb-3">Parent</label>
                                        <input name="sekolah" id="sekolah" type="text" class="form-control" placeholder="Parent" />
                                    </div> 
                                    <div class="form-group mb-5">
                                        <label class="fw-bolder mb-3">SORT</label>
                                        <input name="sekolah" id="sekolah" type="text" class="form-control" placeholder="Level" />
                                    </div> 
                                    <div class="form-group mb-5">
                                        <label class="fw-bolder mb-3">Information</label>
                                        <input name="sekolah" id="sekolah" type="text" class="form-control" placeholder="Informasi" />
                                    </div> 
                                </div>
                                    
                            </div>
                            <!--end::Options-->
                                
                            <!--end::Code Preview-->
                            <!--begin::Actions-->
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
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                </div>
            </div>
            <!--end::Block-->

        </div>
				
	</div> --}}

    @extends('backend.template.index')

    @section('content')
    <div class=" card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <h4 class="mb-sm-0 font-size-18">Update Category</h4>
        
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
    
    
    
        <!--begin::Card body BEGIN CUSTOMER -->
        <div class="card-body pt-0">
            <!--begin::Table-->
            <form method="post" action="{{ route('product-category.update', $row->product_category_id) }}">
    
                {{ csrf_field() }}
                <!-- start page title -->
            {{-- <p class="card-title-desc">Masukkan <b><i>nomor</i></b>, <b><i>nama lengkap</b></i>, <b><i>role</b></i> customer yang tepat.</p> --}}
            <div class="col-md-12">
                <div class="mb-3">
                     <!--begin::Label-->
                     <label class="required form-label fs-6 mb-2">Company</label>
                     <!--end::Label-->
                     <!--begin::Select2-->
                     <select class="form-select" name="company_code" data-control="select2" required data-placeholder=" Pilih Company " data-allow-clear="true">
                         <option></option>
                         @foreach ($company as $com)
                             <option value="{{ $com['company_code'] }}"  {{ ($com['company_code'] == $row->company_code)? 'selected': ''; }}>{{ $com['company_name'].' ~ '.$com['company_code'] }}</option>
                         @endforeach 
                     </select>
                     <!--begin::Select2-->
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="formrow-inputCity" class="form-label">Category</label>
                    <input name="product_category_name" type="text" class="form-control" id="formrow-inputCity" required value="{{ $row->product_category_name }}" placeholder=" Input Category ">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="formrow-inputCity" class="form-label">Parent</label>
                    <input name="product_category_parent" type="text" class="form-control" id="formrow-inputCity" required value="{{ $row->product_category_parent }}" placeholder=" Input Parent ">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="formrow-inputCity" class="form-label">Sort</label>
                    <input name="product_category_sort" type="text" class="form-control" id="formrow-inputCity" required value="{{ $row->product_category_sort }}" placeholder=" Input Sort">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="formrow-inputCity" class="form-label">Information</label>
                    <input name="product_category_info" type="text" class="form-control" id="formrow-inputCity" required value="{{ $row->product_category_info }}" placeholder="Input Information">
                </div>
            </div>
            <div class="row mt-5 d-flex">
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