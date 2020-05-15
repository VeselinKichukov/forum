<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */

    public function a_user_may_catch_their_most_recent_reply()
    {
        $user = create('App\User');

        $reply = create('App\Reply',['user_id' => $user->id]);

        $this->assertEquals($reply->id,$user->lastReply->id);
    }
}
