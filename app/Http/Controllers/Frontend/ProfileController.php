<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Tableau de bord du profil
    public function index(){
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->latest()->take(5)->get(); // 5 dernières commandes
        $userDetail = UserDetails::where('user_id', $user->id)->first();

        return view('frontend.profile.index', compact('user', 'orders', 'userDetail'));
    }

    // Suivi d'une commande
    public function track($trackingNo){
        $order = Order::where('tracking_no', $trackingNo)->first();

        if($order){
            // ✅ On passe $trackingNo en plus de $order pour Livewire
            return view('frontend.profile.track-order', compact('order', 'trackingNo'));
        }else{
            return abort(404);
        }
    }

    // Historique de toutes les commandes
    public function orders(){
        $orders = Order::where('user_id', Auth::id())->latest()->paginate(10);
        return view('frontend.profile.orders', compact('orders'));
    }

    // Afficher les infos personnelles
    public function info(){
        $user = Auth::user();
        $userDetail = UserDetails::where('user_id', $user->id)->first();

        return view('frontend.profile.info', compact('user', 'userDetail'));
    }

    // Sauvegarder les infos personnelles
    public function updateInfo(Request $request){
        $request->validate([
            'full_name' => 'required|string|max:255',
            'phone'     => 'nullable|string|max:20',
            'address'   => 'nullable|string|max:255',
            'gender'    => 'nullable|string',
            'bio'       => 'nullable|string|max:500',
        ]);

        $user = Auth::user();

        // Mettre à jour UserDetails
        $userDetail = UserDetails::updateOrCreate(
            ['user_id' => $user->id],
            [
                'full_name' => $request->full_name,
                'email'     => $user->email,
                'phone'     => $request->phone,
                'gender'    => $request->gender,
                'address'   => $request->address,
                'bio'       => $request->bio,
            ]
        );

        // Mettre à jour le modèle User de base
        $user->update([
            'name' => $request->full_name,
        ]);

        return back()->with('success', '✅ Profil mis à jour avec succès.');
    }

    // Notifications (à préparer si tu envoies des alertes)
    public function notifications(){
        $notifications = Auth::user()->notifications()->paginate(10);
        return view('frontend.profile.notifications', compact('notifications'));
    }
}
