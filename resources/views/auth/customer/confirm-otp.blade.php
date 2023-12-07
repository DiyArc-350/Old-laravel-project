@extends('auth.customer.template.index')

@section('content')


<div class="col-md-6 ">
  <div class="card flex-grow-1 mb-md-0">
      <div class="card-body">
        <h3 class="card-title">Verify Phone Number</h3>
        <p class="mb-4">Enter the OTP code sent to<strong clhass="ms-1"> +{{ old('customer_handphone1') }}</strong></p>
        <form action="{{ route('confirmation.otp') }}" method="POST">
          {{ csrf_field() }}
          <input type="text" name="customer_email" value="{{ old('customer_email') }}">
          <input type="hidden" name="password" value="{{ old('password') }}">
          <input type="hidden" name="customer_handphone1" value="{{ old('customer_handphone1') }}">
            <div class="input-group mb-3">
            <input class="form-control single-otp-input" name="otp_code[]" type="text" value="" placeholder="-" maxlength="1">
            <input class="form-control single-otp-input" name="otp_code[]" type="text" value="" placeholder="-" maxlength="1">
            <input class="form-control single-otp-input" name="otp_code[]" type="text" value="" placeholder="-" maxlength="1">
            <input class="form-control single-otp-input" name="otp_code[]" type="text" value="" placeholder="-" maxlength="1">
            <input class="form-control single-otp-input" name="otp_code[]" type="text" value="" placeholder="-" maxlength="1">
            </div>
            <button class="btn btn-primary w-100">Verify &amp; Proceed</button>
        </form>

      </div>
  </div>
</div>


{{-- <div class="text-center my-2">
    <h3 class="card-title">Verify Phone Number</h3>
    <p class="mb-4">Enter the OTP code sent to<strong clhass="ms-1">+{{ old('customer_handphone1') }}</strong></p>
</div>

<div class="otp-verify-form mt-4">
    <form action="{{ route('confirmation.otp') }}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="customer_email" value="{{ old('customer_email') }}">
      <input type="hidden" name="password" value="{{ old('password') }}">
      <input type="hidden" name="customer_handphone1" value="{{ old('customer_handphone1') }}">
        <div class="input-group mb-3">
        <input class="form-control single-otp-input" name="otp_code[]" type="text" value="" placeholder="-" maxlength="1">
        <input class="form-control single-otp-input" name="otp_code[]" type="text" value="" placeholder="-" maxlength="1">
        <input class="form-control single-otp-input" name="otp_code[]" type="text" value="" placeholder="-" maxlength="1">
        <input class="form-control single-otp-input" name="otp_code[]" type="text" value="" placeholder="-" maxlength="1">
        <input class="form-control single-otp-input" name="otp_code[]" type="text" value="" placeholder="-" maxlength="1">
        </div>
        <button class="btn btn-primary w-100">Verify &amp; Proceed</button>
    </form>
</div>
  <!-- Term & Privacy Info -->
<div class="login-meta-data text-center">
    <p class="mt-3 mb-0">Don't received the OTP?<span class="otp-sec ms-1" id="resendOTP"></span></p>
</div> --}}

@endsection