@extends('auth.customer.template.index')

@section('content')

<div class="col-md-6 ">
    <div class="card flex-grow-1 mb-md-0">
        <div class="card-body">
            <h3 class="card-title">Register</h3>
            <form action="{{ route('register.attempt') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name" class="">Fullname</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="fullname" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="customer_email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="">Password</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password-confirm" class="">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
                <button type="submit" class="btn btn-block btn-primary">
                    {{ __('Register') }}
                </button>
            </form>

            <br>

            <a href="{{ route('login') }}">Already have an account?</a>
        </div>
    </div>
</div>

@endsection