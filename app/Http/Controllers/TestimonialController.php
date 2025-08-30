<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Auth;

class TestimonialController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store']);
    }

    public function index()
    {
        $testimonials = Testimonial::with('user')
                                   ->where('is_approved', true)
                                   ->latest()
                                   ->get();

        return view('frontend.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('frontend.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:500',
            'rating'  => 'required|integer|min:1|max:5',
        ]);

        Testimonial::create([
            'user_id'     => Auth::id(),
            'message'     => $request->message,
            'rating'      => $request->rating,
            'is_approved' => false,
        ]);

        // Pas de redirect vers une autre page, on reste sur la même
        return back()->with('success', 'Merci ! Votre témoignage a été soumis et sera publié après validation.');
    }
}
