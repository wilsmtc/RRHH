<?php
Route::get('/', function () {
    return view('Template.auth.login');
});

Route::group(['prefix' => 'admin','middleware'=>['auth','Administrador:/Home' ]], function(){

	Route::get('/',[
		'as' => 'admin.main', function(){
			return view('admin.main');
		}
	]);
	Route::resource('Home', 'HomeController');

	Route::resource('password', 'ReiniciarPasswordController');
	Route::resource('permissions', 'PermissionsController');
	Route::resource('unidades', 'UnidadesController');
	Route::resource('personal', 'PersonalController');
	Route::resource('archivos', 'ArchivosController');



	Route::resource('users','UsersController');
	Route::get('users/destroy/{id}',[
		'uses' => 'UsersController@destroy',
		'as'   => 'admin.users.destroy'
	]);
	

	Route::get('/list_user', 'UsersController@list_user');
	Route::get('/listar_unidades', 'UnidadesController@listar_unidades');
	Route::get('/listar_personal', 'PersonalController@listar_personal');
	
	Route::get('/eliminarUnidad', 'UnidadesController@eliminarUnidad');
	Route::get('/eliminarPersonal', 'UnidadesController@eliminarPersonal');

	Route::get('/get_allciudades', 'PersonalController@get_allciudades');
	Route::get('/get_allunidades', 'PersonalController@get_allunidades');
	Route::get('/download/{id}', 'ArchivosController@getDownload');

});


Auth::routes();
Route::get('/Home', 'HomeController@index')->name('home');
