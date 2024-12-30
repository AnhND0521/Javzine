<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;

class Register extends Component
{
    #[Rule('required|min:3')] 
    public $name;
    #[Rule('required|email|unique:users')] 
    public $email;
    #[Rule('required|min:8|string')] 
    public $password;
    #[Rule('required|min:8|string|same:password')] 
    public $re_password;
    public function store(){
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);
        redirect()->route('login');
    }




    #[Layout('layout')]
    public function render()
    {
        return view('livewire.register');
    }
}
