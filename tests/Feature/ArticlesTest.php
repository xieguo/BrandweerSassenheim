<?php

namespace Tests\Feature;

use App\Article;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticlesTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testCanSeeArticlePages()
    {
        foreach (config('types') as $key => $type)
        {
            $article = factory(Article::class)->create([
                'type' => $key,
            ]);

            $response = $this->get(route($key));

            $response->assertSeeText($article->title);
        }
    }

    /**
     * @return void
     */
    public function testCanSeeArticleDetail()
    {
        $article = factory(Article::class)->create();

        $response = $this->get($article->path);

        $response->assertSeeText($article->title);
    }
}
