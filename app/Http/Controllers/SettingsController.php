<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    // Changer la langue
    public function switchLang($locale)
    {
        if (!in_array($locale, ['en', 'fr', 'es'])) {
            abort(400);
        }
        session(['locale' => $locale]);
        app()->setLocale($locale);
        return redirect()->back();
    }

    // Changer la devise
    public function switchCurrency($currency)
    {
        if (!in_array($currency, ['USD', 'EUR', 'XOF', 'INR'])) {
            abort(400);
        }
        session(['currency' => $currency]);
        return redirect()->back();
    }
}
