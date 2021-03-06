<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTasksTest extends TestCase
{
    use RefreshDatabase;

    
    /** @test */
    function only_the_owner_of_a_project_may_add_tasks(){
        
        $this->signIn();

        $project = factory('App\Project')->create();

        $this->post($project->path().'/tasks',['body'=>'Test task'])
        ->assertStatus(403);

        $this->assertDatabaseMissing('tasks',['body'=>'Test task']);

    }

    /** @test */
    public function a_projects_can_have_task(){

        $this->signIn();


        $project=auth()->user()->projects()->create(factory('App\Project')->raw());
        $this->post($project->path().'/tasks',['body'=>'Test task']);
        $this->get($project->path())->assertSee('Test task');
    }
    /** @test */
    public function a_task_requires_a_body(){

        $this->signIn();
        $project=auth()->user()->projects()->create(factory('App\Project')->raw());
        $attributes =factory('App\Task')->raw(['body'=>'']);
        $this->post($project->path().'/tasks',$attributes)->assertSessionHasErrors('body');
    }
}
