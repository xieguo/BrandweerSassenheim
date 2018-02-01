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

        return view('article.index', compact('articles'));
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

        return view('article.index', compact('articles'));
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

        return view('article.index', compact('articles'));
    }

    /**
     * @param Article $article
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article, $slug)
    {
        return view('article.show', compact('article'));
    }

    /**
     * Create a new article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $article = new Article();

        return view('article.create', compact('article'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $article = $this->validateAndPersist($request);

        return redirect($article->path);
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        return view('article.edit', compact('article'));
    }

    /**
     * @param Article $article
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, Request $request)
    {
        $article = $this->validateAndPersist($request, $article);

        return redirect($article->path);
    }

    /**
     * @param Request $request
     * @param Article|null $article
     * @return Article
     */
    private function validateAndPersist(Request $request, Article $article = null)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $article = $article ?: new Article();
        $article->fill([
            'title' => $request->input('title'),
            'introduction' => $request->input('introduction'),
            'description' => $request->input('description'),
            'is_visible' => $request->input('is_hidden') ? 0 : 1,
            'is_frontpage' => $request->input('is_frontpage') ? 1 : 0,
            'type' => $request->input('type'),
        ]);

        $article->save();

        return $article;
    }
}
