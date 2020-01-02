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

// Route::get('/', function () {
//     return view('page.index');
// });
Route::get('/','HelloController@Index');
Route::get('about/us', 'HelloController@About')->name('about');
Route::get('contact/us', 'HelloController@Contact')->name('contact');

//Category crud are here ==================
Route::get('add/category', 'HelloController@AddCategory')->name('add.category');
Route::get('all/category', 'HelloController@AllCategory')->name('all.category');
Route::post('store/category', 'HelloController@StoreCategory')->name('store.category');
Route::get('view/category/{id}','HelloController@ViewCategory');
Route::get('delete/category/{id}','HelloController@DeleteCategory');
Route::get('edit/category/{id}','HelloController@EditCategory');
Route::post('update/category/{id}','HelloController@UpdateCategory');


//post crud here =================
Route::get('write/post', 'PostController@WritePost')->name('writepost');
Route::post('store/post', 'PostController@StorePost')->name('store.post');
Route::get('all/post', 'PostController@AllPost')->name('all.post');
Route::get('view/post/{id}','PostController@ViewPost');
Route::get('edit/post/{id}','PostController@EditPost');
Route::post('update/post/{id}','PostController@UpdatePost');
Route::get('delete/post/{id}','PostController@DeletePost');




// Student ==================
// Route::get('create','StudentController@Create')->name('create');
// Route::post('store/student', 'StudentController@Store')->name('store.student');
// Route::get('all/student','StudentController@Index')->name('all.student');
// Route::get('view/student/{id}','StudentController@Show');
// Route::get('delete/student/{id}','StudentController@Delete');
// Route::get('edit/student/{id}','StudentController@Edit');
// Route::post('update/student/{id}', 'StudentController@Update');
Route::resource('student','StudentController');
