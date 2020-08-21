<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Services\MessageService;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    /**
     * @var MessageService
     */
    private $messageService;

    /**
     * MessageController constructor.
     * @param MessageService $messageService
     */
    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * Delete message action
     *
     * @param Message $message
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Message $message): RedirectResponse
    {
        $this->messageService->delete($message);

        return redirect()->route('home');
    }
}