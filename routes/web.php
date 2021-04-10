<?php
    Route::get('/', 'RootsController@index') -> name('root');
    Route::resource('/gu_staff', 'GU_StaffsController') -> only(['store']);

// ↓ デフォルトの Welcome ページへのルーティング ↓
// Route::get('/', function () {
//     return view('welcome');
// });
?>
