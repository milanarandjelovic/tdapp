<?php

Route::group(['middleware' => 'auth:api'], function () {
    /* Date and Time routes */
    Route::get('/getDateAntTime', ['as' => 'getDateAndTime', 'uses' => 'ProjectController@getDateAndTime']);

    /* Creator routes */
    Route::get('/getCreator', ['as' => 'getCreator', 'uses' => 'ProjectController@getCreator']);

    /* Projects routes */
    Route::get('/projects', ['as' => 'projects.projectDetails', 'uses' => 'ProjectController@projectsDetails']);
    Route::get('/project/{id}', ['as' => 'projects.projectDetails', 'uses' => 'ProjectController@getProject']);
    Route::post('/projects', ['as' => 'projects.store', 'uses' => 'ProjectController@store']);
    Route::put('/project/update/{id}', ['as' => 'projects.update', 'uses' => 'ProjectController@update']);
    Route::delete('/project/delete/{id}', ['as' => 'projects.destroy', 'uses' => 'ProjectController@destroy']);
});
