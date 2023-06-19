<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\PeopleController;
use App\Http\Controllers\api\UserController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });





Route::middleware('web')->get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect()->getTargetUrl();
    
    return response()->json([
        'redirectUrl' => $redirectUrl
    ]);
});
 
Route::middleware('web')->get('/auth/callback', function (Request $request) {

    $request->session()->put('state',csrf_token());

    $providerUser = Socialite::driver('github')->user();
    
    $user = User::firstOrCreate(['email'=> $providerUser->getEmail()],['provider_id'=>$providerUser->getId(), 'provider'=>'github','password'=>$providerUser->getNickname(), 'nickname'=>$providerUser->getNickname()]);

    return redirect("http://localhost:5173/home/user=".$providerUser->getId());
    //$user->token
});

Route::get('user', [UserController::class, 'index']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::post('user', [UserController::class, 'store']);
Route::post('login', function(Request $request){
    $credentials = $request->only(['email','password']);

    if(! $token=auth()->attempt($credentials)){
        abort(401, "Unauthorized");
    }

    return response()->json([
        'data' => [
            'token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]
        ]);
});

Route::middleware('apiJWT')->get('people', [PeopleController::class, 'index']);
Route::post('people', [PeopleController::class, 'store']);