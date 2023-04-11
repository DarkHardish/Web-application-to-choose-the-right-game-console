<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\QuestionnaireController;
use App\Http\Controllers\PytaniaController;
use App\Http\Controllers\Frontend\CommentController;
use App\Http\Controllers\Frontend\QuestionsController;
use App\Http\Controllers\Frontend\GalleryController;
use App\Http\Controllers\UploadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[FrontendController::class, 'index'])->name('dom');




Route::get('/Konsole/{id}/{nazwa}',[FrontendController::class,'detail']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('comments',[App\Http\Controllers\Frontend\CommentController::class, 'store']);

Route::post('delete-comment',[App\Http\Controllers\Frontend\CommentController::class, 'destroy']);

Route::post('delete-reply',[App\Http\Controllers\Frontend\CommentController::class, 'destroy']);



Route::get('/first-question', 'Frontend\QuestionsController@firstQuestion')->name('first_question');
Route::post('/handle-first-question', 'Frontend\QuestionsController@handleFirstQuestion')->name('handle_first_question');
Route::post('/handle-next-question', 'Frontend\QuestionsController@handleNextQuestion')->name('handle_next_question');
Route::get('/next-question', 'Frontend\QuestionsController@nextQuestion')->name('next_question');
Route::get('/show-answers', 'Frontend\QuestionsController@showAnswers')->name('show_answers');



Route::post('replies', 'Frontend\CommentController@storeReply')->name('replies.store');
Route::put('/replies/{id}', 'Frontend\CommentController@update')->name('replies.update');
Route::delete('/replies/{id}', 'Frontend\CommentController@destroy')->name('replies.destroy');



Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');

Route::put('/comments/replies/{id}', [CommentController::class, 'update_reply'])->name('reply.update');


route::get('/konsole',[FrontendController::class, 'filter'])->name('filter');
Route::get('/konsole/reset', [FrontendController::class,'reset'])->name('console.reset');

Route::get('/Test',[QuestionsController::class, 'test']);
Route::any('/questionnaire/{id}', [QuestionsController::class, 'test']);
Route::any('/pytania', [QuestionsController::class, 'pytania']);
Route::any('/konsole',[FrontendController::class, 'konsole'])->name('konsole');
Route::any('/informacje',[FrontendController::class, 'informacje'])->name('informacje');
Route::get('/congratulations', [QuestionsController::class, 'congratulations']);

