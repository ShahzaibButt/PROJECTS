<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::get('/cnic', 'HomeController@getCnic');

Route::get('/cnicPost/{cnicNum}', 'HomeController@postCnic');

Route::get('/bio', 'HomeController@biometric');

Route::get('/details', 'HomeController@getDetails');

Route::get('/NABallot', 'HomeController@NABallot');
Route::post('/NABallotSave', 'HomeController@NABallotSave');

Route::get('/PABallot', 'HomeController@PABallot');
Route::post('/PABallotSave', 'HomeController@PABallotSave');

Route::get('/logout', 'HomeController@logout');

// Admin Routes starts

Route::get('/admin', 'AdminController@login');

Route::post('/admin/signup', 'AdminController@signup');

Route::get('/admin/dashboard', 'AdminController@dashboard');

Route::get('/admin/result', 'AdminController@result');

Route::get('/admin/userProfile', 'AdminController@profile');

Route::get('/admin/candidate/add', 'AdminController@addCandidateForm');

Route::post('/admin/candidate/addCandidate', 'AdminController@addCandidate');

Route::get('/admin/Na_candidates', 'AdminController@Na_candidate');

Route::get('/admin/Pa_candidates', 'AdminController@Pa_candidate');

Route::get('/admin/voters', 'AdminController@voter');

Route::get('/admin/voter/add', 'AdminController@addVoterForm');

Route::post('/admin/voter/addVoter', 'AdminController@addVoter');

Route::get('/admin/logout', 'AdminController@logout');

Route::get('/admin/ballotPaper', 'AdminController@getBallotPaper');

Route::post('/admin/addBallotPaper', 'AdminController@addBallotPaper');

Route::post('/admin/voter/edit', 'AdminController@editVoter');

Route::post('/admin/voter/update', 'AdminController@updateVoter');

Route::post('/admin/voter/delete', 'AdminController@deleteVoter');

Route::post('/admin/candidate/edit', 'AdminController@editCandidate');

Route::post('/admin/candidate/update', 'AdminController@updateCandidate');

Route::post('/admin/candidate/delete', 'AdminController@deleteCandidate');

Route::get('/admin/users', 'AdminController@users');