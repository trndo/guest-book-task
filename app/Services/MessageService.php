<?php


namespace App\Services;

use App\Models\Message;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;

class MessageService
{
    /**
     * Get all messages
     *
     * @param int $rowPerPage Number of rows per page
     * @return LengthAwarePaginator
     */
    public function getAll(int $rowPerPage = 15): LengthAwarePaginator
    {
        return Message::orderBy('created_at', 'DESC')->paginate($rowPerPage);
    }

    /**
     * Get messages by user
     *
     * @param User $user
     * @param int $rowPerPage Number of rows per page
     * @return LengthAwarePaginator
     */
    public function getByUser(
        User $user,
        int $rowPerPage = 15
    ): LengthAwarePaginator {
        return Message::where('user_id', $user)->orderBy('created_at', 'DESC')
            ->paginate($rowPerPage);
    }

    /**
     * Create message
     *
     * @param array $validatedData
     * @param User $user
     * @return bool
     */
    public function create(array $validatedData, User $user): bool
    {
        $message = new Message();
        $message->body = $validatedData['body'];
        $message->user()->associate($user);

        return $message->save();
    }

    /**
     * Delete message
     *
     * @param Message $message
     * @return bool|null
     * @throws \Exception
     */
    public function delete(Message $message): ?bool
    {
        return $message->delete();
    }
}