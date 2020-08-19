<?php


namespace App\Services;


use App\Models\Message;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class MessageService
{
    public function getAll(): LengthAwarePaginator
    {
        return Message::orderBy('created_at', 'DESC')->paginate(15);
    }

    public function getByUser(User $user): LengthAwarePaginator
    {
        return Message::where('user_id')->orderBy('created_at', 'DESC')->paginate(15);
    }

    public function create(array $validatedRequest, User $user): bool
    {
        $message = new Message();
        $message->body = $validatedRequest['body'];
        $message->user()->associate($user);

        return $message->save();
    }
}