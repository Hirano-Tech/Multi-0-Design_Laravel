@extends('layouts.app')
@section('title', 'Multi-0-Design')

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

            <section class='GU_Staff col'>
                <div class='GU_Staff__Title'>
                    <h2>
                        <picture>
                            <source type='image/png' srcset="{{ asset('/images/GU.webp') }}" />
                            <img src="{{ asset('/images/GU.png') }}" alt='' />
                        </picture>

                        <span class='GU_Staff__Title--Text'>
                            GU<span class='GU_Staff__Title--Small'>（ジーユー）</span>STAFF STYLING 検索
                        </span>
                    </h2>
                    <p class='GU_Staff__Title--Mute text-muted'>ジーユーのおしゃリスタ（コーディネートアドバイザー）のスタイリングコレクション</p>
                </div>

                <form action={{ route('gu_staff.store') }} class='GU_Staff__Form' id='GU-Staff_Form' target='_blank' method='POST'>
                    @csrf
                    <div class='GU_Staff__Form__Gender'>
                        <p class='GU_Staff__Form__Gender--Title badge badge-secondary'>性別</p>
                        <div class='GU_Staff__Form__Gender__Ladies form-check'>
                            <input type='radio' name='gender' value='women' class='form-check-input' id='GU-Staff_Ladies' checked='checked' />
                            <label class='form-check-label' for='GU-Staff_Ladies'>レディース</label>
                        </div>
                        <div class='form-check'>
                            <input type='radio' name='gender' class='form-check-input' id='GU-Staff_Mens' value='men' />
                            <label class='form-check-label' for='GU-Staff_Mens'>メンズ</label>
                        </div>
                    </div>

                    <div class='GU_Staff__Form__Hash-Tag'>
                        @foreach($hash_tags as $hash_tag)
                            <input type='submit' name='tag' value="{{ $hash_tag }}" class='GU_Staff__Form__Hash-Tag--Link btn btn-outline-dark' />
                        @endforeach

                        <div class='GU_Staff__Form__Hash-Tag__Select'>
                            <label for='GU-Staff_Form' class='text-muted'> その他のハッシュタグ：</label>
                            <select id='GU-Staff_Form' name='tag'>
                                @foreach($all_hash_tags as $hash_tag)
                                    <option value="{{ $hash_tag }}"> {{ $hash_tag }} </option>
                                @endforeach
                            </select>
                            <input type='submit' value='送信' class='GU_Staff__Form__Hash-Tag__Select--Submit btn btn-outline-dark' />
                        </div>
                    </div>
                </form>
            </section>




        </div>
    </div>
@endsection
