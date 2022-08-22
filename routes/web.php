<?php

use App\Models\Entry;
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

Route::get('/openExternal/{entry}', function (String $entry) {
    // dd(Entry::find($entry)->url);
	$url = Entry::find($entry)->url;

	if($url == null || $url == "") {
		// dd($url);
		return route('admin.entries');
	}
	
	return redirect()->to($url);
})->name('openExternal');