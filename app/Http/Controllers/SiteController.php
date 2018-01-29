<?php

namespace App\Http\Controllers;

use App\Report;

class SiteController extends Controller
{
    /**
     * Homepage
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $reports = Report::orderBy('created_at', 'desc')
            ->limit(10)
            ->get();

        return view('site.index', compact('reports'));
    }

    /**
     * Brandveiligheid
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function brandveiligheid()
    {
        return view('site.brandveiligheid');
    }

    /**
     * P2000 monitor
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function p2000()
    {
        return view('site.p2000');
    }

    /**
     * Contact page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('site.contact');
    }
}
