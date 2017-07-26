<?php

use App\Task;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Different ways of passing data route to view page
// Method 1
// Route::get('/about', function() {
// 	return view('about', [
// 		"name" => "sumon",
// 		]);
// });
// Method 2
// Route::get('/about', function() {
// 	return view('about')->with('name', 'sumon');
// });
// // Method 3
// Route::get('/about', function() {
// 	return view('about')->with('name', 'sumon')->with('age', '24');
// });
// Method 4
// Route::get('/about', function() {
// 	$name = "sumon";
// 	$age = 24;
// 	$tasks = [
// 		'Go to the store',
// 		'Finish screencast',
// 		'Clean the house',
// 	];
// 	$books = array(
// 		'Main kamf',
// 		'PHP OOP',
// 		'Internet of things',
// 	);
// 	return view('about', compact('name', 'age', 'tasks', 'books'));
// });

// Fetching data from db using query builder
// Example 1
// Route::get('/tasks', function() {
// 	$tasks = DB::table('tasks')->get(); // example use of query builder
// 	return view('tasks.index', compact('tasks'));
// });
// // Example 2: Single url parameter
// Route::get('/tasks/{task_id}', function($id) {
// 	$task = DB::table('tasks')->find($id);
// 	return view('tasks.show', compact('task'));
// });
// // Example 3: Multiple url parameter
// Route::get('/tasks/{task_id1}/{task_id2}', function($id1, $id2) {
// 	echo $id1."<br>".$id2; die;
// });

// Fetching data from db using model
// Example 1
// Route::get('/tasks', function() {
// 	$tasks = Task::all();
// 	return $tasks;
// });
// Example 2
// Route::get('/tasks/{task}', function($id) {
// 	$task = App\Task::find($id);
// 	dd($task->body);
// });

// Use of controller
// Hiding all logics inside controller instead of putting everything here in route. Keep the route as clean as possible
// Rewriting above two example in more cleaner way using controller
// Route::get('/tasks', 'TasksController@index');
// Route::get('/tasks/{task}', 'TasksController@show');

// Start blog
Route::get('/', 'PostController@index')->name('posts');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/posts/{post_id}', 'PostController@show')->where('post_id', '[0-9]+');
Route::get('/post/create', 'PostController@create')->name('postCreate');
Route::post('/posts', 'PostController@store');
Route::post('/posts/{post_id}/comments', 'CommentController@store');

Route::get('/register', 'RegistrationController@create')->name('register');
Route::post('/register', 'RegistrationController@store');

Route::get('/login', 'SessionsController@create')->name('login');
Route::post('/login', 'SessionsController@store');
Route::get('/logout', 'SessionsController@destroy')->name('logout');