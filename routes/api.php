<?php

Route::group(['middleware' => 'auth:api'], function () {
    /* Projects routes */
    Route::get('/projects', ['as' => 'projects.projectDetails', 'uses' => 'ProjectController@projectsDetails']);
});
