@extends('auth.customer.template.index')

@section('content')

<div class="col-md-6 ">
    <div class="card flex-grow-1 mb-md-0">
        <div class="card-body">
            <h3 class="card-title">Login</h3>
            <form action="{{ route('login.attempt') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="customer_email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary btn-block mt-4 ">Login</button>

                <br>

                <a href="{{ route('register') }}">Don't have an account?</a>
            </form>
        </div>
    </div>
</div>

@endsection