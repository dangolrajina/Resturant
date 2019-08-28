<?php

namespace Tests\Unit;
use App\Project;
use App\ProjectTask;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
class TaskTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function it_belongs_to_a_project()
    {
        $task = factory(ProjectTask::class)->create();
        $this->assertInstanceOf(Project::class, $task->project);
    }
    /** @test */
    function it_has_a_path()
    {
        $task = factory(ProjectTask::class)->create();
        $this->assertEquals("/projects/{$task->project->id}/tasks/{$task->id}", $task->path());
    }
}