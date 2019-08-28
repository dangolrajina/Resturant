<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectTest extends TestCase
{
	use RefreshDatabase;
	/** @test */
	public function it_has_a_path()
	{
		// GIve i have a project and create it
		$project = factory('App\Project')->create();

		// I want to able to call the method path
		$this->assertEquals('/projects/'.$project->id,$project->path());
	}
	/** @test */
	public function it_belongs_to_an_owner()
	{
		$project = factory('App\Project')->create();

		$this->assertInstanceOf('App\User',$project->owner);
	}
	/** @test */
	public function it_can_add_a_tasks()
	{
		$project = factory('App\Project')->create();

		$task  = $project->addTask('Test task');

		$this->assertTrue($project->tasks->contains($task));
	}
}
