<?php


namespace App\Http\Controllers;


use App\Http\Requests\StoreMessageRequest;
use App\Services\MessageService;
use Illuminate\Http\RedirectResponse;

class MessageController extends Controller
{
    /**
     * @var MessageService
     */
    protected $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }

    /**
     * Save message after validation
     *
     * @param StoreMessageRequest $messageRequest
     * @return RedirectResponse
     */
    public function store(StoreMessageRequest $messageRequest): RedirectResponse
    {
        $user = auth()->user();
        $this->messageService->create($messageRequest->validated(), $user);

        return redirect()->route('home');
    }
}