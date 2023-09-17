<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PageView;
use Carbon\Carbon;

class RecordPageViews
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $page =  $request->getPathInfo();
        $viewDate = Carbon::now()->toDateString();
        $pageView = PageView::firstOrNew(['page' => $page, 'view_at' => $viewDate]);
        $pageView->views++;
        $pageView->save();
        return $next($request);
    }
}
