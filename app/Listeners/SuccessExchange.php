<?php

namespace App\Listeners;

use App\Mail\ExchangeMail;
use App\Mail\ExchangeMailFor2User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Events\SuccessExchange as SuccessExchangeEvent;


class SuccessExchange
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SuccessExchangeEvent $event)
    {
        Mail::to($event->user1->email)->send(new ExchangeMail($event->user1, $event->user2, $event->book1, $event->book2));
        Mail::to($event->user2->email)->send(new ExchangeMailFor2User($event->user1, $event->user2, $event->book1, $event->book2));
    }
}
