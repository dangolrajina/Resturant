<?php

namespace Tests\Unit;
	
use App\NewsChannel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
	use RefreshDatabase;
   /** @test */
   public function it_has_its_path()
   {
   	$news = factory('App\News')->create();
   	$channel = factory('App\NewsChannel')->create();
   	$this->assertEquals('/news/' . $channel->slug .'/'. $news->title,$news->path());
   }
   	/** @test */
	public function it_belongs_to_an_owner()
	{
		$news = factory('App\News')->create();

		$this->assertInstanceOf('App\NewsChannel',$news->channel);
	}
   /** @test */
   public function a_channel_has_many_news()
   {
        $pnews = factory(NewsChannel::class)->create();
        $this->assertInstanceOf(NewsChannel::class, $pnews->news);
   }
}
