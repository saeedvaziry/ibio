<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function privacy()
    {
        return view('home.privacy');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function terms()
    {
        return view('home.terms');
    }

    /**
     * @return \Illuminate\Contracts\View\View
     */
    public function cookie()
    {
        return view('home.cookie');
    }
}
