<?php


namespace App\Http\Controllers;


use App\Http\Requests\StoreMessageRequest;
use App\Services\MessageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.is_banned');
    }

    public function store(
        StoreMessageRequest $messageRequest,
        MessageService $messageService
    ) {
        $user = Auth::user();
        $messageService->create($messageRequest->validated(), $user);

        return redirect(route('home'));
    }
}