@extends('backend.template.index')

@section('content')

<div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <h4 class="mb-sm-0 font-size-18">Add Customer</h4>
    
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->



    <!--begin::Card body BEGIN CUSTOMER -->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <form method="post" action="{{ route('customer.store') }}">

            {{ csrf_field() }}
        <div class="row">
            <div class="col-6">

                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Role</label>
                        <select class="form-select" name="role_code" aria-label="Default select example">
                            <option selected>--select role code--</option>
                            @foreach ($role as $r )
                                <option value="{{ $r['role_code'] }}">{{ $r['role_code'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Customer Type</label>
                        <select class="form-select" name="customer_type" aria-label="Default select example">
                            <option selected>--select customer type--</option>
                            <option value="family">Family</option>
                            <option value="office">Office</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Name</label>
                        <input name="customer_name" type="text" class="form-control" id="formrow-inputCity" value="" placeholder="input name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Gender</label>
                        <select class="form-select" name="customer_gender" aria-label="Default select example">
                            <option selected>--select gender--</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Birthday</label>
                        <input name="customer_birthday" type="date" class="form-control" id="formrow-inputCity" value="" placeholder="">
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Email</label>
                        <input name="customer_email" type="text" class="form-control" id="formrow-inputCity" value="" placeholder="input email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">PIN</label>
                        <input name="customer_pin" type="text" class="form-control" id="formrow-inputCity" value="" placeholder="input pin">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Username</label>
                        <input name="customer_username" type="text" class="form-control" id="formrow-inputCity" value="" placeholder="input username">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Password</label>
                        <input name="customer_passwd" type="password" class="form-control" id="formrow-inputCity" value="" placeholder="input password">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="formrow-inputCity" class="form-label">Handphone</label>
                        <input name="customer_handphone1" type="text" class="form-control" id="formrow-inputCity" value="" placeholder="input phone number">
                    </div>
                </div>
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