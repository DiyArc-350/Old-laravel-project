@extends('backend.template.index')

@section('content')

@if (session('msg'))
    <div class="alert alert-success">
        {{ session('msg') }}
    </div>
@endif

<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <h4 class="mb-sm-0 font-size-18">Change Password</h4>
    
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->



    <!--begin::Card body BEGIN CUSTOMER -->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <form method="post" action="{{ route('employee.password.update', auth()->guard('employee')->user()->employee_number) }}">

            {{ csrf_field() }}
            <!-- start page title -->
        {{-- <p class="card-title-desc">Masukkan <b><i>nomor</i></b>, <b><i>nama lengkap</b></i>, <b><i>role</b></i> customer yang tepat.</p> --}}
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">New Password</label>
                <input name="employee_passwd" type="password" class="form-control" id="formrow-inputCity" required value="" placeholder="New Password...">
            </div>
        </div>
        <div class="col-md-12">
            <div class="mb-3">
                <label for="formrow-inputCity" class="form-label">Confirm Password</label>
                <input name="confirm_passwd" type="password" class="form-control" id="formrow-inputCity" required value="" placeholder="Confirm Password...">
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