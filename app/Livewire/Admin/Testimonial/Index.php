<?php

namespace App\Livewire\Admin\Testimonial;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Testimonial;

class Index extends Component
{
    use WithPagination;

    public $testimonial;
    public $none = "";
    public $confirmingTestimonialDeletion = false;

    protected $paginationTheme = 'tailwind';

    // Préparer la suppression
    public function confirmDelete($id)
    {
        $this->testimonial = Testimonial::findOrFail($id);
        $this->confirmingTestimonialDeletion = true;
    }

    // Supprimer le témoignage
    public function deleteTestimonial()
    {
        if ($this->testimonial) {
            $this->testimonial->delete();
        }
        $this->confirmingTestimonialDeletion = false;
        session()->flash('message', 'Témoignage supprimé avec succès.');
    }

    // Mettre à jour le statut d'approbation
    public function toggleApproval($id)
    {
        $testimonial = Testimonial::find($id);
        if (!$testimonial) return;

        $testimonial->update([
            'is_approved' => !$testimonial->is_approved
        ]);
    }

    public function render()
    {
        $testimonials = Testimonial::with('user')
                                   ->orderBy('id', 'DESC')
                                   ->paginate(10);

        $this->none = "Aucun témoignage ajouté pour l’instant.";

        return view('livewire.admin.testimonial.index', compact('testimonials'));
    }
}
