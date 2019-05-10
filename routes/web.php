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
    return view('auth.login');
});
Route::get('/home/obavestenja','InfosController@index');

Route::get('/home/administracija','StudentsController@index');

Route::get('/home/aktivnosti','ActivitiesController@index');

Route::get('pogledaj/{id}','ActivitiesController@show');

Route::get('pogledaj2/{id}','ActivitiesController@show2');

Route::get('aktivnosti/{id}','ActivitiesController@showInfo');

Route::get('/home/biranje_predmeta','SubjectsController@indexCheck');

Route::get('prijavi/{id}','ExamsController@SubmitSubject');

Route::get('/home/ispiti','ExamsController@ShowExam');

Route::get('/home/moji_predmeti','SubjectsController@indexPreview');

Route::get('/home/prijava_ispita','ExamsController@index');

Route::get('prijavi_ispit/{id}','ExamsController@startExam');

Route::get('/home/skolarine_i_uplata','TFeesController@index');

Route::get('/home/nazad',function(){
	return redirect()->to('/home/aktivnosti');
});

Route::get('/home/moji_predmeti/nazad',function(){
	return redirect()->to('/home/moji_predmeti');
});

Route::get('/nazad',function(){
	return redirect()->to('/home/ispiti');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

});
Route::group(['middleware' => 'web'], function () {
    
Route::group(['prefix'=>'admin','middleware'=> ['auth'=>'admin']],function(){

		Route::get('/', function () {
    	return view('admin');
		});

	//Ruta namenjene kreiranju obavestenja za studente

		Route::get('/postavi_obavestenje',function(){
			return view('admin.info');
		});

		Route::get('/update/{id}','InfosController@edit');

		Route::post('/update/info/{id}','InfosController@update');

		Route::delete('/delete/info/{id}','InfosController@remove');

		Route::get('/info/{id}','StudentsController@CheckInfo')->where('id', '(.*)');

		Route::post('/sacuvajinfo','InfosController@store');
	//kraj

	//Ruta namenjena za kreiranje novog studenta
		Route::get('/kreiraj_novog_studenta',function(){
			return view('admin.create_new_student');
		});
		Route::post('/novstudent','StudentsController@store');

		Route::get('/nazad',function(){
			return redirect('/admin/pretrazi_bazu_s');
		});

		Route::get('/nazad/subject',function(){
			return redirect('/admin/pregledaj_predmete');
		});
		
	//kraj

	//Ruta za azuriranje aktivnosti studenta
		Route::get('/azuriraj_aktivnosti_studenta','ActivitiesController@showSubjectName');

		Route::post('/azuriranje','ActivitiesController@UpdateActivities');
	//kraj

	//Ruta za pretragu baze studenata
		Route::get('/pretrazi_bazu_s',function(){
			return view('admin.search_students_database');
		});
	//
    //Ruta za pregled baze studenata
		Route::get('/pretrazi_bazu_s','StudentsController@ViewStudent');
		
	//
	//Ruta za kreiranje novog predmeta
		Route::post('/sacuvajpr','SubjectsController@store');

		Route::get('/kreiraj_pr',function(){
			return view('admin.create_new_subject');
		});
	//kraj

	//Ruta za pregled predmeta u bazi
		Route::get('/pregledaj_predmete','SubjectsController@ShowAll');
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

		Route::get('/subj/info/{id}','SubjectsController@view');
	//kraj

		
		Route::post('/sacuvaj/studenta/{id}','StudentsController@update')->where('id','(.*)');

		Route::post('/sacuvaj_i/{id}','SubjectsController@update');
		

		Route::delete('/delete/subject/{id}','SubjectsController@removeSubject');
		
		Route::delete('/delete/{id}','StudentsController@remove')->where('id', '(.*)');

		
		
});

});