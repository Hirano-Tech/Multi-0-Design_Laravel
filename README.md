## 🖥　Multi-0-Design アプリケーション概要

- 名称： **Multi-0-Design** （まるちでざいん）

### ⚙️　開発環境，技術

- [PHP](https://www.php.net) Version 8.0
    - [Composer](https://getcomposer.org) Version 2.0

- [Laravel](http://laravel.jp) Version 6.20

- [MySQL](https://www.mysql.com/jp) Version 8.0

- [Docker](https://www.docker.com) Version 20.10
    - Docker-Compose Version 1.28<br />

###### 詳しくは、以下をご覧ください 🙇🏻‍♂️

- [Docker で、PHP（Laravel）の環境構築をする。](https://zenn.dev/hirano_tech/articles/ba6a525e00761a) | [Zenn](https://zenn.dev)

---

### ⚙️　機能紹介

##### 🔍　オフィシャルサイト内に掲載されている GU おしゃリスタ（コーディネートアドバイザー）によるスタッフスタイリングページに直接 リダイレクトする。

```php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

class GU_StaffsController extends Controller
{
    public function store(Request $request)
    {
        // ↓ フォームで選択された "性別" と "ハッシュタグ" を取得する。 ↓
        $gender = $request -> input('gender');
        $hash_tag = substr($request -> input('tag'), 1); 

        // ↓ オフィシャルサイトへリダイレクトさせる。 ↓
        return redirect("https://www.gu-global.com/jp/ja/styling/hashtag/{$hash_tag}/?gender={$gender}");
    }
}
```

- [GU_StaffsController.php](/app/Http/Controllers/GU_StaffsController.php)
