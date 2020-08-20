<?php

namespace Tests\Feature;

use App\Models\Message;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageMessagesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * @test
     */
    public function guests_cannot_create_message(): void
    {
        $message = factory(Message::class)->create();

        $this->post('messages', $message->toArray())->assertRedirect('login');
    }

    /**
     * @test
     */
    public function a_user_can_create_a_message(): void
    {
        $this->singIn();

        $attributes = [
            'body' => $this->faker->text(50)
        ];

        $this->post('messages', $attributes)->assertRedirect('/');
    }
}
