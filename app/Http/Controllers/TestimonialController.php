<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    // Assure que l'utilisateur est connecté pour certaines actions
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }

    // Afficher tous les témoignages (page publique)
    public function index()
    {
        $testimonials = Testimonial::latest()->get();
        return view('testimonials.index', compact('testimonials'));
    }

    // Formulaire pour créer un témoignage (utilisateur connecté)
    public function create()
    {
        return view('testimonials.create');
    }

    // Enregistrer un nouveau témoignage
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'message' => $request->message,
            'rating' => $request->rating,
        ]);

        return redirect()->route('testimonials.index')
                         ->with('success', 'Merci ! Votre témoignage a été publié.');
    }
}
