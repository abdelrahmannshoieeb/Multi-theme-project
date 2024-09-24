<?php

namespace App\Livewire;

use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AccountForm extends Component
{

    public $first_name;
    public $last_name;
    public $display_name;
    public $email;
    public $current_password;
    public $new_password;
    public $new_password_confirmation; // Use this for confirmation

    public function mount()
    {
        $user = Auth::user();
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->display_name = $user->display_name;
        $this->email = $user->email;
    }

    public function updateUserDetails()
    {
        // Validate input
        $this->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'current_password' => 'nullable|current_password', // Ensure current password matches
            'new_password' => 'nullable|min:6|confirmed', // Check password confirmation
        ]);

        $user = Auth::user();
        $user->first_name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->display_name = $this->display_name;
        $user->email = $this->email;

        // Only update the password if a new one was provided and confirmed
        if (!empty($this->new_password)) {
            $user->password = Hash::make($this->new_password);
        }

        $user->save();
    
     
    }
 public function render()
    {
        return view('livewire.account-form');
    }
}
