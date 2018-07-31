<?php

Auth::routes();

Route::group(['prefix' => 'ar','middleware' => ['web','check_renew_date','is_active','client_messages']] ,function (){
    Route::get('/', 'Arabic\HomeController@index')->name('home');
    Route::get('/contact', 'Arabic\HomeController@contact');
    Route::get('/products/{id}', 'Arabic\ProductController@show');
    Route::get('/about', 'Arabic\HomeController@about');
    Route::get('/infinity', 'Arabic\HomeController@infinity');
    Route::get('/founders', 'Arabic\HomeController@founders');
    Route::get('/events', 'Arabic\HomeController@events');
    Route::get('/processes', 'Arabic\HomeController@processes');

    Route::resource('/profile','Arabic\ProfileController');
    Route::post('/products/filter', 'Arabic\ProductController@filter');
    Route::post('/products/search', 'Arabic\ProductController@search');
    Route::post('/products', 'Arabic\ProductController@products');
    Route::post('/contact', 'Arabic\HomeController@add_contact');
    Route::post('/events/search', 'Arabic\HomeController@search_events');
});

Route::group(['prefix' => 'ar', 'middleware' => ['web','auth:web','check_renew_date','is_active','client_messages']],function (){
    Route::get('/logout','Auth\LoginController@userLogout')->name('users.logout');
    Route::get('/wallet', 'Arabic\WalletController@index');
    Route::get('/myproducts', 'Arabic\ProductController@my_products');
    Route::get('/team', 'Arabic\TeamController@index');
    Route::get('/userchat' ,'Arabic\ChatController@index')->name('userchat');
    Route::get('/sentchat','Arabic\ChatController@sent')->name('sentchat');
    Route::get('/receivedchat','Arabic\ChatController@received')->name('receivedchat');
    Route::get('/messages/{id}','Arabic\ChatController@show_message');

    Route::post('/order', 'Arabic\OrderController@index');
    Route::post('/wallet/filter', 'Arabic\WalletController@filter');
    Route::post('/transfer', 'Arabic\WalletController@transfer');
    Route::post('/addfriend', 'Arabic\ChatController@add_friend');
    Route::post('/updateprofile','Arabic\ProfileController@update_profile')->name('updateprofile');
    Route::post('/renewaccount','Arabic\ProfileController@renew_account')->name('renewaccount');
    Route::resource('/e_learning', 'Arabic\LearningController');
    Route::post('/addDownLine', 'Arabic\TeamController@store')->name('teams.store');
    Route::post('/userchat','Arabic\ChatController@send');
    Route::post('/chatfilter','Arabic\ChatController@filter')->name('chatfilter');
    Route::post('/search_user_id', 'Arabic\TeamController@find_user')->name('team.search');
    Route::post('/events/request', 'Arabic\HomeController@request_events');
    Route::post('/send_message','Arabic\ChatController@send_message');
});

Route::group(['middleware' => ['web','check_renew_date','is_active','client_messages']], function (){
    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/profile','ProfileController');
    Route::post('/products/filter', 'ProductController@filter');
    Route::post('/products/search', 'ProductController@search');
    Route::get('/products/{id}', 'ProductController@show');
    Route::post('/products', 'ProductController@products');

    Route::get('/contact', 'HomeController@contact');
    Route::post('/contact', 'HomeController@add_contact');

    Route::get('/about', 'HomeController@about');
    Route::get('/infinity', 'HomeController@infinity');
    Route::get('/founders', 'HomeController@founders');
    Route::get('/events', 'HomeController@events');
    Route::post('/events/search', 'HomeController@search_events');

    Route::get('/processes', 'HomeController@processes');
});

Route::group(['middleware' => ['web','auth:web','check_renew_date','is_active','client_messages']], function () {
    Route::get('/logout','Auth\LoginController@userLogout')->name('users.logout');
    Route::post('/order', 'OrderController@index');
    Route::get('/wallet', 'WalletController@index');
    Route::post('/wallet/filter', 'WalletController@filter');
    Route::post('/transfer', 'WalletController@transfer');
    Route::post('/addfriend', 'ChatController@add_friend');
    Route::get('/myproducts', 'ProductController@my_products');
    Route::post('/updateprofile','ProfileController@update_profile')->name('updateprofile');
    Route::post('/renewaccount','ProfileController@renew_account')->name('renewaccount');

    Route::resource('/e_learning', 'LearningController');
    Route::get('/team', 'TeamController@index');
    Route::post('/addDownLine', 'TeamController@store')->name('teams.store');

    Route::get('/userchat' ,'ChatController@index')->name('userchat');
    Route::get('/sentchat','ChatController@sent')->name('sentchat');
    Route::get('/receivedchat','ChatController@received')->name('receivedchat');
    Route::post('/userchat','ChatController@send');
    Route::post('/chatfilter','ChatController@filter')->name('chatfilter');
    Route::post('/search_user_id', 'TeamController@find_user')->name('team.search');

    Route::post('/events/request', 'HomeController@request_events');
    Route::get('/messages/{id}','ChatController@show_message');
    Route::post('/send_message','ChatController@send_message');

});

