<?php

use App\Http\Controllers\APIQuestionnaireController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('/toutes-les-reponses', [APIQuestionnaireController::class, 'toutesLesReponses'])->name('api.toutes-les-reponses');
    Route::get('/reponse-par-email/{email}', [APIQuestionnaireController::class, 'reponseParEmail'])->name('api.reponse-par-email');
    Route::get('/reponse-individuellement/{id}', [APIQuestionnaireController::class, 'reponseIndividuellement'])->name('api.reponse-individuellement');
});


