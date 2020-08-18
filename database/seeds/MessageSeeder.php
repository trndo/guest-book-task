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
        $randomUser = User::inRandomOrder()->first();

        factory(Message::class, 30)->create()
            ->each(function ($message) use ($randomUser) {
                $message->user()->associate($randomUser);
                $message->save();
        });
    }
}
