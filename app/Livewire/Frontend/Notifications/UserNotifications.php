<?php

use App\Models\Notification;
use App\Models\NotificationSetting;
use Illuminate\Support\Facades\Auth;

class UserNotifications extends Component
{
    public $settings = [];

    public function mount()
    {
        $userId = Auth::id();

        // définir les types de notifications
        $types = ['like', 'comment', 'new_product', 'product_sale', 'payment'];

        // récupérer ou créer les réglages par défaut
        foreach ($types as $type) {
            $setting = NotificationSetting::firstOrCreate(
                ['user_id' => $userId, 'type' => $type],
                ['enabled' => true]
            );
            $this->settings[$type] = $setting->enabled;
        }
    }

    // Permet de cocher/décocher une notification
    public function toggleSetting($type)
    {
        $userId = Auth::id();
        $setting = NotificationSetting::where('user_id', $userId)
                                      ->where('type', $type)
                                      ->first();
        $setting->enabled = !$setting->enabled;
        $setting->save();
        $this->settings[$type] = $setting->enabled;
    }

    public function render()
    {
        $notifications = Notification::where('user_id', Auth::id())
                                     ->latest()
                                     ->get();

        return view('livewire.frontend.notifications.user-notifications', [
            'notifications' => $notifications,
        ]);
    }
}
