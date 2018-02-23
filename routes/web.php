<?php

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


Route::group(['middleware' => ['theme']], function () {
    Route::get('/', 'PagesController@index')->name('home');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/register_', 'PagesController@register')->name('register_');

    Route::get('/videos/{id}', 'PagesController@video')->name('view_video');

    Route::get('/videos', 'PagesController@videos')->name('videos');

    Route::get('/categories/{id}', 'PagesController@category')->name('category');

    Route::get('/series', 'PagesController@series')->name('series');

    Route::get('/page/{id}', 'PagesController@page')->name('page');

    Route::get('/search', 'PagesController@search')->name('search');



    Route::get('/movie/{id}/rating', 'MoviesController@getMovieRating')
        ->name('get_movie_rating');
    Route::get('/movie/{id}/rating/update/{rating}', 'MoviesController@getMovieRating')
        ->name('update_movie_rating');


    Route::group(['middleware' => ['auth']], function (){
        Route::get('/movie/{id}/add_to_list', 'MoviesController@addMovieToList')
            ->name('add_movie_to_list');

        /*todo:: guide the routes below by auth*/
        Route::get('/account/activity', 'PagesController@accountActivity')->name('account_activity');

        Route::get('/email/change', 'PagesController@changeEmail')->name('change_email');
        Route::post('/email/change', 'UsersController@changeEmail')->name('change_email_post');
        Route::get('/language/change', 'PagesController@changeLanguage')->name('change_language');

        Route::get('/profile/add', 'PagesController@addProfile')->name('add_profile');
        Route::get('/profiles/manage', 'PagesController@manageProfiles')->name('manage_profiles');
        Route::get('/profile/{id}/edit', 'PagesController@editProfile')->name('edit_profile');

        Route::get('/password/edit', 'PagesController@editPassword')->name('edit_password');

        Route::post('/password/edit', 'UsersController@changePassword')->name('save_password');


        Route::post('/code/redeem', 'CodesController@redeemCode')->name('redeem_code');

        Route::get('/phone/edit', 'PagesController@phone')->name('edit_phone');
        Route::post('/phone/edit', 'UsersController@changePhone')->name('save_phone');

        Route::get('/myList', 'PagesController@myList')->name('my_list');
        Route::get('/settings', 'PagesController@settings')->name('settings');
        Route::get('/select_profile', 'PagesController@selectProfile')->name('select_profile');

        /*admin routes*/
        Route::get('/admin/dashboard', 'AdminPagesController@index')->name('_dashboard');
        Route::get('/admin/users', 'AdminPagesController@users')->name('_users');
        Route::get('/admin/categories', 'AdminPagesController@categories')->name('_categories');
        Route::get('/admin/videos', 'AdminPagesController@videos')->name('_videos');
        Route::get('/admin/episodes', 'AdminPagesController@episodes')->name('_episodes');
        Route::get('/admin/actors', 'AdminPagesController@actors')->name('_actors');
        Route::get('/admin/codes', 'AdminPagesController@codes')->name('_codes');
        Route::get('/admin/pages', 'AdminPagesController@pages')->name('_pages');
        Route::get('/admin/themes', 'AdminPagesController@themes')->name('_themes');
        Route::get('/admin/settings', 'AdminPagesController@settings')->name('_settings');

        Route::get('/admin/user/add', 'AdminPagesController@addUser')->name('_add_user');
        Route::post('/admin/user/add', 'UsersController@saveUser')->name('_save_user');

        Route::get('/admin/video/add', 'AdminPagesController@addVideo')->name('_add_video');
        Route::post('/admin/video/add', 'VideosController@saveVideo')->name('_save_video');

        Route::get('/admin/actor/add', 'AdminPagesController@addActor')->name('_add_actor');
        Route::post('/admin/actor/add', 'ActorsController@saveActor')->name('_save_actor');

        Route::get('/admin/episode/add', 'AdminPagesController@addEpisode')->name('_add_episode');
        Route::post('/admin/episode/add', 'EpisodesController@saveEpisode')->name('_save_episode');

        Route::get('/admin/genre/add', 'AdminPagesController@addGenre')->name('_add_genre');
        Route::post('/admin/genre/add', 'GenresController@saveGenre')->name('_save_genre');

        Route::post('/admin/settings/save', 'SettingsController@saveSettings')->name('_save_settings');

        Route::get('/admin/page/add', 'AdminPagesController@addPage')->name('_add_page');
        Route::post('/admin/page/add', 'CustomPagesController@savePage')->name('_save_page');
    });

});

Auth::routes();
