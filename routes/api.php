<?php

Route::group(['middleware' => 'auth:api'], function () {
    /* Projects routes */
    Route::get('/projects', ['as' => 'projects.projectDetails', 'uses' => 'ProjectController@projectsDetails']);
    Route::get('/project/{id}', ['as' => 'projects.projectDetails', 'uses' => 'ProjectController@getProject']);
    Route::post('/projects', ['as' => 'projects.store', 'uses' => 'ProjectController@store']);
    Route::put('/project/update/{id}', ['as' => 'projects.update', 'uses' => 'ProjectController@update']);
    Route::delete('/project/delete/{id}', ['as' => 'projects.destroy', 'uses' => 'ProjectController@destroy']);
});
