<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * @return Inertia\Response
     */
    public function web(): Inertia\Response
    {
        return Inertia::render('App');
    }
}
