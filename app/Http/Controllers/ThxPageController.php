<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ThxPageController extends Controller
{
    public function index(Request $request, $id)
    {
        return view('thx/index', [
            'id' => $id
        ]);
    }
}
