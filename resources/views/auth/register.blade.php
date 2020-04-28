@extends('layouts_frontend._main')

@section('content')
<section class="contact-section">
    <div class="container-fluid">
        <div class="contact-warp">
            <div class="section-title mb-5">
                <h2>{{ __('Register') }}</h2>
            </div>
            <form method="POST" action="{{ route('register') }}" class="contact-from">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        {{-- Name --}}
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" placeholder="Your name" value="{{ old('name') }}" required autocomplete="name"
                            autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        {{-- Email --}}
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" placeholder="Your e-mail" value="{{ old('email') }}" required
                            autocomplete="email">

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        {{-- Password --}}
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password" placeholder="Your Password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        {{-- Confirm Password --}}
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password" placeholder="Confirm Password">

                        <button type="submit" class="site-btn mt-3">{{ __('Register') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection