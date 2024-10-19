<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class AdminController extends Controller
{
    public function Donaterbotua()
    {

        $records = Information::all();

        // Передаем данные в представление admin.blade.php
        return view('admin', compact('records'));

    }
}
