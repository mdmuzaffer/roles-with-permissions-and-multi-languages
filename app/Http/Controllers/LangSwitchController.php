<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangSwitchController extends Controller
{
    public function switchLanguage(Request $request, $locale = null)
    {

    $locale = $request->input('langSwitch');

    app()->setLocale($locale);
    session()->put('locale', $locale);

    //dd(App::getLocale());

    return redirect()->back();

    }
}
