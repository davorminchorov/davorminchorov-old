<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class SendContactEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * @var Collection
     */
    public $contactDetails;

    /**
     * Create a new message instance.
     *
     * @param $contactDetails
     */
    public function __construct($contactDetails)
    {
        $this->contactDetails = collect($contactDetails);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        return $this->to('davorminchorov@gmail.com', 'Davor Minchorov')
                   ->from('info@davorminchorov.com', $this->contactDetails->get('name').' ('.$this->contactDetails->get('email').')')
                   ->subject('Davor Minchorov, you have a message from '.$this->contactDetails->get('name').' ('.$this->contactDetails->get('email').')')
                   ->replyTo($this->contactDetails->get('email'), $this->contactDetails->get('name'))
                   ->markdown('emails.contact');
    }
}
