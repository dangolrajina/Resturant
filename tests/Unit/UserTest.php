<?php

namespace Tests\Unit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
	use RefreshDatabase;
 	/** @test */
 	public function a_user_has_project()
 	{
 		// Given we have a user
 		$user = factory('App\User')->create();
 		//Can access their project returing eloquent insance
 		$this->assertInstanceOf(Collection::class,$user->projects);
 	}
}
