<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Tag;
use App\Article;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleControllerTest extends TestCase
{
    public function testsArticleCreation()
    {
        $payload = [
            'title' => 'Cration Test',
            'details' => 'Creation Test Description',
            'tag_id' => 1,
            'user_id' => 1,
        ];

        $this->json('POST', '/api/article', $payload)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                'id',
                'title',
                'details',
                'created_at',
                'updated_at',
                'user_id',
                'tag_id',
                'photos',
                ],
            ]);

    }

    public function testsArticleUpdate()
    {
        $payload = [
            'title' => 'Test updated',
            'details' => 'Test Description updated',
        ];

        $response = $this->json('PUT', '/api/article/1' , $payload)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'details',
                    'created_at',
                    'updated_at',
                    'user_id',
                    'tag_id',
                    'photos',
                ],
            ]);
    }

    public function testsArtilceDelete()
    {
        $article = factory(Article::class)->create([
            'title' => 'First Article',
            'details' => 'First Body',
            'tag_id' => 1,
            'user_id' => 1,
        ]);

        $this->json('DELETE', '/api/article/' . $article->id, [])
            ->assertStatus(204);
    }

    public function testArticlesAreListing()
    {
        $response = $this->json('GET', '/api/article', [])
            ->assertStatus(200);
    }


}
