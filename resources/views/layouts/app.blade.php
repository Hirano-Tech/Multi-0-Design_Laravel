<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
        <meta name='csrf-token' content='{{ csrf_token() }}' />

        <title>@yield('title')</title>
        <link rel='stylesheet' href="{{ asset('/css/app.css') }}" />
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body>
        <header class='container-fluid'>
            <div class='Header container-lg'>
                <h1><a href={{ route('root') }}>Multi-0-Design</a></h1>

                <div class='Header__Menu'>
                    @auth
                        <form action="{{ route('destroy_user_session') }}" name='SignOut_Form' method='POST'>
                            <input type='hidden' name='_method' value='DELETE' />
                            <input type='hidden' name='_token' value="{{ csrf_token() }}" />
                            <a href='javascript:document.SignOut_Form.submit()' class='Header__Menu--SignOut btn btn-outline-danger'>
                                <i class='fas fa-sign-out-alt'></i>ログアウト
                            </a>
                        </form>
                    @endauth

                    @guest
                        @if (!str_contains(url() -> current(), 'users/sign_in'))
                            <a href="{{ route('new_user_session') }}" class='Header__Menu--SignIn btn btn-outline-dark'>
                                <i class='fas fa-sign-in-alt'></i>ログイン
                            </a>
                        @else
                            <a href="{{ route('new_user_registration') }}" class='Header__Menu--SignIn btn btn-outline-dark'>
                                <i class='fas fa-user-plus'></i>新規登録
                            </a>
                        @endif
                    @endguest
                </div>

                <div class='Mobile__Menu'>
                    <button type='button' class='btn btn-light dropdown-toggle' id='dropdownMenuButton' data-toggle='dropdown'  >
                        <i class='fas fa-bars'></i>
                    </button>
                    <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                        <a href="{{ route('root') }}" class='dropdown-item'>
                            <i class='fas fa-home'></i>ホーム
                        </a>
                        <a href="{{ route('new_user_session') }}" class='dropdown-item'>
                            <i class='fas fa-sign-in-alt'></i>ログイン
                        </a>
                        <a href="{{ route('new_user_registration') }}" class='dropdown-item'>
                            <i class='fas fa-user-plus'></i>新規登録
                        </a>
                    </div>
                </div>
            </div>
        </header>

        <div class='container-lg'>
            <div class='row'>
                <section class='Side_Menu col-3'>
                    <h2 class='Title_Menu' data-en='Menu'>
                        <span><i class='fas fa-bars'></i>メニュー</span>
                    </h2>

                    <a href="{{ route('root') }}" class='Side_Menu__Home btn btn-outline-dark'>
                        <i class='fas fa-home'></i>ホーム
                    </a>

                    @guest
                        @unless (str_contains(url() -> current(), 'users/sign_in'))
                            <a href="{{ route('new_user_session') }}" class='Side_Menu__SignIn btn btn-outline-dark'>
                                <i class='fas fa-sign-in-alt'></i>ログイン
                            </a>
                        @endunless

                        @unless (str_contains(url() -> current(), 'users/sign_up'))
                            <a href="{{ route('new_user_registration') }}" class='Side_Menu__SignUp btn btn-outline-dark'>
                                <i class='fas fa-user-plus'></i>新規登録
                            </a>
                        @endunless
                    @endguest

                    @auth
                        <a href="{{ route('edit_user_registration', ['user' => Auth::id()]) }}" class='Side_Menu__Edit btn btn-outline-dark'>
                            <i class='fas fa-user-circle'></i>マイページ
                        </a>
                    @endauth

                    @if (str_contains(url() -> current(), 'users/sign_in'))
                        <h2 class='Title_Login' data-en='Login'>
                            <span><i class='fas fa-sign-in-alt'></i>ログイン</span>
                        </h2>

                        <form action="{{ route('user_session') }}" name='SignIn_Form' method='POST' enctype='application/x-www-form-urlencoded' accept-charset='UTF-8'>
                            @csrf
                            <div class='Side_Menu-Login form-group'>
                                <label for='email'><i class='fas fa-at'></i>メールアドレス</label>：
                                <input type='email' name='email' class='Side_Menu-Login--Input form-control' id='email' inputmode='email' autocomplete='email' required autofocus />
                            </div>

                            <div class='Side_Menu-Login form-group'>
                                <label for='password'><i class='fas fa-key'></i>パスワード</label>：
                                <input type='password' name='password' class='Side_Menu-Login--Input form-control' id='password' inputmode='text' autocomplete='off' required />
                            </div>

                            <div class='form-group'>
                                <input type='submit' value='ログイン' class='Side_Menu-Login--Submit form-control btn btn-outline-primary' />
                            </div>
                        </form>
                    @endif
                </section>

                @yield('content')
            </div>
        </div>
    </body>
</html>
