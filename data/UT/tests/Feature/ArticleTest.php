<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Article;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;


class ArticleTest extends TestCase
{
    // use WithoutMiddleware;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testsArticlesAreCreatedCorrectly()
    {
        $user = factory(User::class)->create();
        $token = $user->generateToken();
        $headers = ['Authorization' => "Bearer $token"];
        $payload = [
            'title' => 'Lorem xx',
            'body' => 'Ipsum xx',
        ];               

        $this->json('POST', '/api/articles', $payload , $headers)
            ->assertStatus(201)
            ->assertJson(['title' => 'Lorem xx', 'body' => 'Ipsum xx']);
        
        $this->assertDatabaseHas('articles' , [
            'title' => 'Lorem xx'
        ]);
        
    }

    // public function testsArticlesAreUpdatedCorrectly()
    // {
    //     $user = factory(User::class)->create();
    //     $token = $user->generateToken();
    //     $headers = ['Authorization' => "Bearer $token"];
    //     $article = factory(Article::class)->create([
    //         'title' => 'First Article',
    //         'body' => 'First Body',
    //     ]);

    //     $payload = [
    //         'title' => 'Lorem',
    //         'body' => 'Ipsum',
    //     ];

    //     $response = $this->json('PUT', '/api/articles/' . $article->id, $payload, $headers)
    //         ->assertStatus(200)
    //         ->assertJson([ 
    //             'id' => 1, 
    //             'title' => 'Lorem', 
    //             'body' => 'Ipsum' 
    //         ]);
    // }

    // public function testsArtilcesAreDeletedCorrectly()
    // {
    //     $user = factory(User::class)->create();
    //     $token = $user->generateToken();
    //     $headers = ['Authorization' => "Bearer $token"];
    //     $article = factory(Article::class)->create([
    //         'title' => 'First Article',
    //         'body' => 'First Body',
    //     ]);

    //     $this->json('DELETE', '/api/articles/' . $article->id, [], $headers)
    //         ->assertStatus(204);
    // }

    // public function testArticlesAreListedCorrectly()
    // {
    //     factory(Article::class)->create([
    //         'title' => 'First Article',
    //         'body' => 'First Body'
    //     ]);

    //     factory(Article::class)->create([
    //         'title' => 'Second Article',
    //         'body' => 'Second Body'
    //     ]);

    //     $user = factory(User::class)->create();
    //     $token = $user->generateToken();
    //     $headers = ['Authorization' => "Bearer $token"];

    //     $response = $this->json('GET', '/api/articles', [], $headers)
    //         ->assertStatus(200)
    //         ->assertJson([
    //             [ 'title' => 'First Article', 'body' => 'First Body' ],
    //             [ 'title' => 'Second Article', 'body' => 'Second Body' ]
    //         ])
    //         ->assertJsonStructure([
    //             '*' => ['id', 'body', 'title', 'created_at', 'updated_at'],
    //         ]);
    // }
}
