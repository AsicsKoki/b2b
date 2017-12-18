<?php

namespace App\Mail;

use App\User as User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Template extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = '';
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user,$subject)
    {
        $this->user = $user;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('nemanjasredojevicneca@gmail.com')->subject($this->subject)->view('emails.confirmation');
    }
}
