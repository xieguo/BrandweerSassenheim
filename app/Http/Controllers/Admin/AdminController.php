<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Report;

class AdminController extends Controller
{
    public function dashboard()
    {
        $reports = Report::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $articles = Article::orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('reports', 'articles'));
    }
}
