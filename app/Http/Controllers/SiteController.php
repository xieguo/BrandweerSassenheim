<?php

namespace App\Http\Controllers;

use App\Article;
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
        $featured = Article::orderBy('created_at', 'desc')
            ->where('is_frontpage', 1)
            ->where('is_visible', 1)
            ->where('type', Article::TYPE_FIRESAFETY)
            ->limit(2)
            ->get();

        $articles = Article::orderBy('created_at', 'desc')
            ->where('is_frontpage', 1)
            ->where('is_visible', 1)
            ->where('type', Article::TYPE_NEWS)
            ->limit(10)
            ->get();

        $reports = Report::orderBy('created_at', 'desc')
            ->with('files')
            ->where('is_visible', 1)
            ->limit(10)
            ->get();

        return view('site.index', compact('reports', 'articles', 'featured'));
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
