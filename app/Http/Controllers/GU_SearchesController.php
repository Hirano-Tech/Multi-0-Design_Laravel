<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\GU_Product;
use Goutte\Client;

class GU_SearchesController extends Controller
{
    public function search(Request $request)
    {
        $gender = $request -> input('gender');
        $hash_tag = substr($request -> input('tag'), 1);
        return redirect("https://www.gu-global.com/jp/ja/styling/hashtag/{$hash_tag}/?gender={$gender}");
    }
}
