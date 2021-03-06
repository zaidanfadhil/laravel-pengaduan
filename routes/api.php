<?php

use Illuminate\Http\Request;

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


Route::get('pengaduan','ApiController@index');
Route::get('masyarakat','ApiController@getMasyarakat');
Route::get('tanggapan','ApiController@tanggapan');

Route::post('login','ApiController@login');
Route::get('logout', 'ApiController@logout');
Route::post('register','ApiController@register');

$router->post('pengaduan', 'ApiController@createPengaduan');
$router->get('pengaduan',  'ApiController@getPengaduan');
$router->get('pengaduan/{id}',  'ApiController@getPengaduanId');
$router->put('updatepengaduan/{id}',  'ApiController@updateStatus');




// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
