
## Setup and configura multiple languages
==================================================
Steps 1 =  intstall the laravel first - composer create-project laravel/laravel demo
steps 2. = set the multiple language swithcher drop down option in header as you wish.

#### Here HTML code 

<div class="col-md-1">
  <form id="language-form" action="{{ route('langSwitch') }}" method="POST">
    @csrf
    
    <select class="form-control Langchange" name="langSwitch" onchange="this.form.submit()">
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
        <option value="hi" {{ session()->get('locale') == 'hi' ? 'selected' : '' }}>Hindi</option> 
        <option value="kn" {{ session()->get('locale') == 'kn' ? 'selected' : '' }}>kannada</option>
    </select>
    
  </form>
</div>


![image](https://github.com/mdmuzaffer/roles-with-permissions-and-multi-languages/assets/58267203/00b58054-92dd-4632-bc20-f6414ff06386)


#### Create language folder and then language name inside file -
like lang - en/hi/kn- text.php === like this 
![image](https://github.com/mdmuzaffer/roles-with-permissions-and-multi-languages/assets/58267203/de553992-5eb4-4ea4-98d0-cd776f06093c)

### language file string variable like this 

![image](https://github.com/mdmuzaffer/roles-with-permissions-and-multi-languages/assets/58267203/639c4d19-d568-4249-9b43-18dcbe7837c5)


### Now create Middleware 

Passing the locale for every site link might not be what you want and could look not so clean esthetically. That’s why we’ll perform language setup via a special language switcher and use the user session to display the translated content. Therefore, create new middleware in the app/Http/Middleware/Localization.php file or by running 

php artisan make:middleware Localization.

Paste the following code inside



namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\UserDetail;

use Tymon\JWTAuth\Facades\JWTAuth;

use Illuminate\Support\Facades\App;

use Illuminate\Support\Facades\Session;


class Localization
{
    public function handle(Request $request, Closure $next): Response
    {

        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }

        if ($request->is('api/*')) {
            $local = ($request->hasHeader('X-localization')) ? $request->header('X-localization') : 'en';
            app()->setLocale($local);
        }
        

        return $next($request);
    }
}

