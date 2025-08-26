<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMessage;

class ContactForm extends Component
{
    public $name;
    public $email;
    public $message;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'message' => 'required|min:5',
    ];

    public function submit()
    {
        $this->validate();

        // Envoi du mail vers ton adresse pro avec replyTo = utilisateur
        Mail::to('medium@boglo.shop')->send(
            (new ContactMessage($this->name, $this->email, $this->message))
                ->from('medium@boglo.shop', 'BOGLO SPIRITUALITÉ') // expéditeur pro
                ->replyTo($this->email, $this->name)             // réponse vers l'utilisateur
        );

        // Message de confirmation
        session()->flash('success', 'Message envoyé avec succès !');

        // Réinitialisation des champs
        $this->reset(['name', 'email', 'message']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
