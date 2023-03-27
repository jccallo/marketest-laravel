<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\ApiController;

class DashboardController extends ApiController
{
    public function index()
    {
        return $this->showMessage([
            "saludo" => 'Bienvenido al Dashboard de Marketest',
        ]);
    }
}
