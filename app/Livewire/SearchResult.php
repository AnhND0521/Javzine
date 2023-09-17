<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class SearchResult extends Component
{
    public $key;
    public $count = 10;
    public $max;
    public function mount($key)
    {
        $this->key = $key;
        $this->max = Post::where('published', 1)
            ->whereJsonContains('tags', [$this->key])
            ->orWhere('title', 'LIKE', "%{$this->key}%")
            ->count();
    }
    public function more()
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
        // dd($keyword);
        return view(
            'livewire.search-result',
            ['posts' =>  Post::where('published', 1)
                ->whereJsonContains('tags',[$this->key])
                ->orWhere('title', 'LIKE', "%{$this->key}%")
                ->take($this->count)
                ->get()]
        );
    }
}
