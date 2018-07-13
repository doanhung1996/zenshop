<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NewTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->post(route('page.store') ,['title'=>'123213', 'content_page'=>'haha', 'slug'=>'123213'] );
        $response->assertStatus(201);
    }
}
