<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
    {
        if (!Auth::check()) {
            $all_hash_tags = array(
                // ↓ レディース，メンズ 共通のハッシュタグ ↓
                '#春カラー', '#きれいめコーデ', '#楽チンコーデ', '#大人コーデ', '#春休みコーデ', '#きれいめカジュアル', '#お花見コーデ', '#新生活', '#リモートワーク', '#夏コーデ', '#カジュアルコーデ',

                // ↓ レディースのハッシュタグ ↓
                '#大人カジュアル',   '#フェミニントップス', '#春夏コーデ',  '#ワンピース', '#デニム',

                // ↓ メンズのハッシュタグ ↓
                '#レイヤード', '#オーバーサイズ', '#オープンカラーシャツ', '#大人カジュアル', '#オトナカジュアル'
            );

            $hash_tags = array();
            foreach(array_rand ($all_hash_tags , 5) as $tags_key) {
                array_push ( $hash_tags, $all_hash_tags[$tags_key] );
            }

            return view('index', ['all_hash_tags' => $all_hash_tags, 'hash_tags' => $hash_tags]);
        } else {
            return redirect() -> route('root');
        }
    }

    public function store(Request $request)
    {
        $credentials = $request -> only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect() -> route('root');
        }
    }

    public function destroy()
    {
        Auth::logout();
        return redirect() -> route('root');
    }
}
