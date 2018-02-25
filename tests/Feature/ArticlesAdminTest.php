<?php

namespace Tests\Feature;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticlesAdminTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @return void
     */
    public function testCanCreateArticle()
    {
        $this->actingAs(factory(User::class)->create());

        $article = factory(Article::class)->make();

        $response = $this->followingRedirects()
            ->post(route('admin.articles.store'), $article->toArray());

        $response->assertStatus(200)
            ->assertSee($article->title);
    }

    /**
     * @return void
     */
    public function testCanUpdateArticle()
    {
        $this->actingAs(factory(User::class)->create());

        $article = factory(Article::class)->create();
        $title = 'Different title';

        $response = $this->followingRedirects()
            ->put(route('admin.articles.update', $article->id), [
                'title' => $title,
            ]);

        $response->assertStatus(200)
            ->assertSee($title);
    }
}
