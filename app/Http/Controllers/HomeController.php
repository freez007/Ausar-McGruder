<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormAusarRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Welcome', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
        ]);
    }

    /**
     * @param FormAusarRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|RedirectResponse|Redirector
     */
    public function store(FormAusarRequest $request)
    {
        return Redirect::route('home');
    }
}
