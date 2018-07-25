<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CMOMail extends Mailable
{
    use Queueable, SerializesModels;

    public $wfApprover

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($wfApprover)
    {
        $this->wfApprover = $wfApprover;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        dd($wfApprover);
        return $this->view('mails.cmo');
    }
}
