<?php

namespace Tests\Feature;

use Tests\TestCase;
// use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadPostsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp() {
        parent::setUp();
        $this->post = factory('App\Post')->create();
    }

    /** @test */
    public function test_a_user_can_view_all_posts()
    {

        $response = $this->get('/')
        ->assertSee($this->post->title);
    }

    /** @test */
    public function test_a_user_can_read_single_post()
    {

        $this->get($this->post->path())
         ->assertSee($this->post->title);
    }


}
