<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BooksTest extends TestCase
{
	use DatabaseMigrations;
    /**
     * A basic unit test example.
     *
     * @test
     */
    public function a_books_has_has_a_creator()
    {
    	$books = factory('App\Books')->create();
    		
		$this->assertInstanceOf('App\User',$books->creator);
    }

    /** @test */
    public function a_book_can_be_subscribed_to()
    {
        // GIven we have a book
        $books = factory('App\Books')->create();
        // And an authenticated user
        // $user = $this->actingAs(factory('App\User')->create());
        // When the user subscribes to the books
        $books->subscribe($userId = 1 );
        // THen we shoul ne able to fetch all books that the user has subscribed to
        $this->assertEquals(
            1,
            $books->subscriptions()->where('user_id',$userId)->count()
        );
    }
    /** @test */
    public function a_thread_can_be_unsubscribed_from()
    {
        // GIven we have a book
        $books = factory('App\Books')->create();
        // And a user who is subscribed to the books
        $books->subscribe($userId = 1 );
        // And a user who is unsubscribed to the books
        $books->unsubscribe($userId);
        $this->assertCount(
            0,
            $books->subscriptions);
    }
     /** @test */
   public function it_knows_if_the_authenticated_user_is_subscriobed_to_it()
   {
        $this->withoutExceptionHandling();
        // Give we have a signed in user
        $this->actingAs(factory('App\User')->create());
        // Give we have a book & a channel
       $books = factory('App\Books')->create();

        $this->assertFalse($books->isSubscribedTo);
        $books->subscribe();
       $this->assertTrue($books->isSubscribedTo);
   }
}
