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

Route::group(['middleware' => 'web'], function () {

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home/obavestenja','InfosController@index');

Route::get('/home/administracija','StudentsController@index');

Route::get('/home/aktivnosti','ActivitiesController@index');

Route::get('/home/biranje_predmeta','SubjectsController@indexCheck');

Route::get('prijavi/{id}','ExamsController@SubmitSubject');

Route::get('/home/ispiti',function(){
	return view('links.ispiti');
});
Route::get('/home/moji_predmeti','SubjectsController@indexPreview');

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

	//Ruta namenjene kreiranju obavestenja za studente

		Route::get('/postavi_obavestenje',function(){
			return view('admin.info');
		});

		Route::post('/sacuvajinfo','InfosController@store');
	//kraj

	//Ruta namenjena za kreiranje novog studenta
		Route::get('/kreiraj_novog_studenta',function(){
			return view('admin.create_new_student');
		});
		Route::post('/novstudent','StudentsController@store');
		
	//kraj

	//Ruta za azuriranje aktivnosti studenta
		Route::get('/azuriraj_aktivnosti_studenta',function(){
			return view('admin.update_students_activities');
		});
	//kraj

	//Ruta za pretragu baze studenata
		Route::get('/pretrazi_bazu_s',function(){
			return view('admin.search_students_database');
		});
	//

	//Ruta za kreiranje novog predmeta
		Route::post('/sacuvajpr','SubjectsController@store');

		Route::get('/kreiraj_pr',function(){
			return view('admin.create_new_subject');
		});
	//kraj

	//Ruta za pregled predmeta u bazi
		Route::get('/pregledaj_predmete',function(){
			return view('admin.search_subjects_database');
		});
	//kraj

	//Ruta za azuriranje skolarine
		Route::get('/azuriraj_skolarine',function(){
			return view('admin.update_tfees');
		});

		Route::post('/update_tfees','TFeesController@store');
	//kraj

	//Pretraga studenta
		Route::post('pretrazi_bazu_s/rezultat','StudentsController@SearchStudent');
	//kraj

	//Pretraga studenta
		Route::post('pregledaj_predmete/rezultat_predmeti','SubjectsController@SearchSubject');
	//kraj
});

});