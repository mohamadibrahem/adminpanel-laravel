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
Route::redirect('/', '/login');
///Backend
Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
	
    Route::resource('roles', 'Backend\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Backend\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Backend\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Backend\UsersController@massDestroy', 'as' => 'users.mass_destroy']);
 	
    Route::resource('projects', 'Backend\ProjectController');
    Route::post('projects_mass_destroy', ['uses' => 'Backend\ProjectController@massDestroy', 'as' => 'projects.mass_destroy']);
    Route::post('projects_restore/{id}', ['uses' => 'Backend\ProjectController@restore', 'as' => 'projects.restore']);
    Route::delete('projects_perma_del/{id}', ['uses' => 'Backend\ProjectController@perma_del', 'as' => 'projects.perma_del']);
	
	Route::resource('skills', 'Backend\SkillController');
    Route::post('skills_mass_destroy', ['uses' => 'Backend\SkillController@massDestroy', 'as' => 'skills.mass_destroy']);
    Route::post('skills_restore/{id}', ['uses' => 'Backend\SkillController@restore', 'as' => 'skills.restore']);
    Route::delete('skills_perma_del/{id}', ['uses' => 'Backend\SkillController@perma_del', 'as' => 'skills.perma_del']);
});



Route::get('/login', function () {
    return view('auth.login');
})->middleware('auth');

Route::get('/register', function () {
    return view('auth.register');
});


Route::get('/admin', function () {
    return view('backend/app');
})->middleware('auth');

Auth::routes();
/* --------------------------------------------------------------------*/

