<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;

class HomeController extends ApiController
{
    public function index()
    {
        $user = Auth::user();
        return $this->showMessage([
            "saludo" => 'Bienvenido a Marketest',
            "user" => $user,
        ]);
    }
}
