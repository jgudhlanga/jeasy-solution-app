<?php

namespace App\Modules\Events\Mails;

use App\Modules\Events\Models\Event;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationConfirmationEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $event;

    public function __construct(User $user, Event $event)
    {
        $this->user = $user;
        $this->event = $event;
    }

    public function build()
    {
        return $this->view('emails.events.event-registration-confirmation')
            ->with('user', $this->user)
            ->with('event', $this->event);
    }
}
