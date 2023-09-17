<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Post;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
class CatDetail extends Component
{
    public $id;
    public $cat;
    public $count = 10;
    public $max;
    public function mount($id)
    {
        $this->cat = Category::find($id);
        $this->id = $id;
        $this->max = $this->cat->posts->count();
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
    public function more(){
        $this->count += 10;
    }
    public function render()
    {
        return view('livewire.cat-detail', [
            'posts' => Category::find($this->id)->posts->where('published', 1)->take($this->count),
        ]);
    }
}
