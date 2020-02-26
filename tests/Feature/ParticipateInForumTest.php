<?php

namespace Tests\Feature;

use App\Reply;
use App\Thread;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function unauthenticated_user_may_not_add_replies()
    {
        $this->withoutExceptionHandling();

        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->post('/threads/1/replies', []);

    }

    /** @test */

    function an_authenticated_user_may_participate_in_forum_threads()
    {
        $this->withoutExceptionHandling();

        $this->be($user = create(User::class));

        $thread = create(Thread::class);

        $reply  = make(Reply::class);
        $this->post($thread->path() . '/replies', $reply->toArray());

        $this->get($thread->path())
            ->assertSee($reply->body);
    }
}




















