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


Route::group([
    'namespace' => 'Frontend'
], function () {
    Route::get('/', 'WelcomeController@index')->name('welcome');
    Route::post('/search', 'WelcomeController@search')->name('book.search');

    //user info update
    Route::post('/user/update/info', 'WelcomeController@updateUserInfo')->name('user.info.update');

    Route::get('/book/{slug}', 'WelcomeController@viewBook')->name('view.book');

    Route::get('/dashboard', 'WelcomeController@dashboard')->name('dashboard');
    Route::get('/publisher/registration', 'WelcomeController@publisher_reg')->name('publisher.reg');
    Route::post('/publisher/registration', 'WelcomeController@add_publisher')->name('publisher.add');

    Route::get('/publisher/list', 'WelcomeController@publisherIndex')->name('publisher.grid');
    Route::get('/author/list', 'WelcomeController@authorIndex')->name('author.grid');
    Route::get('/categories/list', 'WelcomeController@categoryIndex')->name('category.grid');

    Route::get('/book/list', 'WelcomeController@bookList')->name('book.grid');



    //Cart related routes
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::get('/cart/checkout', 'CartController@checkout')->name('cart.checkout');

    Route::get('/cart/add/{id}', 'CartController@add')->name('cart.add');
    Route::post('/cart/update', 'CartController@update')->name('cart.update');
    Route::get('/cart/remove/{id}', 'CartController@remove')->name('cart.remove');

    //Order related routes
    Route::post('order/submit', 'OrderController@submit')->name('order.submit');

});

// Authentication Routes...
Route::get('login', 'Frontend\WelcomeController@login')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Registration Routes...
Route::get('register', 'Frontend\WelcomeController@register')->name('register');
Route::post('register', 'Auth\RegisterController@register');
// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


//Admin routes. Just add the admin middleware to your route groups, bang! They are secured!
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function () {
    Route::get('dashboard', 'DashboardController@index')->name('admin.index');


    //Books
    Route::get('books/list', 'BookController@index')->name('admin.book.list');
    Route::get('books/pending', 'BookController@pending')->name('admin.book.pending');
    Route::get('books/create', 'BookController@create')->name('admin.book.create');
    Route::post('books/add', 'BookController@add')->name('admin.book.add');
    Route::get('books/modify/{slug}', 'BookController@modify')->name('admin.book.modify');
    Route::post('books/update/{slug}', 'BookController@update')->name('admin.book.update');
    Route::get('books/delete/{id}', 'BookController@delete')->name('admin.book.delete');
    Route::get('books/switch/{id}', 'BookController@switch')->name('admin.book.switch');

    //categories
    Route::get('categories', 'CategoryController@index')->name('admin.categories');
    Route::post('cateogories/add', 'CategoryController@add')->name('admin.categories.add');
    Route::get('cateogories/modify/{slug}', 'CategoryController@modify')->name('admin.categories.modify');
    Route::post('cateogories/update/{slug}', 'CategoryController@update')->name('admin.categories.update');
    Route::get('cateogories/delete/{slug}', 'CategoryController@delete')->name('admin.categories.delete');

    //authors
    Route::get('authors','AuthorController@index')->name('admin.authors');
    Route::post('authors/add','AuthorController@add')->name('admin.authors.add');
    Route::get('authors/modify/{slug}', 'AuthorController@modify')->name('admin.authors.modify');
    Route::post('authors/update/{slug}', 'AuthorController@update')->name('admin.authors.update');
    Route::get('authors/delete/{slug}', 'AuthorController@delete')->name('admin.authors.delete');

    //translators
    Route::get('translators','TranslatorController@index')->name('admin.translators');
    Route::post('translators/add','TranslatorController@add')->name('admin.translators.add');
    Route::get('translators/modify/{slug}', 'TranslatorController@modify')->name('admin.translators.modify');
    Route::post('translators/update/{slug}', 'TranslatorController@update')->name('admin.translators.update');
    Route::get('translators/delete/{slug}', 'TranslatorController@delete')->name('admin.translators.delete');

    //publishers
    Route::get('publishers','PublisherController@index')->name('admin.publishers');
    Route::post('publishers/add','PublisherController@add')->name('admin.publishers.add');
    Route::get('publishers/modify/{slug}', 'PublisherController@modify')->name('admin.publishers.modify');
    Route::post('publishers/update/{slug}', 'PublisherController@update')->name('admin.publishers.update');
    Route::get('publishers/delete/{slug}', 'PublisherController@delete')->name('admin.publishers.delete');
    Route::get('publishers/pending', 'PublisherController@pending')->name('admin.publishers.pending');
    Route::get('publishers/approve/{id}', 'PublisherController@approve')->name('admin.publishers.approve');

    //payment method
    Route::get('payment/methods', 'SettingsController@paymentMethodIndex')->name('admin.payment.method');
    Route::post('payment/methods/bkashupdate', 'SettingsController@bkashNumUpdate')->name('admin.payment.bkash.update.num');
    Route::post('payment/methods/dchargeupdate', 'SettingsController@deliveryChargeUpdate')->name('admin.payment.dcharge.update');
    Route::get('payment/methods/status/switch/{var}', 'SettingsController@methodStatusSwitch')->name('admin.payment.method.switch');
});

Route::group([
    'middleware' => 'publisher',
    'prefix' => 'publisher',
    'namespace' => 'Publisher'
], function () {
    Route::get('dashboard', 'DashboardController@index')->name('publisher.index');

    //book related
    Route::get('books/create', 'BookController@create')->name('publisher.book.create');
    Route::post('books/add', 'BookController@add')->name('publisher.book.add');
    Route::get('books/modify/{slug}', 'BookController@modify')->name('publisher.book.modify');
    Route::post('books/update/{slug}', 'BookController@update')->name('publisher.book.update');
    Route::get('books/delete/{id}', 'BookController@delete')->name('publisher.book.delete');
});

