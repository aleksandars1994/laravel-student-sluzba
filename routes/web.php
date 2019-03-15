<?php

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
Route::get('/home/obavestenja',function(){
	return view('links.info');
});
Route::get('/home/administracija',function(){
	return view('links.administracija');
});
Route::get('/home/aktivnosti',function(){
	return view('links.aktivnosti');
});
Route::get('/home/biranje_predmeta',function(){
	return view('links.biranje_p');
});
Route::get('/home/ispiti',function(){
	return view('links.ispiti');
});
Route::get('/home/moji_predmeti',function(){
	return view('links.moji_predmeti');
});
Route::get('/home/prijava_ispita',function(){
	return view('links.prijava_ispita');
});
Route::get('/home/skolarine_i_uplata',function(){
	return view('links.skolarine_i_uplata');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin','middleware'=> ['auth'=>'admin']],function(){

		Route::get('/', function () {
    	return view('admin');
		});

		Route::get('/obavestenja',function(){
	return view('links.info');
		});
		Route::get('/obavestenja/create',function(){
	return view('links.provera');
		});
		Route::get('/administracija',function(){
			return view('links.administracija');
		});
		Route::get('/aktivnosti',function(){
			return view('links.aktivnosti');
		});
		Route::get('/biranje_predmeta',function(){
			return view('links.biranje_p');
		});
		Route::get('/ispiti',function(){
			return view('links.ispiti');
		});
		Route::get('/moji_predmeti',function(){
			return view('links.moji_predmeti');
		});
		Route::get('/prijava_ispita',function(){
			return view('links.prijava_ispita');
		});
		Route::get('/skolarine_i_uplata',function(){
			return view('links.skolarine_i_uplata');
		});
});