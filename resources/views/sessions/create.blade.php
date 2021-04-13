@extends('layouts.app')
@section('title', '既存ユーザー ログインページ | Multi-0-Design')

@section('content')
<section class='Sign-Up container-lg'>
    <form action="{{ route('user_session') }}" method='POST' enctype='application/x-www-form-urlencoded' accept-charset='UTF-8'>
        @csrf
        <div class='form-group'>
            <p class=''>
                <span class='badge badge-danger'>必須</span>
                <label for='email'>メールアドレス</label>：
            </p>
            <input type='email' name='email' class='form-control' id='email' inputmode='email' autocomplete='email' required autofocus />
        </div>

        <div class='form-group'>
            <p class=''>
                <span class='badge badge-danger'>必須</span>
                <label for='password'>パスワード</label>：
            </p>
            <input type='password' name='password' class='form-control' id='password' inputmode='text' autocomplete='off' required />
        </div>

        <div class='form-group'>
            <input type='submit' value='ログインする' class='form-control btn btn-primary' />
        </div>
    </form>
</section>






<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action='#'>
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
