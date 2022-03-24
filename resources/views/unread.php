<?php

use App\Models\Exchange;
$unread_messages = Exchange::where('unread', 1)->where('user2_id',  auth()->user()->id)->count();
echo $unread_messages;
