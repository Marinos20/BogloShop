<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
{
    /**
     * Liste des témoignages (Admin) avec pagination
     */
    public function index()
    {
        $testimonials = Testimonial::with('user')->latest()->paginate(10);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Formulaire édition d’un témoignage
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Mise à jour d’un témoignage
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            'message'     => 'required|string',
            'rating'      => 'required|integer|min:1|max:5',
            'is_approved' => 'sometimes|boolean',
        ]);

        $testimonial->update([
            'message'     => $request->message,
            'rating'      => $request->rating,
            'is_approved' => $request->has('is_approved') ? 1 : 0,
        ]);

        return redirect()->route('testimonials.index')
                         ->with('success', 'Témoignage mis à jour avec succès.');
    }

    /**
     * Suppression d’un témoignage
     */
    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonials.index')
                         ->with('success', 'Témoignage supprimé avec succès.');
    }
}
