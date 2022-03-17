<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OldPostApiController;
use App\Http\Controllers\Api\PostApiController;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

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

Route::get("/posts", [OldPostApiController::class, "index"]);
Route::get("/posts/{post}", [OldPostApiController::class, "show"]);
Route::post("/posts}", [OldPostApiController::class, "store"]);
Route::put("/posts/{post}", [OldPostApiController::class, "update"]);
Route::delete("/posts/{post}", [OldPostApiController::class, "destroy"]);

Route::apiResource("posts", PostApiController::class);


Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);
 
    $user = User::where('email', $request->email)->first();
 
    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }
 
    return $user->createToken($request->device_name)->plainTextToken;
});

// Youssef: 1|qwZYoDLPWrrnclVs2llatwPLsCKqVBTp5cAxoKhI
// Serag:   2|REgwhgFNsyamyJ9mzVZXmZzcjtHRgxAXJn7Vlsfl
