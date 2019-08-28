<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreatTest extends TestCase
{
	use RefreshDatabase;
	
	/** @test */
	public function a_thread_belongs_to_channel()
	{
		$thread = factory('App\Thread')->create();
		$this->assertInstanceOf('App\ThreadChannel',$thread->channels);
	}
	
	/** @test */
	public function a_thread_can_make_a_string_path()
	{
		$thread = factory('App\Thread')->create();
		$this->assertEquals('/discuss/channel/' . $thread->channels->slug . '/' . $thread->id,$thread->path());
	}
	
}
