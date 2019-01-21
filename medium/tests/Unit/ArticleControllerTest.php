<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\User;
use App\Tag;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArticleControllerTest extends TestCase
{
    public function testsArticleCreation()
    {
        $payload = [
            'title' => 'Test',
            'details' => 'Test Description',
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
}
