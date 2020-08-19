<?php


namespace App\Http\Controllers;


use App\Models\Message;
use App\Models\User;
use App\Services\MessageService;

class UserController extends Controller
{
    public function show(User $user, MessageService $messageService)
    {
        $messages = $messageService->getByUser($user);

        return view('user.show', [
            'user' => $user,
            'messages' => $messages
        ]);
    }
}