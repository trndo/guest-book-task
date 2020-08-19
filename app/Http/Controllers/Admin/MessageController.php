<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Models\Message;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('check.is_admin');
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect(route('home'));
    }
}