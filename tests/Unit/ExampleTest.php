<?php

namespace Tests\Unit;

use App\Post;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
	use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
    	// The following line was present here by default
        // $this->assertTrue(true);

        // Add test database record

        $first = factory(Post::class)->create();
        $second = factory(Post::class)->create([
        	'created_at' => \Carbon\Carbon::now()->subMonth(),
        ]);

        $post = Post::archive();

        $this->assertCount(2, $post);
    }
}
