@extends('frontend.template.index')


@section('content')


<div class="block">
    <div class="container">
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Address</h5>
                    </div>
                    <div class="card-divider"></div>
                    <div class="card-body">
                        <div class="row no-gutters">
                            <div class="col-12">
                                <form method="post" action="{{ route('fe.save.address') }}">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="Input Address">Address Type</label>
                                    <select class="form-control form-control-select2" name="customer_address_type" data-control="select2" data-placeholder=" Pilih Type" data-allow-clear="true">
                                        <option selected>Select Address Type</option>
                                        <option value="rumah">Rumah</option>
                                        <option value="kantor">Kantor</option>
                                        <option value="gedung">Gedung</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="checkout-last-name">Address Name</label>
                                    <input type="text" name="customer_address_name" class="form-control" id="checkout-last-name" placeholder="Address Name">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-last-name">Address Phone</label>
                                    <input type="text" name="customer_address_phone" class="form-control" id="checkout-last-name" placeholder="Address Phone">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-last-name">Full Address</label>
                                    <input type="text" name="customer_address_address" class="form-control" id="checkout-last-name" placeholder="Full Address">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-last-name">City</label>
                                    <input type="text" name="customer_address_city" class="form-control" id="checkout-last-name" placeholder="City">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-last-name">Province</label>
                                    <input type="text" name="customer_address_province" class="form-control" id="checkout-last-name" placeholder="Province">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-last-name">Post Code</label>
                                    <input type="text" name="customer_address_postcode" class="form-control" id="checkout-last-name" placeholder="Post Code">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="checkout-company-name">Company Name <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="checkout-company-name" placeholder="Company Name">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-country">Country</label>
                                    <select id="checkout-country" class="form-control form-control-select2">
                                        <option>Select a country...</option>
                                        <option>United States</option>
                                        <option>Russia</option>
                                        <option>Italy</option>
                                        <option>France</option>
                                        <option>Ukraine</option>
                                        <option>Germany</option>
                                        <option>Australia</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="checkout-street-address">Street Address</label>
                                    <input type="text" class="form-control" id="checkout-street-address" placeholder="Street Address">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-address">Apartment, suite, unit etc. <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="checkout-address">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-city">Town / City</label>
                                    <input type="text" class="form-control" id="checkout-city">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-state">State / County</label>
                                    <input type="text" class="form-control" id="checkout-state">
                                </div>
                                <div class="form-group">
                                    <label for="checkout-postcode">Postcode / ZIP</label>
                                    <input type="text" class="form-control" id="checkout-postcode">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="checkout-email">Email address</label>
                                        <input type="email" class="form-control" id="checkout-email" placeholder="Email address">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="checkout-phone">Phone</label>
                                        <input type="text" class="form-control" id="checkout-phone" placeholder="Phone">
                                    </div>
                                </div> --}}
                                <div class="form-group mt-3 mb-0">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection