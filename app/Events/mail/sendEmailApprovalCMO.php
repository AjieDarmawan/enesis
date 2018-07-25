<?php

namespace App\Events\mail;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use App/Approver;
class sendEmailApprovalCMO
{
    use Dispatchable, SerializesModels;

    public $Approver;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Approver $Approver;)
    {
        $this->approver = $Approver;
		dd($this->approver);
    }

}
