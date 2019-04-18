<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;


class PostTest extends TestCase
{
    use DatabaseMigrations;

    protected $post;

    public function setUp() {
        parent::setUp();
        $this->post = factory('App\Post')->create();
    }



    /** @test */
    function it_has_a_category()
    {
        $this->assertInstanceOf('App\Category', $this->post->category);
    }

}
