<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;

class Profile extends Component
{
    use WithFileUploads;
    #[Rule('image|max:1024|nullable')] // 1MB Max
    public $avatar;
    public $currentAvatar;
    #[Rule('string|required')]
    public $name;
    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->updateImg();
    }
    public function updateImg()
    {
        $this->currentAvatar = Auth::user()->avatar;
    }
    public function update()
    {
        $this->validate();
        if ($this->avatar) {
            $path = $this->avatar->store('images', 'public');
            Auth::user()->update([
                'name' => $this->name,
                'avatar' => $path
            ]);
            $this->dispatch('updateAvatar');
        } else {
            Auth::user()->update([
                'name' => $this->name,
            ]);
        }
        $this->reset('avatar');
        $this->updateImg();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
    public function favoritePost($id)
    {
        if (Auth::check()) {
            $favorite = Favorite::where('post_id', $id)->where('user_id', Auth::user()->id)->first();
            if ($favorite) {
                $favorite->delete();
            } else {
                Favorite::create([
                    'user_id' => Auth::user()->id,
                    'post_id' => $id
                ]);
            }
        }
        // else {
        //     session()->flash('error','Bạn cần đăng nhập để thêm bài viết yêu thích!');
        //     $this->dispatch('favorite');
        // }
    }
    public function render()
    {
        return view(
            'livewire.profile',
            ['favoritePosts' => Auth::user()->favoritePosts]
        );
    }
}
