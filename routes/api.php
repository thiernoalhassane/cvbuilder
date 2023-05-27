<?php

use App\Http\Controllers\Api\v1\SectionInformationController;
use App\Http\Controllers\Api\v1\UserController;
use App\Http\Controllers\CountResumeController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\RecoveryPasswordController;
use App\Http\Controllers\ResumeController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function()
{
    Route::get('logout',[UserController::class,'logout']);
    Route::post('listUser',[UserController::class,'listUser']);
    Route::post('updateUser',[UserController::class,'update']);
    Route::post('countUser',[UserController::class,'countUser']);
    Route::post('countResume',CountResumeController::class);


});
Route::get('testLogin',[UserController::class,'test']);
Route::post('createUser',[UserController::class,'store']);
Route::post('login',[UserController::class,'login']);
Route::post('verifyEmail',EmailVerificationController::class);
Route::post('recoveryPassword',RecoveryPasswordController::class);
Route::post('addSectionInformation',[SectionInformationController::class,'store']);
Route::post('updateSectionInformation',[SectionInformationController::class,'update']);
Route::post('resumeUser',ResumeController::class);

Route::post('invite',[InviteController::class],'process')->name('process');
// {token} is a required parameter that will be exposed to us in the controller method
Route::get('accept/{token}', 'InviteController@accept')->name('accept');
/*
Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found. If error persists, contact groupe5',
        "status"=> Response::$statusTexts[Response::HTTP_NOT_FOUND],
        "code"=> Response::HTTP_NOT_FOUND,

        ],
        Response::HTTP_NOT_FOUND);
});
*/
