<?php

namespace App\Http\Controllers;

use App\Services\MessageService;
use Illuminate\View\View;

class HomeController extends Controller
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
     * Show all messages on homepage
     *
     * @return View
     */
    public function index(): View
    {
        $messages = $this->messageService->getAll();

        return view('home.index', [
            'messages' => $messages
        ]);
    }
}
