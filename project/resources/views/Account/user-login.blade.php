@extends('layouts.main')
@section('content')
    <div class="container-fluid padding-0">
        <div class="row">
            <div id="content" class="site-content">
                <!-- Breadcrumb -->



                <div class="container">
                    <div class="login-page" style="margin-bottom: 100px;">
                        <div class="login-form form">
                            <div class="block-title">
                                <h2 class="title"><span>Login</span></h2>
                            </div>

                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label>{{ __('E-Mail Address') }}</label>
                                    <input id="email" type="email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>{{ __('Password') }}</label>
                                    <input id="password" type="password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
