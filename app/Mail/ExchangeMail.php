<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ExchangeMail extends Mailable
{
    use Queueable, SerializesModels;
    public $user1;
    public $user2;
    public $book1;
    public $book2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user1, $user2, $book1, $book2)
    {
        $this->user1 = $user1;
        $this->user2 = $user2;
        $this->book1 = $book1;
        $this->book2 = $book2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('email.exchange')
            ->subject('Book exchange was created!')
            ->with([
                       'user1' => $this->user1,
                       'user2' => $this->user2,
                       'book1' => $this->book1,
                       'book2' => $this->book2
                   ]);
    }
}
