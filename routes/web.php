<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


//----------------------------------------------------------------{{Home}}--------------------------------------------------
    Route::get('/',\App\Livewire\Home\Index::class)->name('home');
    Route::get('/contact',\App\Livewire\Home\Contact::class)->name('contact');
    Route::get('/about',\App\Livewire\Home\About::class)->name('about');
    Route::get('/history',\App\Livewire\Home\History::class)->name('history');
    Route::get('/queztions',\App\Livewire\Home\Queztions::class)->name('queztions');
    Route::get('/projects',\App\Livewire\Home\Post::class)->name('projects');
    Route::get('/news',\App\Livewire\Home\News::class)->name('news');
    Route::get('/projects/{id}',\App\Livewire\Home\PostDetails::class)->name('projects.details');
    Route::get('/news/{id}',\App\Livewire\Home\NewDetails::class)->name('news.details');
    Route::get('/events/{id}',\App\Livewire\Home\EventDetail::class)->name('events.details');
    Route::get('/events/',\App\Livewire\Home\Event::class)->name('events');
    Route::get('/login',\App\Livewire\Home\login::class)->name('login');
    Route::get('/profile',\App\Livewire\Home\Profile::class)->name('profile')->middleware('auth');

//----------------------------------------------------------------{{Admin}}--------------------------------------------------
Route::prefix('admin')->group(function (){
    Route::get('/dashboard',\App\Livewire\Admin\Index::class)->name('dashboard');
//    -----------------------------------------{{Users}}----------------------------------------------------------------------
    Route::get('/user/list',\App\Livewire\Admin\Users\Index::class)->name('user.list');
    Route::get('/user/create',\App\Livewire\Admin\Users\Create::class)->name('user.create');
    Route::get('/user/update/{id}',\App\Livewire\Admin\Users\Update::class)->name('user.update');
    Route::get('/user/trash',\App\Livewire\Admin\Users\Trash::class)->name('user.trash');
//    -----------------------------------------{{News}}----------------------------------------------------------------------
    Route::get('/news/list',\App\Livewire\Admin\News\Index::class)->name('news.list');
    Route::get('/news/create',\App\Livewire\Admin\News\Create::class)->name('news.create');
    Route::get('/news/update/{id}',\App\Livewire\Admin\News\Update::class)->name('news.update');
    Route::get('/news/trash',\App\Livewire\Admin\News\Trash::class)->name('news.trash');
    Route::post('/ckeditor/upload',[\App\Http\Controllers\UploadeFileController::class,'upload_file'])->name('ckeditor.upload');
//    -----------------------------------------{{Events}}----------------------------------------------------------------------
    Route::get('/event/list',\App\Livewire\Admin\Events\Index::class)->name('event.list');
    Route::get('/event/create',\App\Livewire\Admin\Events\Create::class)->name('event.create');
    Route::get('/event/update/{id}',\App\Livewire\Admin\Events\Update::class)->name('event.update');
    Route::get('/event/trash',\App\Livewire\Admin\Events\Trash::class)->name('event.trash');
//    -----------------------------------------{{Events}}----------------------------------------------------------------------
    Route::get('/post/list',\App\Livewire\Admin\Project\Index::class)->name('post.list');
    Route::get('/post/create',\App\Livewire\Admin\Project\Create::class)->name('post.create');
    Route::get('/post/update/{id}',\App\Livewire\Admin\Project\Update::class)->name('post.update');
    Route::get('/post/trash',\App\Livewire\Admin\Project\Trash::class)->name('post.trash');
//    -----------------------------------------{{Slider}}----------------------------------------------------------------------
    Route::get('/slider/list',\App\Livewire\Admin\Slider\Index::class)->name('slider.list');
    Route::get('/slider/create',\App\Livewire\Admin\Slider\Create::class)->name('slider.create');
    Route::get('/slider/update/{id}',\App\Livewire\Admin\Slider\Update::class)->name('slider.update');
    //    -----------------------------------------{{History}}----------------------------------------------------------------------
    Route::get('/history/list',\App\Livewire\Admin\History\Index::class)->name('history.list');
    Route::get('/history/create',\App\Livewire\Admin\History\Create::class)->name('history.create');
    Route::get('/history/update/{id}',\App\Livewire\Admin\History\Update::class)->name('history.update');
    //    -----------------------------------------{{Staff}}----------------------------------------------------------------------
    Route::get('/staff/list/{id}',\App\Livewire\Admin\History\Staff\Index::class)->name('staff.list');
    Route::get('/staff/create/{id}',\App\Livewire\Admin\History\Staff\Create::class)->name('staff.create');
    Route::get('/staff/update/{id}',\App\Livewire\Admin\History\Staff\Update::class)->name('staff.update');
//    -----------------------------------------{{Setting}}----------------------------------------------------------------------
    Route::get('/settings/list',\App\Livewire\Admin\Setting\Index::class)->name('setting.list');
    Route::get('/settings/queztions/list',\App\Livewire\Admin\Queztions\Index::class)->name('setting.queztions.list');
    Route::get('/settings/queztions/create',\App\Livewire\Admin\Queztions\Create::class)->name('setting.queztions.create');
    Route::get('/settings/queztions/update\{id}',\App\Livewire\Admin\Queztions\Update::class)->name('setting.queztions.update');


});

//----------------------------------------------------------------->End
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';
