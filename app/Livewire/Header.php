<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Post;
use Livewire\Attributes\On; 
class Header extends Component
{
    public $key = '';
    public $userAvatar;
    public $searchPosts;
    public function mount(){
        $this->getAvatar();
    }
    public function search()
    {
        $this->searchPosts = Post::where('published', 1)->where('title', 'LIKE', '%' . $this->key . '%')->get();
    }
    public function getAvatar()
    {
        if (Auth::check())
            $this->userAvatar = Auth::user()->avatar;
    }
    #[On('updateAvatar')] 
    public function updateAvatar()
    {
        $this->getAvatar();
    }
    public function sendKey()
    {
        if ($this->key != '')
            return redirect()->route('search_results', $this->key);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
    public function resetKey()
    {
        $this->reset('key');
    }
    public function render()
    {
        return view('livewire.header', [
            'cats' => Category::all()
        ]);
    }
}
