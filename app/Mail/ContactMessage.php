<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $messageContent;

    public function __construct($name, $email, $messageContent)
    {
        $this->name = $name;
        $this->email = $email;
        $this->messageContent = $messageContent;
    }

    public function build()
    {
        return $this->from('medium@boglo.shop', 'BOGLO SPIRITUALITÉ') // expéditeur légal
                    ->replyTo($this->email, $this->name)             // réponse à l’utilisateur
                    ->subject('Nouveau message de contact')
                    ->view('emails.contact-message')                 // vue du mail
                    ->with([
                        'nom' => $this->name,
                        'email_utilisateur' => $this->email,
                        'message_utilisateur' => $this->messageContent,
                    ]);
    }
}
