<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Mail\ResetPassMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Rule;
use Illuminate\Support\Str;

class ResetPass extends Component
{
    #[Rule('required|email')]
    public $email;
    public function resetPass()
    {
        $this->validate();
        if (empty(User::where('email', $this->email)->first())) {
            session()->flash('error', 'The email you entered does not exist in the system!!');
            $this->reset('email');
        } else {
            $password = Str::random(8);
            $new_pass = Hash::make($password);
            User::where('email', $this->email)->update(['password' => $new_pass]);
            $data = ['password' => $password];
            Mail::to($this->email)
                ->send(new ResetPassMail($data));
            $this->reset('email');
            session()->flash('success', 'Password sent to your email successfully!');
        }
        $this->dispatch('resetPass');

    }
    #[Layout('layout')]
    public function render()
    {
        return view('livewire.reset-pass');
    }
}
