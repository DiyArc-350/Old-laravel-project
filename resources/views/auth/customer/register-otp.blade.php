@extends('auth.customer.template.index')

@section('content')

<div class="col-md-6 ">
  <div class="card flex-grow-1 mb-md-0">
      <div class="card-body">
        <h3 class="card-title">Phone Verification</h3>
        <p>We will send you an OTP on this phone number.</p>
          <form action="{{ route('send.otp') }}" method="post">
            <input type="hidden" name="customer_email" value="{{ old('customer_email') }}">
            <input type="hidden" name="password" value="{{ old('password') }}">
              @csrf
              <div class="form-group">
                  <input class="form-control @error('customer_handphone1') is-invalid @enderror" type="text" name="customer_handphone1" value="{{ old('customer_handphone1') }}" placeholder="+62">

                  @error('customer_handphone1')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
              <button type="submit" class="btn btn-block btn-primary">
                  {{ __('Send Now') }}
              </button>
          </form>

      </div>
  </div>
</div>

@endsection