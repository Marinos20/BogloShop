<?php

namespace App\Livewire\Frontend\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPassword extends Component
{
    public $token;
    public $email;
    public $password;
    public $password_confirmation;
    public $status;

    protected $rules = [
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8'
    ];

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            $this->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password),
                ])->save();
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            $this->status = __('Password reset successfully.');
            return redirect()->route('login')->with('status', $this->status);
        } else {
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('livewire.frontend.auth.reset-password');
    }
}
