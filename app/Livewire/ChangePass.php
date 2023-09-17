<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Auth;

class ChangePass extends Component
{
    #[Rule('required|min:8|string')]
    public $newPass;
    #[Rule('required|min:8|string|same:newPass')]
    public $renewPass;
    public function update()
    {
        $this->validate();
        Auth::user()->password = Hash::make($this->newPass);
        Auth::user()->save();
        $this->reset('newPass','renewPass');
        session()->flash('success', 'Password has been updated');
        $this->dispatch('update');
    }
    #[Layout('layout')]
    public function render()
    {
        return view('livewire.change-pass');
    }
}
