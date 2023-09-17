<?php

use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
use App\Livewire\CatDetail;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\PostDetail;
use App\Livewire\Register;
use App\Livewire\ResetPass;
use App\Livewire\SearchResult;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\RecordPageViews;
use App\Http\Middleware\RecordPostViews;
use App\Livewire\ChangePass;
use App\Livewire\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Home::class)->name('index')->middleware(RecordPageViews::class);
Route::get('login', Login::class)->name('login');
Route::get('register', Register::class)->name('register');
Route::get('reset_pass', ResetPass::class)->name('reset_pass');
Route::get('login/google', function () {
    return Socialite::driver('google')->redirect();
})->name('login_google');
Route::get('post/{id}',PostDetail::class)->name('post_detail')->middleware(RecordPostViews::class);
Route::get('category/{id}', CatDetail::class)->name('category');
Route::get('search/{key}',SearchResult::class)->name('search_results');
Route::get('login/google/callback', function () {
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::updateOrCreate([
        'email' => $googleUser->email,
    ], [
        'name' => $googleUser->name,
        'google_id' => $googleUser->id,
    ]);

    Auth::login($user);

    return redirect()->route('index');

    // $user->token
});
Route::get('profile',Profile::class)->name('profile')->middleware(Authenticate::class);
Route::get('change_pass',ChangePass::class)->name('change_pass')->middleware(Authenticate::class);
