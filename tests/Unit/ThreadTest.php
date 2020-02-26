<?php

namespace Tests\Unit;

//use PHPUnit\Framework\TestCase;
use App\Thread;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Collection;


class ThreadTest extends TestCase
{
    use DatabaseMigrations;

    protected $guarded =[];
    protected $thread;

    public function setUp(): void
    {
        parent::setUp();

        $this->thread = create(Thread::class);
    }

    /** @test */

    function a_thread_has_replies()
    {
        $this->assertInstanceOf(Collection::class, $this->thread->replies);
    }

    /** @test */

    function a_thread_has_a_creator()
    {
        $thread = create('App\Thread');

        $this->assertInstanceOf('App\User', $this->thread->creator);
    }

    /** @test */

    function a_thread_can_add_replies()
    {
        $this->thread->addReply([
            'body' => 'Foobar',
            'user_id' => 1
        ]);

        $this->assertCount(1, $this->thread->replies);

    }
}
