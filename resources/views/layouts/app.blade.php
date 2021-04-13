<!doctype html>
<html lang='ja'>
    <head>
        <meta charset='utf-8' />
        <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no' />
        <meta name='csrf-token' content='{{ csrf_token() }}' />

        <title>@yield('title')</title>
        <link rel='stylesheet' href="{{ asset('/css/app.css') }}" />
        <link rel='stylesheet' href="{{ asset('/css/header.css') }}" />
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body>
        <header class='container-fluid'>
            <div class='Header container-lg'>
                <h1><a href={{ route('root') }}>Multi-0-Design</a></h1>

                <div class='Header__Menu'>
                    <a href="{{ route('root') }}" class='Header__Menu--Top btn btn-outline-dark'>
                        <i class='fas fa-home'></i><br />ホーム
                    </a>

                    @auth
                        <form action="{{ route('destroy_user_session') }}" name='SignOut_Form' method='POST'>
                            <input type='hidden' name='_method' value='DELETE' />
                            <input type='hidden' name='_token' value="{{ csrf_token() }}" />
                            <a href="javascript:document.SignOut_Form.submit()" class='Header__Menu--SignOut btn btn-outline-dark'>
                                <i class='fas fa-sign-out-alt'></i><br />ログアウト
                            </a>
                        </form>
                    @endauth

                    @guest
                        <a href="{{ route('new_user_session') }}" class='Header__Menu--SignIn btn btn-outline-dark'>
                            <i class='fas fa-sign-in-alt'></i><br />ログイン
                        </a>
                        <a href="{{ route('new_user_registration') }}" class='Header__Menu--SignUp btn btn-outline-dark'>
                            <i class='fas fa-user-plus'></i><br />新規登録
                        </a>
                    @endguest
                </div>
            </div>
        </header>

        @yield('content')

        <footer class='Footer container-fluid'>
            <a href="{{ route('root') }}" class='Footer--Top btn btn-outline-dark'>
                <i class='fas fa-home'></i><br />ホーム
            </a>
            <a href="{{ route('new_user_session') }}" class='Footer--SignIn btn btn-outline-dark'>
                <i class="fas fa-sign-in-alt"></i><br />ログイン
            </a>
            <a href="{{ route('new_user_registration') }}" class='Footer--SignUp btn btn-outline-dark'>
                <i class='fas fa-user-plus'></i><br />新規登録
            </a>
        </footer>
    </body>
</html>
