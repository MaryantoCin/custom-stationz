<?php

namespace App\Http\Controllers;

use App\Models\Mouse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin_view_product()
    {
        $mices = Mouse::all();
    }
}
