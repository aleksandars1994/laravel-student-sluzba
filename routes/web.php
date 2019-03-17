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

use App\User;
use Illuminate\Support\Facades\Input;

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

	//Ruta namenjene kreiranju obavestenja za studente
		Route::get('/postavi_obavestenje',function(){
	return view('admin.info');
		});
	//kraj

	//Ruta namenjena za kreiranje novog studenta
		Route::get('/kreiraj_novog_studenta',function(){
			return view('admin.create_new_student');
		});
		Route::get('/kreiraj_novog_studenta/create',function(){
			return view('tools.create_new_student');
		});
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
	//kraj

	//Pretraga studenta
		Route::post('pretrazi_bazu_s/rezultat',function(){
		   
		    $q = Input::get ( 'q' );
		    $user = User::where('name','LIKE','%'.$q.'%')->get();
		    
		   	 if(count($user) > 0 && $q!="")
		        return view('admin.result')->withDetails($user)->withQuery ( $q );
		    else
		     return view ('admin.result')->withMessage('Nema rezultata');
		    
		});
	//kraj

	//Pretraga studenta
		Route::post('pregledaj_predmete/rezultat_predmeti',function(){
		   
		    $q = Input::get ( 'q' );
		    $user = User::where('name','LIKE','%'.$q.'%')->get();
		    
		   	 if(count($user) > 0 && $q!="")
		        return view('admin.search_subjects_database')->withDetails($user)->withQuery ( $q );
		    else
		     return view ('admin.search_subjects_database')->withMessage('Nema rezultata');
		    
		});
	//kraj
});