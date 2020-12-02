<?php

namespace App\Http\Controllers;

class PageSettingController extends Controller
{
    /**
     * @return \Inertia\Response|\Inertia\ResponseFactory
     */
    public function index()
    {
        return inertia('page-settings/Index', [
            'title' => __('Page settings'),
            'menu' => 'page-settings'
        ]);
    }
}
