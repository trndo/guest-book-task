<?php

namespace App\Http\Controllers;

use App\Services\MessageService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @param MessageService $messageService
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MessageService $messageService)
    {
        $messages = $messageService->getAll();

        return view('home.index', [
            'messages' => $messages
        ]);
    }
}
