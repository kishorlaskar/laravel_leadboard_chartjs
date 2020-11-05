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
Route::get('/','WelcomeController@index')->name('/');

Auth::routes();

Route::get('/from-validate',function()
{
    return view('from-validate');
});


Route::get('/home', 'HomeController@index')->name('home');

Route::resource('next-question','NextController');
Route::get('/score/score-detail', 'MainController@detail')
    ->name('score.detail');
Route::get('/quiz','MainController@next')->name('quiz');
Route::any('start-quiz','MainController@startquiz')->name('start-quiz');
Route::any('submit-ans','MainController@submitans')->name('submit-ans');
Route::get('/leads','MainController@leads')->name('leads');

Route::get('leadboard-chart','ResultsController@chart_view')->name('leadboard.chart');
Route::get('quiz-chart','ResultsController@chart')->name('quiz.chart');

Route::resource('topics', 'TopicController');
Route::resource('questions', 'QuestionController');
Route::resource('results', 'ResultsController');
Route::resource('adminpanel', 'AdminPanelController');
Route::resource('questionsOptions', 'QuestionsOptionsController');
Route::resource('users', 'UserController');
