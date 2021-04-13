@extends('layouts.app')
@section('title', 'ユーザー情報 新規登録ページ | Multi-0-Design')

@section('content')
    <section class='Sign-Up container-lg'>
        <form action="{{ route('user_registration') }}" method='POST' enctype='application/x-www-form-urlencoded' accept-charset='UTF-8'>
            @csrf
            <div class='form-group'>
                <p class=''>
                    <span class='badge badge-secondary'>任意</span>
                    <label for='name'>名前</label>：
                </p>
                <input type='text' name='name' class='form-control' id='name' inputmode='text' autocomplete='name' />
            </div>

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
                <p class=''>
                    <span class='badge badge-danger'>必須</span>
                    <label for='password-confirm'>パスワード（確認用）</label>：
                </p>
                <input type='password' name='password_confirm' class='form-control' id='password-confirm' inputmode='text' autocomplete='off' required />
            </div>


            <div class='form-group'>
                <input type='submit' value='ユーザー情報を新規登録する' class='form-control btn btn-primary' />
            </div>
        </form>
    </section>
@endsection