Route::get('/dashboard/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/dashboard/login','Auth\AdminLoginController@login')->name('admin.login.submit');
Route::group(['prefix' => 'dashboard','middleware' => ['limited_products','negative_accounts','auth:admin','admin_messages']], function () {

    Route::get('/', 'Admin\HomeController@index')->name('admin.dashboard');
    Route::post('/profile','Admin\AdminController@update_profile')->name('admin.profile.submit');
    Route::post('/admin_messages','Admin\AdminController@send_message')->name('admin.message.submit');
    Route::get('/profile','Admin\AdminController@profile')->name('admin.profile');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');

    Route::post('/dashboard/social','Admin\DashboardController@add_social_link')->name('dashboard.store_social_links');
    Route::resource('/dashboard','Admin\DashboardController');
    Route::get('/pinCredit','Admin\HomeController@pin_credit');
    Route::get('/pinDebit','Admin\HomeController@pin_debit');
    Route::get('/moneyCredit','Admin\HomeController@money_credit');
    Route::get('/moneyDebit','Admin\HomeController@money_debit');
    Route::get('/shipping','Admin\HomeController@shipping');
    Route::get('/registeration','Admin\HomeController@registeration');
    Route::get('/binary','Admin\HomeController@binary');
    Route::get('/client_commission','Admin\HomeController@commission_clients');
    Route::get('/client_report','Admin\HomeController@clients');

    Route::get('/direct','Admin\HomeController@direct');
    Route::get('/qualified','Admin\HomeController@order_qualified');
    Route::get('/store','Admin\HomeController@order_store');
    Route::get('/store_commission','Admin\HomeController@store_commission');
    Route::post('/reports/filters','Admin\HomeController@filter');


    Route::delete('/clients','Admin\ClientController@filter')->name('clients.destroy.all');
    Route::get('/clients/negative','Admin\ClientController@get_negative')->name('clients.negative');
    Route::resource('/clients','Admin\ClientController');
    Route::post('/clients_search','Admin\ClientController@filter')->name('clients.search');
    Route::post('/clients/negative/search', 'Admin\ClientController@filter_negative')->name('clients.search_negative');
    Route::resource('/products','Admin\ProductController');

    Route::resource('/videos','Admin\VideoController');
    Route::post('/videos/search','Admin\VideoController@filter')->name('videos.search');
    Route::resource('/albums','Admin\AlbumController');

    Route::post('/videos/add_video','Admin\VideoController@store_video')->name('videos.add_video');

    Route::get('/limited_product','Admin\ProductController@count')->name('products.limits');
    Route::post('/products_filter', 'Admin\ProductController@filter')->name('products.search');


    Route::resource('/categories','Admin\CategoryController');
    Route::resource('/subcategories','Admin\SubcategoryController');

    Route::resource('/cities','Admin\CityController');
    Route::resource('/states','Admin\StateController');
    Route::resource('/countries','Admin\CountryController');


    Route::resource('/sliders','Admin\SliderController');
    Route::resource('/messages','Admin\MessagesController');
    Route::post('/messages/filter','Admin\MessagesController@filter')->name('messages.search');


    Route::resource('/admins','Admin\AdminController');
    Route::resource('/baccounts','Admin\BaccountController');
    Route::resource('/baskets','Admin\BasketController');
    Route::post('/orders_filter', 'Admin\BasketController@filter')->name('baskets.search');

    Route::resource('/banks', 'Admin\BankController');
    Route::post('/banks/filter', 'Admin\BankController@filter')->name('banks.search');

    Route::resource('/epins', 'Admin\EpinController');
    Route::post('/epins/filter', 'Admin\EpinController@filter')->name('epins.search');

    Route::resource('/tree', 'Admin\TreeController');
    Route::resource('/contacts', 'Admin\ContactController');

    Route::resource('/about', 'Admin\AboutController');
    Route::resource('/infinity', 'Admin\infinityController');
    Route::resource('/process', 'Admin\ProcessController');

    Route::resource('/events', 'Admin\EventController');
    Route::resource('/requests', 'Admin\EventrequestController');

    Route::resource('/founders', 'Admin\FounderController');

    Route::resource('/roles','Admin\RoleController');

});


Route::get('/home', 'HomeController@index')->name('home');
