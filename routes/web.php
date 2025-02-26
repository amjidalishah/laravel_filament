<?php

//use App\Models\QRCode;
use Illuminate\Support\Facades\Route;
 
use Filament\Facades\Filament;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/qr/{uuid}', function ($uuid) {
//     $qrCode = QRCode::where('uuid', $uuid)->firstOrFail();
//     return response(QrCode::size(200)->generate($qrCode->url))
//         ->header('Content-Type', 'image/svg+xml');
// });

 