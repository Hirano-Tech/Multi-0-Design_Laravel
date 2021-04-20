@extends('layouts.app')
@section('title', 'ユーザー マイページ | Multi-0-Design')

@section('content')
<section class='User_MyPage col-9'>
    <h2 class='Title_Menu' data-en='My Page'>
        <span><i class='fas fa-user-circle'></i>ユーザー情報 確認ページ</span>
    </h2>

    <h3 class='User_MyPage--Title' data-number='01'>現在 登録されているユーザー情報</h3>
    <div class='User_MyPage__Profile'>
        <p class='badge badge-secondary'>名前</p> {{$user -> name}}<br />
        <p class='badge badge-secondary'>メールアドレス</p> {{$user -> email}}<br />

        @php
            $user_create = new DateTime($user -> created_at);
        @endphp
        <p class='badge badge-secondary'>アカウント作成日</p> {{$user_create -> format('Y年 n月 d日')}}
    </div>

    <h3 class='User_MyPage--Title' data-number='02'>ブックマークしている商品一覧</h3>
    <table class='User_MyPage__Bookmark table table-striped'>
        <thead>
            <th class='User_MyPage__Bookmark--Number' scope='col'>商品番号</th>
            <th class='User_MyPage__Bookmark--Name' scope='col'>商品名</th>
            <!-- <th class='User_MyPage__Bookmark--Date' scope='col'>登録日</th> -->
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class='User_MyPage__Bookmark--Number' scope='col'> {{$product -> product_id}} </td>
                    <td scope='col'>
                        {{$product -> name}} <br />
                    </td>

                    <!-- @php
                        $product_bookmark = new DateTime($product -> created_at);
                    @endphp
                    <td class='User_MyPage__Bookmark--Date' scope='col'> {{$product_bookmark -> format('Y年 n月 d日')}} </td> -->
                    <td class='User_MyPage__Bookmark--Delete' scope='col'>
                        <form action="{{ route('gu_product.destroy', ['gu_product' => $product -> id]) }}" method='POST'>
                            <input type='hidden' name='_method' value='DELETE' />
                            <input type='hidden' name='_token' value='{{ csrf_token() }}' />
                            <input type='submit' value='削除' class='btn btn-danger' />
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
