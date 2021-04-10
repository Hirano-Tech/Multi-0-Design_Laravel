<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GU_StaffsController extends Controller
{
    public function store(Request $request)
    {
        $gender = $request -> input('gender');
        $hash_tag = substr($request -> input('tag'), 1);
        return redirect("https://www.gu-global.com/jp/ja/styling/hashtag/{$hash_tag}/?gender={$gender}");
    }
}
