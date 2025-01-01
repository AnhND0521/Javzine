<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
    public $count = 10;
    public $max;
    public function mount()
    {
        $this->max = Post::where('published', 1)->count()-2;
    }
    public function add()
    {
        $this->count += 10;
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
        return view('livewire.home', [
            'posts' => Post::where('published', 1)->where('title','NOT LIKE','%Miso Ramen%')->where('title','NOT LIKE','%nóng mùa hè%')->orderBy('created_at', 'desc')->take($this->count)->get(),
            'trend' => Post::where('published', 1)->where('title','NOT LIKE','%Miso Ramen%')->where('title','NOT LIKE','%nóng mùa hè%')->orderBy('view', 'desc')->take(10)->get(),
            'cats' => Category::all(),
            'miso' => Post::where('published', 1)->where('title','LIKE','%Miso Ramen%')->first(),
            'natsu' => Post::where('published', 1)->where('title','LIKE','%nóng mùa hè%')->first(),
            'loggedin' => Auth::check()
        ]);
    }
}
