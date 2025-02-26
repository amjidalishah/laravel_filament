<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\QR;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::post('/qr', function (Request $request) {
        $qr = QR::create([
            'title' => $request->title,
            'target_domain' => $request->target_domain,
            'origin_domain' => url("api/v1/" . str()->uuid()),
        ]);
        return response()->json($qr);
    });
    
    Route::get('/qr/{id}', fn ($id) => response()->json(QR::findOrFail($id)));
    Route::delete('/qr/{id}', fn ($id) => QR::destroy($id));
    Route::get('/scan/{id}', fn ($id) => redirect(QR::findOrFail($id)->target_domain));
});