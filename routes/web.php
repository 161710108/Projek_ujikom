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

// Route::get('/', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

// Route::group(['middleware' => ['auth', 'role:Admin']], function () {
//     Route::get('/admin', function () {
//         return view('dashboard.admin');
//     });
// });
// Route::group(['middleware' => ['auth', 'role:Member']], function () {
//     Route::get('/user', function () {
//         return view('dashboard.member');
//     });
// });



Route::group(['prefix'=>'admin', 'middleware'=>'auth','role:Admin'],function(){
    Route::resource('authors', 'authorController');
    Route::resource('books', 'bookController');
    Route::resource('members', 'MembersController');
    Route::get('statistics', [
        'as'=>'statistics.index',
        'uses'=>'StatisticsController@index'
        ]);
//export excel
Route::get('export/books', [
    'as'=> 'export.books',
    'uses' => 'bookController@export'
]);
Route::post('export/books', [
    'as'=> 'export.books.post',
    'uses' => 'bookController@exportPost'
]);

//export pdf
Route::get('template/books', [
    'as'=> 'template.books',
    'uses' => 'bookController@generateExcelTemplate'
    ]);
    Route::post('import/books', [
    'as'=> 'import.books',
    'uses' => 'bookController@importExcel'
    ]);
});

Route::get('borrow/books', [
    'middleware' => ['auth', 'role:member'],
    'as'=> 'books.borrowed',
    'uses' => 'bookController@borrowed'
]);

Route::get('books/{book}/borrow', [
    'middleware' => ['auth', 'role:member'],
    'as' => 'guest.books.borrow',
    'uses' => 'bookController@borrow'
    ]);

Route::put('books/{book}/return', [
        'middleware' => ['auth', 'role:member'],
        'as'
        => 'member.books.return',
        'uses'
        => 'bookController@returnBack'
        ]);

Route::get('auth/verify/{token}', 'Auth\RegisterController@verify');

Route::get('auth/send-verification', 'Auth\RegisterController@sendVerification');
Route::get('settings/profile', 'SettingsController@profile');
Route::get('settings/profile2', 'SettingsController@profile2');
Route::get('settings/profile/edit', 'SettingsController@editProfile');
Route::post('settings/profile', 'SettingsController@updateProfile');

Route::get('settings/password', 'SettingsController@editPassword');
Route::post('settings/password', 'SettingsController@updatePassword');

Route::group(['prefix'=>'user', 'middleware'=>'auth','role:Member'],function(){
    Route::resource('guest', 'GuestController');
    // Route::get('guestt', 'GuestController@create');
    // Route::post('guests', 'GuestController@store');
    // Route::get('/pinjam/buku', 'bookController@borrowed');
});
