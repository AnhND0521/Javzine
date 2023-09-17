<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use App\Models\Comment;
use App\Models\Feedback;
use Illuminate\Support\Facades\Gate;

class PostDetail extends Component
{
    public Post $post;
    #[Rule('required|string')]
    public $body;

    public $content;
    public $id;
    public function mount($id)
    {
        $this->post = Post::find($id);
        $this->id = $id;
    }
    public function sendFeedback()
    {
        $this->validate([
            'content' => 'required|string'
        ]);
        Feedback::create([
            'content' => $this->content,
            'post_id' => $this->post->id
        ]);
        $this->reset('content');
        session()->flash('success', 'Cảm ơn góp ý của bạn.');
        $this->dispatch('feedback');
    }
    public function favoritePost($id)
    {
        // $this->authorize('viewPost', $this->post);
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
    public function Send()
    {
        // $this->authorize('viewPost', $this->post);
        $this->validate();
        Comment::create([
            'body' => $this->body,
            'user_id' => Auth::user()->id,
            'post_id' => $this->post->id,
        ]);
        $this->reset('body');
    }
    public function render()
    {
        // dd($this->post);
        if (!$this->post->published) {
            abort(403);
        }
        return view('livewire.post-detail', [
            'more' => Post::where('published', 1)->where('id', '!=', $this->post->id)->inRandomOrder()->take(1)->first(),
            'recomment' => Post::where('published', 1)->where('id', '!=', $this->post->id)->where('category_id', $this->post->category->id)->take(3)->get(),
            'comments' => $this->post->comments
        ]);
    }
}
