<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use App\Models\Comment;
use App\Models\Feedback;
use App\Models\Notification;
use App\Events\NotificationEvent;
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
    public function getFacebookShareUrl($postId)
    {
        $postUrl = urlencode(route('post_detail', $postId));
        return 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode($postUrl);
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
        $notification = Notification::create([
            'body' => "誰かがあなたの投稿にコメントした。",
            'post_id' => $this->post->id,
            'user_id' => $this->post->user->id
        ]);
        event(new NotificationEvent([
            'id' => $notification->id,
            'body' => $notification->body,
            'post_id' => $notification->post_id,
            'created_at' => $notification->created_at->toDateTimeString(),
        ], $this->post->user->id));
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
