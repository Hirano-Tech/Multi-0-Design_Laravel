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

#### 👥　ユーザー管理機能

1. ユーザー 新規登録機能 （[RegistrationsController.php](/app/Http/Controllers/RegistrationsController.php)）
2. ユーザー ログイン，ログアウト機能 （[SessionsController.php](/app/Http/Controllers/SessionsController.php)）

```PHP
class RegistrationsController extends Controller
{
    /*
        use Illuminate\Support\Facades\Auth;
    */
    public function create()
    {
        if (!Auth::check()) {
            // 'Auth::check()' を使用して、ユーザーが認証状態でなければ新規登録フォームを表示する。
        } else {
            // 既にログインしていれば、トップページへリダイレクトする。
        }
    }

    /*
        use Illuminate\Http\Request;
        use App\Models\User;
        use Illuminate\Support\Facades\Hash;
    */
    public function store(Request $request)
    {
        $user = new User;
            // User モデルに新しくインスタンスを作成する。
        if ($request -> filled('name')) {
            // 名前欄に入力されていれば、入力内容を取得する。
        }

        $user -> email = strtolower($request -> email);
            // メールアドレスを小文字にして取得する。
        if ($request -> password === $request -> password_confirm) {
            $user -> password = Hash::make($request -> password);
            // 入力されたパスワードと確認用のパスワードが一致すれば、ハッシュ化して取得する。
        } else {
            return redirect() -> route('new_user_registration');
        }

        $user -> save();
            // データベースに保存した後、ログイン状態にするためにログイン処理をする。
        $credentials = array(
            'email' => $user -> email,
            'password' => $request -> password
            // User インスタンスに取得しているパスワードはハッシュ化されているため、パスワードはフォームから送信された値を使用する。
        );

        if (Auth::attempt($credentials)) {
            // 認証に成功すれば、トップページにリダイレクトする。
        }
    }
}
```

#### 🔍　オフィシャルサイト内に掲載されている GU おしゃリスタ（コーディネートアドバイザー）によるスタッフスタイリングページに直接 リダイレクトする。

```php
class GU_SearchesController extends Controller
{
    /*
        use Illuminate\Http\Request;
    */
    public function search(Request $request)
    {
        $gender = $request -> input('gender');
            // 検索フォームの 'レディース' 'メンズ'、どちらが選択されているのかを取得する。
        $hash_tag = substr($request -> input('tag'), 1);
            // ハッシュタグの先頭にある '#' を削除する。
        return redirect("https://www.gu-global.com/jp/ja/styling/hashtag/{$hash_tag}/?gender={$gender}");
            // オフィシャルサイトの URL に当てはめてリダイレクトさせる。
    }
}
```

- [GU_SearchesController.php](/app/Http/Controllers/GU_SearchesController.php)

#### 👖　商品番号から商品名を取得する。

```PHP
class GU_ProductsController extends Controller
{
    /*
        use Illuminate\Http\Request;
        use App\Models\GU_Product;
        use Goutte\Client;
    */
    public function store(Request $request)
    {
        $product = new GU_Product;
            // モデルのインスタンスを新規作成する。
        $product -> product_id = $request -> input('product_id');
            // 入力された商品番号を取得する。

        $client = new Client();
            // Goute を使用して、オフィシャルサイトからスクレイピングする。
        $crawler = $client -> request('GET', "https://www.gu-global.com/jp/ja/products/E{$request -> input('product_id')}-000/00");
        $product -> name = rtrim($crawler -> filter('title') -> text(), ' | GU(ジーユー)公式通販オンラインストア');
            // 商品ページのタイトルを取得して、不要な部分を削除する。
        $product -> user_id = Auth::id();
            // 現在 ログインしているユーザー ID を取得して、データベースへ保存する。
        $product -> save();

        return redirect() -> route('root');    }
}
```

- [GU_ProductsController.php](/app/Http/Controllers/GU_ProductsController.php)
- [Goutte](https://github.com/FriendsOfPHP/Goutte)
