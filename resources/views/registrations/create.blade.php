@extends('layouts.app')
@section('title', 'ユーザー情報 新規登録ページ | Multi-0-Design')

@section('content')
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
                    <a href="{{ route('new_user_session') }}" class='Side_Menu__SignIn btn btn-outline-dark'>
                        <i class='fas fa-sign-in-alt'></i>ログイン
                    </a>

                    <a href="{{ route('new_user_registration') }}" class='Side_Menu__SignUp btn btn-outline-dark'>
                        <i class='fas fa-user-plus'></i>新規登録
                    </a>
                @endguest
            </section>

            <section class='Sign-Up col-7'>
                <h2 class='Title_Menu' data-en='RESIST'>
                    <span><i class='fas fa-user-plus'></i>ユーザー情報 新規登録フォーム</span>
                </h2>

                <form action="{{ route('user_registration') }}" method='POST' enctype='application/x-www-form-urlencoded' accept-charset='UTF-8'>
                    @csrf
                    <div class='Sign-Up__Name form-group'>
                        <p class='Sign-Up__Name--Label'>
                            <span class='badge badge-secondary'>任意</span>
                            <label for='name'>名前</label>：
                        </p>
                        <input type='text' name='name' class='form-control' id='name' inputmode='text' autocomplete='name' />
                    </div>

                    <div class='Sign-Up__Mail form-group'>
                        <p class='Sign-Up__Mail--Label'>
                            <span class='badge badge-danger'>必須</span>
                            <label for='email'>メールアドレス</label>：
                        </p>
                        <input type='email' name='email' class='form-control' id='email' inputmode='email' autocomplete='email' required autofocus />
                    </div>

                    <div class='Sign-Up__Password form-group'>
                        <p class='Sign-Up__Password--Label'>
                            <span class='badge badge-danger'>必須</span>
                            <label for='password'>パスワード</label>：
                        </p>
                        <input type='password' name='password' class='form-control' id='password' inputmode='text' autocomplete='off' required />
                    </div>

                    <div class='Sign-Up__Password-Confirm form-group'>
                        <p class='Sign-Up__Password-Confirm--Label'>
                            <span class='badge badge-danger'>必須</span>
                            <label for='password-confirm'>パスワード<span>（確認用）</span></label>：
                        </p>
                        <input type='password' name='password_confirm' class='form-control' id='password-confirm' inputmode='text' autocomplete='off' required />
                    </div>

                    <div class='form-group'>
                        <input type='submit' value='ユーザー情報を新規登録する' class='Sign-Up--Submit form-control btn btn-outline-primary' />
                    </div>
                </form>
            </section>
        </div>
    </div>
@endsection
