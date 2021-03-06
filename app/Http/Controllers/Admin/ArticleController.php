<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')
            ->paginate(100);

        return view('admin.articles.index', compact('articles'));
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Article $article)
    {
        return view('admin.articles.show', compact('article'));
    }

    /**
     * Create a new article
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $article = new Article();

        return view('admin.articles.create', compact('article'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $article = $this->validateAndPersist($request);

        return redirect(route('admin.articles.show', $article->id));
    }

    /**
     * @param Article $article
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit', compact('article'));
    }

    /**
     * @param Article $article
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Article $article, Request $request)
    {
        $article = $this->validateAndPersist($request, $article);

        return redirect(route('admin.articles.show', $article->id));
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
