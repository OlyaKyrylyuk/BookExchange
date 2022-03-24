<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Exchange;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function lookRequests()
    {
        $current_user = $user = auth()->user();
        $user_from = [];
        $request_book = [];

        $exchanges = Exchange::where('user2_id', $current_user->id)->where('status', '')->get();

        if ($exchanges->count()  !=0)
        {
            $user_from = User::where('id', $exchanges[0]->user1_id)->get();
            $request_book = Book::where('id', $exchanges[0]->book1_id)->get();
            foreach ($exchanges as $exchange)
            {
                $exchange->unread = 0;
                $exchange->save();
            }
        }



        return view('notifications.look_requests',['exchanges'=>$exchanges, 'user_from'=>$user_from, 'request_book'=>$request_book]);
    }
}
