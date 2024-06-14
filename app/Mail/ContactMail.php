<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $msg;
    public $queryID;
    public $type;
    public $email;
    public $phone;

    /**
     * Create a new message instance.
     */
    public function __construct($subject, $phone, $msg, $queryID, $email, $type=NULL)
    {
        $this->subject = $subject . $queryID;
        $this->msg = $msg;
        $this->queryID = $queryID;
        $this->email = $email;
        $this->phone = $phone;
        $this->type = $type;
    }

    /**
     * Get the message envelope.
     */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Welcome Mail',
    //     );
    // }

    /**
     * Get the message content definition.
     */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'emails.welcome'
    //     );
    // }
    public function build()
    {
        return $this->subject($this->subject)
                    ->view('emails.contact')
                    ->with([
                        'type' => $this->type,
                        'msg' => $this->msg,
                        'queryID' => $this->queryID,
                        'email' => $this->email,
                        'phone' => $this->phone
                    ])
                    ->cc(env('MAIL_USERNAME'));
    }
    
    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
