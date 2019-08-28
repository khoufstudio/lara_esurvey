<?php


// Route::prefix('menufrontend')->group(function() {
//     Route::get('/', 'MenuFrontendController@index');
// });

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){

    Route::get('/frontend_menus', [
        'as'    => 'cms.frontendmenus',
        'uses'  => 'MenuFrontendController@index'
    ]);

    Route::post('/frontend_menus/store', [
        'as'    => 'cms.frontendmenus.store',
        'uses'  => 'MenuFrontendController@store'
    ]);

    Route::get('/frontend_menus/{id}/edit', [
        'as'    => 'cms.frontendmenus.edit',
        'uses'  => 'MenuFrontendController@edit'
    ]);

    Route::post('/frontend_menus/update/{id}', [
        'as'    => 'cms.frontendmenus.update',
        'uses'  => 'MenuFrontendController@update'
    ]);
    
    Route::post('/frontend_menus/delete/{id}', [
        'as'    => 'cms.frontendmenus.delete',
        'uses'  => 'MenuFrontendController@destroy'
    ]);


    Route::get('/frontend_menus/{id}/setting_link', [
        'as'    => 'cms.frontendmenus.setting_link',
        'uses'  => 'MenuFrontendController@setting_link'
    ]);

    Route::get('/frontend_menus/setting_link/to_pages', [
        'as'    => 'cms.frontendmenus.topages',
        'uses'  => 'MenuFrontendController@topages'
    ]);
    
    Route::get('/frontend_menus/setting_link/file_categories', [
        'as'    => 'cms.frontendmenus.to_filecategories',
        'uses'  => 'MenuFrontendController@to_file_categories'
    ]);
    Route::get('/frontend_menus/setting_link/photo_album', [
        'as'    => 'cms.frontendmenus.to_photoalbum',
        'uses'  => 'MenuFrontendController@to_photoalbum'
    ]);

    Route::get('/frontend_menus/setting_link/videos', [
        'as'    => 'cms.frontendmenus.to_videos',
        'uses'  => 'MenuFrontendController@to_videos'
    ]);

    Route::get('/frontend_menus/setting_link/blog_categories', [
        'as'    => 'cms.frontendmenus.to_blogcategories',
        'uses'  => 'MenuFrontendController@to_blog_categories'
    ]);

    Route::post('/frontend_menus/setting_link/save/{id}', [
        'as'    => 'cms.frontendmenus.setting_link.save',
        'uses'  => 'MenuFrontendController@setting_link_save'
    ]);

    Route::get('/frontend_menus/list_menu_frontend', [
        'as'    => 'cms.list_menu_frontend',
        'uses'  => 'MenuFrontendController@list_menu_frontend'
    ]);


});
