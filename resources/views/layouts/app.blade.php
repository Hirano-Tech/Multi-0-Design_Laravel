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
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')
    </body>
</html>
