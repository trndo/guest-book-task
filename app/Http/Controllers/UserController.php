<?php


namespace App\Http\Controllers;


use App\Models\User;
use App\Services\MessageService;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @var MessageService
     */
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * Show user profile with all messages
     *
     * @param User $user
     * @return \Illuminate\View\View
     */
    public function show(User $user): View
    {
        $messages = $this->messageService->getByUser($user);

        return view('user.show', [
            'user' => $user,
            'messages' => $messages
        ]);
    }
}