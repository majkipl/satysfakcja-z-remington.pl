<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Application;
use Illuminate\Contracts\View\View;

class ApplicationController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        $applications = Application::all();

        return view('panel/application/index', []);
    }

    /**
     * @param Application $application
     * @return View
     */
    public function show(Application $application): View
    {
        return view('panel/application/show', [
            'application' => $application
        ]);
    }
}
