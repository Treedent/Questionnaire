<?php

use App\Http\Livewire\ReponseForm;
use App\Http\Livewire\ReponseIndividuellement;
use App\Http\Livewire\ReponseParEmail;
use App\Http\Livewire\ToutesLesReponses;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/merci', function () {
    return view('merci');
})->name('merci');

Route::get('/questionnaire', ReponseForm::class)->name('questionnaire');

$authMiddleware = config('jetstream.guard')
    ? 'auth:'.config('jetstream.guard')
    : 'auth';

Route::group(['middleware' => [$authMiddleware, 'verified']], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/toutes-les-reponses', [toutesLesReponses::class, 'render'])
        ->name('toutes-les-reponses');
    Route::get('/reponse-par-email', [reponseParEmail::class, 'render'])
        ->name('reponse-par-email');
    Route::get('/reponse-individuellement', [reponseIndividuellement::class, 'render'])
        ->name('reponse-individuellement');

});
