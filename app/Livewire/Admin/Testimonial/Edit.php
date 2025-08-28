<?php

namespace App\Livewire\Admin\Testimonial;

use Livewire\Component;
use App\Models\Testimonial;

class Edit extends Component
{
    public Testimonial $testimonial;

    public $message;
    public $rating;
    public $is_approved = false;

    public $confirmingTestimonialDeletion = false;

    protected $rules = [
        'message' => 'required|string|max:500',
        'rating' => 'required|integer|min:1|max:5',
        'is_approved' => 'required|boolean',
    ];

    public function mount(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
        $this->message = $testimonial->message;
        $this->rating = $testimonial->rating;
        $this->is_approved = $testimonial->is_approved;
    }

    // Méthode appelée par le bouton "Enregistrer"
    public function save()
    {
        $validatedData = $this->validate();

        $this->testimonial->update($validatedData);

        session()->flash('success', 'Témoignage mis à jour avec succès !');

        return redirect()->route('testimonials.index');
    }

    // Confirme la suppression
    public function confirmDelete()
    {
        $this->confirmingTestimonialDeletion = true;
    }

    // Supprime le témoignage
    public function deleteTestimonial()
    {
        $this->testimonial->delete();

        session()->flash('success', 'Témoignage supprimé avec succès !');

        return redirect()->route('testimonials.index');
    }

    public function render()
    {
        return view('livewire.admin.testimonial.edit');
    }
}
