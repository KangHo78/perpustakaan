@extends('layouts_frontend._main')

@section('content')
<section class="contact-section">
    <div class="container-fluid">
        <div class="contact-warp">
            <div class="section-title mb-5">
                <h2>{{ __('Login') }}</h2>
            </div>
            <form method="POST" action="{{ route('login') }}" class="contact-from">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        {{-- Email --}}
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email"
                            placeholder="Your e-mail" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        {{-- Password --}}
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password" placeholder="Your Password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <button type="submit" class="site-btn mt-3">{{ __('Login') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection