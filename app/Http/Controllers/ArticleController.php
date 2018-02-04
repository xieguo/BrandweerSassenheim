<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->where('is_visible', 1)
            ->paginate(25);

        return view('articles.index', compact('articles'));
    }
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function type(Request $request)
    {
        $type = Route::currentRouteName();

        $articles = Article::orderBy('created_at', 'desc')
            ->where('type', $type)
            ->where('is_visible', 1)
            ->paginate(25);

        return view('articles.index', compact('articles'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function safety()
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->where('type', 'safety')
            ->where('is_visible', 1)
            ->paginate(25);

        return view('articles.index', compact('articles'));
    }

    /**
     * @param Article $article
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article, $slug)
    {
        return view('articles.show', compact('article'));
    }
}
