<?php

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Message::class, 30)->create()->each(function ($message) {
            $randomUser = User::inRandomOrder()->first();
            $message->user()->associate($randomUser);
            $message->save();
        });
    }
}
