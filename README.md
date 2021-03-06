## ð¥ãMulti-0-Design ã¢ããªã±ã¼ã·ã§ã³æ¦è¦

- åç§°ï¼ **Multi-0-Design** ï¼ã¾ãã¡ã§ãããï¼

### âï¸ãéçºç°å¢ï¼æè¡

- [PHP](https://www.php.net) Version 8.0
    - [Composer](https://getcomposer.org) Version 2.0

- [Laravel](http://laravel.jp) Version 6.20

- [MySQL](https://www.mysql.com/jp) Version 8.0

- [Docker](https://www.docker.com) Version 20.10
    - Docker-Compose Version 1.28<br />

###### è©³ããã¯ãä»¥ä¸ããè¦§ãã ãã ðð»ââï¸

- [Docker ã§ãPHPï¼Laravelï¼ã®ç°å¢æ§ç¯ãããã](https://zenn.dev/hirano_tech/articles/ba6a525e00761a) | [Zenn](https://zenn.dev)

---

### âï¸ãæ©è½ç´¹ä»

#### ð¥ãã¦ã¼ã¶ã¼ç®¡çæ©è½

1. ã¦ã¼ã¶ã¼ æ°è¦ç»é²æ©è½ ï¼[RegistrationsController.php](/app/Http/Controllers/RegistrationsController.php)ï¼
2. ã¦ã¼ã¶ã¼ ã­ã°ã¤ã³ï¼ã­ã°ã¢ã¦ãæ©è½ ï¼[SessionsController.php](/app/Http/Controllers/SessionsController.php)ï¼

```PHP
class RegistrationsController extends Controller
{
    /*
        use Illuminate\Support\Facades\Auth;
    */
    public function create()
    {
        if (!Auth::check()) {
            // 'Auth::check()' ãä½¿ç¨ãã¦ãã¦ã¼ã¶ã¼ãèªè¨¼ç¶æã§ãªããã°æ°è¦ç»é²ãã©ã¼ã ãè¡¨ç¤ºããã
        } else {
            // æ¢ã«ã­ã°ã¤ã³ãã¦ããã°ãããããã¼ã¸ã¸ãªãã¤ã¬ã¯ãããã
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
            // User ã¢ãã«ã«æ°ããã¤ã³ã¹ã¿ã³ã¹ãä½æããã
        if ($request -> filled('name')) {
            // ååæ¬ã«å¥åããã¦ããã°ãå¥ååå®¹ãåå¾ããã
        }

        $user -> email = strtolower($request -> email);
            // ã¡ã¼ã«ã¢ãã¬ã¹ãå°æå­ã«ãã¦åå¾ããã
        if ($request -> password === $request -> password_confirm) {
            $user -> password = Hash::make($request -> password);
            // å¥åããããã¹ã¯ã¼ãã¨ç¢ºèªç¨ã®ãã¹ã¯ã¼ããä¸è´ããã°ãããã·ã¥åãã¦åå¾ããã
        } else {
            return redirect() -> route('new_user_registration');
        }

        $user -> save();
            // ãã¼ã¿ãã¼ã¹ã«ä¿å­ããå¾ãã­ã°ã¤ã³ç¶æã«ããããã«ã­ã°ã¤ã³å¦çãããã
        $credentials = array(
            'email' => $user -> email,
            'password' => $request -> password
            // User ã¤ã³ã¹ã¿ã³ã¹ã«åå¾ãã¦ãããã¹ã¯ã¼ãã¯ããã·ã¥åããã¦ããããããã¹ã¯ã¼ãã¯ãã©ã¼ã ããéä¿¡ãããå¤ãä½¿ç¨ããã
        );

        if (Auth::attempt($credentials)) {
            // èªè¨¼ã«æåããã°ãããããã¼ã¸ã«ãªãã¤ã¬ã¯ãããã
        }
    }
}
```

#### ðããªãã£ã·ã£ã«ãµã¤ãåã«æ²è¼ããã¦ãã GU ããããªã¹ã¿ï¼ã³ã¼ãã£ãã¼ãã¢ããã¤ã¶ã¼ï¼ã«ããã¹ã¿ããã¹ã¿ã¤ãªã³ã°ãã¼ã¸ã«ç´æ¥ ãªãã¤ã¬ã¯ãããã

```php
class GU_SearchesController extends Controller
{
    /*
        use Illuminate\Http\Request;
    */
    public function search(Request $request)
    {
        $gender = $request -> input('gender');
            // æ¤ç´¢ãã©ã¼ã ã® 'ã¬ãã£ã¼ã¹' 'ã¡ã³ãº'ãã©ã¡ããé¸æããã¦ããã®ããåå¾ããã
        $hash_tag = substr($request -> input('tag'), 1);
            // ããã·ã¥ã¿ã°ã®åé ­ã«ãã '#' ãåé¤ããã
        return redirect("https://www.gu-global.com/jp/ja/styling/hashtag/{$hash_tag}/?gender={$gender}");
            // ãªãã£ã·ã£ã«ãµã¤ãã® URL ã«å½ã¦ã¯ãã¦ãªãã¤ã¬ã¯ããããã
    }
}
```

- [GU_SearchesController.php](/app/Http/Controllers/GU_SearchesController.php)

#### ðãååçªå·ããåååãåå¾ããã

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
            // ã¢ãã«ã®ã¤ã³ã¹ã¿ã³ã¹ãæ°è¦ä½æããã
        $product -> product_id = $request -> input('product_id');
            // å¥åãããååçªå·ãåå¾ããã

        $client = new Client();
            // Goute ãä½¿ç¨ãã¦ããªãã£ã·ã£ã«ãµã¤ãããã¹ã¯ã¬ã¤ãã³ã°ããã
        $crawler = $client -> request('GET', "https://www.gu-global.com/jp/ja/products/E{$request -> input('product_id')}-000/00");
        $product -> name = rtrim($crawler -> filter('title') -> text(), ' | GU(ã¸ã¼ã¦ã¼)å¬å¼éè²©ãªã³ã©ã¤ã³ã¹ãã¢');
            // ååãã¼ã¸ã®ã¿ã¤ãã«ãåå¾ãã¦ãä¸è¦ãªé¨åãåé¤ããã
        $product -> user_id = Auth::id();
            // ç¾å¨ ã­ã°ã¤ã³ãã¦ããã¦ã¼ã¶ã¼ ID ãåå¾ãã¦ããã¼ã¿ãã¼ã¹ã¸ä¿å­ããã
        $product -> save();

        return redirect() -> route('root');    }
}
```

- [GU_ProductsController.php](/app/Http/Controllers/GU_ProductsController.php)
- [Goutte](https://github.com/FriendsOfPHP/Goutte)
