<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    #[Rule('required|email')]
    public $email;

    #[Rule('required|min:8|string')]
    public $password;
    #[Layout('layout')]
    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = User::where('email', $this->email)->first();
            Auth::login($user);
            $this->reset('email', 'password');
            return redirect('http://localhost:8080/Javzine/');
            // return redirect()->route('index');
        } else
        // return $this->redirect('./register',navigate:true);
        {
            session()->flash('error', 'Email or password is incorrect');
            $this->dispatch('login');
        }
    }
    public function render()
    {
        return view('livewire.login');
    }
}
