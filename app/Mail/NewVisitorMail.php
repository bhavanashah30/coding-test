<?php

namespace App\Mail;

use App\Models\InterestedVisitor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewVisitorMail extends Mailable
{
    use Queueable, SerializesModels;

    private $interestedVisitor;

    public function __construct(InterestedVisitor $interestedVisitor)
    {
        $this->interestedVisitor = $interestedVisitor;
    }

    public function build()
    {
        $interestedVisitor = $this->interestedVisitor;
        return $this->subject('New Interested Visitor.')
            ->view('mails.visitorInfo', compact('interestedVisitor'));
    }

}
