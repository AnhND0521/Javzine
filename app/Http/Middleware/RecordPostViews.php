<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;
use App\Models\PostView;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
class RecordPostViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $postId = $request->route('id');
        $viewDate = Carbon::now()->toDateString();
        $post = Post::find($postId);
        $post->view = $post->view + 1;
        $post->save();
        $postView = PostView::firstOrNew(['post_id' => $postId, 'view_date' => $viewDate]);
        $postView->views += 1;
        $postView->save();
        return $next($request);
    }
}
