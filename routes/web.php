<?php
    Route::get('/', 'RootsController@index') -> name('root');
    Route::resource('/gu_staff', 'GU_StaffsController') -> only(['store']);

    Route::get('/users/sign_in', 'SessionsController@create') -> name('new_user_session');
    Route::post('/users/sign_in', 'SessionsController@store') -> name('user_session');
    Route::delete('/users/{id}/sign_out', 'SessionsController@destroy') -> name('destroy_user_session');

    Route::get('/users/sign_up', 'RegistrationsController@create') -> name('new_user_registration');
    Route::post('/users', 'RegistrationsController@store') -> name('user_registration');
    Route::get('/users/{id}/edit', 'RegistrationsController@edit') -> name('edit_user_registration');
    Route::match(['put', 'patch'], '/users/{id}', 'RegistrationsController@update');
    Route::delete('/users/{id}', 'RegistrationsController@destroy');

// ↓ デフォルトの Welcome ページへのルーティング ↓
// Route::get('/', function () {
//     return view('welcome');
// });
?>
