<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        // Validation des champs du formulaire
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        try {
            // Envoi de l'email avec la vue blade "contact-message"
            Mail::send('frontend.emails.contact-message', [
                'name'        => $request->name,
                'email'       => $request->email,
                'userMessage' => $request->message,
            ], function ($mail) use ($request) {
                $mail->to('medium@boglo.shop')                     // Destinataire
                     ->from('medium@boglo.shop', 'BOGLO SPIRITUALITÉ')       // Expéditeur pro
                     ->replyTo($request->email, $request->name)              // Réponse vers l’utilisateur
                     ->subject('Nouveau message de contact');
            });
        } catch (\Exception $e) {
            // Log en cas d'erreur SMTP ou autre
            Log::error('Erreur envoi email contact : ' . $e->getMessage());
            return back()->with('error', 'Une erreur est survenue lors de l’envoi du message.');
        }

        // Préparation du message WhatsApp pour redirection
        $name = $request->input('name');
        $email = $request->input('email');
        $message = $request->input('message');
        $fullMessage = urlencode("Nom: $name\nEmail: $email\nMessage: $message");

        // Numéro WhatsApp sans le +
        $whatsappNumber = '2290165887725'; // Remplace par ton numéro

        // Retourne une vue qui redirige vers WhatsApp
        return response()->view('frontend.contact.redirect-whatsapp', [
            'whatsappUrl' => "https://wa.me/$whatsappNumber?text=$fullMessage",
        ]);
    }
}
