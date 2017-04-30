<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CourseIntegrationTest extends TestCase
{
    use DatabaseMigrations;
    use WithoutMiddleware;

    public function setUp()
    {
        parent::setUp();

        $this->course = factory(App\Repositories\Course\Course::class)->make([
            // put fields here
        ]);
        $this->courseEdited = factory(App\Repositories\Course\Course::class)->make([
            // put fields here
        ]);
        $user = factory(App\Repositories\User\User::class)->make();
        $this->actor = $this->actingAs($user);
    }

    public function testIndex()
    {
        $response = $this->actor->call('GET', '/courses');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('courses');
    }

    public function testCreate()
    {
        $response = $this->actor->call('GET', '/courses/create');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testStore()
    {
        $response = $this->actor->call('POST', 'courses', $this->course->toArray());

        $this->assertEquals(302, $response->getStatusCode());
    }

    public function testEdit()
    {
        $this->actor->call('POST', 'courses', $this->course->toArray());

        $response = $this->actor->call('GET', '/courses/'.$this->course->id.'/edit');
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertViewHas('course');
    }

    public function testUpdate()
    {
        $this->actor->call('POST', 'courses', $this->course->toArray());
        $response = $this->actor->call('PATCH', '/courses/1', $this->courseEdited->toArray());

        $this->assertEquals(302, $response->getStatusCode());
        $this->seeInDatabase('courses', $this->courseEdited->toArray());
        $this->assertRedirectedTo('/');
    }

    public function testDelete()
    {
        $this->actor->call('POST', 'courses', $this->course->toArray());

        $response = $this->call('DELETE', '/courses/'.$this->course->id.'/delete');
        $this->assertEquals(302, $response->getStatusCode());
        $this->assertRedirectedTo('/courses');
    }

}
