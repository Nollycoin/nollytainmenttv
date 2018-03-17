<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PartnerAdded extends Mailable
{
    use Queueable, SerializesModels;

    public $publisher, $partner, $share, $walletAddress;
    /**
     * Create a new message instance.
     * @param $publisher
     * @param $partner
     * @param $share
     * @param $walletAddress
     */
    public function __construct($publisher, $partner, $share, $walletAddress)
    {
        $this->publisher = $publisher;
        $this->partner = $partner;
        $this->share = $share;
        $this->walletAddress = $walletAddress;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.partner_added')
            ->subject('Partner Registration');
    }
}
