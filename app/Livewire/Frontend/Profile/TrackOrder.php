<?php

namespace App\Livewire\Frontend\Profile;

use Livewire\Component;
use App\Models\Order;

class TrackOrder extends Component
{
    public $trackingNo;
    public $order;

    public function mount($trackingNo = null)
    {
        $this->trackingNo = $trackingNo;

        if ($this->trackingNo) {
            // Récupérer la commande par tracking_no
            $this->order = Order::where('tracking_no', $this->trackingNo)->first();
        }
    }

    public function render()
    {
        return view('livewire.frontend.profile.track-order', [
            'order' => $this->order,
        ]);
    }
}
