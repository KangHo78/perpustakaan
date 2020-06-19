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

                        {{-- Nbi --}}
                        <input id="reg" type="text" class="form-control @error('reg') is-invalid @enderror" name="reg"
                            placeholder="Your NBI" data-inputmask="&quot;mask&quot;: &quot;9999999999&quot;"
                            value="{{ old('reg') }}" required autocomplete="reg">

                        @error('reg')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        {{-- Alamat --}}
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                            name="address" placeholder="Your address" value="{{ old('address') }}" required
                            autocomplete="address">

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        {{-- No --}}
                        <input id="tlp" type="text" class="form-control @error('tlp') is-invalid @enderror" name="tlp"
                            placeholder="Your telepon"
                            data-inputmask="&quot;mask&quot;: &quot;(+62) 999-9999-9999&quot;" value="{{ old('tlp') }}"
                            required autocomplete="tlp">

                        @error('tlp')
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