<?php

namespace App\Mail;

use App\Models\TempMemb;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MembershipConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $membership;

    public function __construct(TempMemb $membership)
    {
        $this->membership = $membership;
    }

    public function build()
    {
        return $this->subject('CHWRA Membership Application Received')
                    ->view('emails.membership_confirmation');
    }
}