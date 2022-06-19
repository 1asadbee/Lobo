<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/ru');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    Route::post('add_number',[\App\Http\Controllers\AjaxController::class,'add_number'])->name('add_number');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');
    Route::get('test',[\App\Http\Controllers\TestController::class,'test'])->name('test');
    Route::get('test2',[\App\Http\Controllers\TestController::class,'test2'])->name('test2');

    // Phone Numbers
    Route::delete('phone-numbers/destroy', 'PhoneNumbersController@massDestroy')->name('phone-numbers.massDestroy');
    Route::resource('phone-numbers', 'PhoneNumbersController');

    // Countries
    Route::delete('countries/destroy', 'CountriesController@massDestroy')->name('countries.massDestroy');
    Route::resource('countries', 'CountriesController');

    // Cities
    Route::delete('cities/destroy', 'CitiesController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CitiesController');

    // States
    Route::delete('states/destroy', 'StatesController@massDestroy')->name('states.massDestroy');
    Route::resource('states', 'StatesController');

    // Delivery Types
    Route::delete('delivery-types/destroy', 'DeliveryTypesController@massDestroy')->name('delivery-types.massDestroy');
    Route::post('delivery-types/media', 'DeliveryTypesController@storeMedia')->name('delivery-types.storeMedia');
    Route::post('delivery-types/ckmedia', 'DeliveryTypesController@storeCKEditorImages')->name('delivery-types.storeCKEditorImages');
    Route::resource('delivery-types', 'DeliveryTypesController');

    // Vehicles
    Route::delete('vehicles/destroy', 'VehiclesController@massDestroy')->name('vehicles.massDestroy');
    Route::post('vehicles/media', 'VehiclesController@storeMedia')->name('vehicles.storeMedia');
    Route::post('vehicles/ckmedia', 'VehiclesController@storeCKEditorImages')->name('vehicles.storeCKEditorImages');
    Route::resource('vehicles', 'VehiclesController');

    // Vehicle Types
    Route::delete('vehicle-types/destroy', 'VehicleTypesController@massDestroy')->name('vehicle-types.massDestroy');
    Route::post('vehicle-types/media', 'VehicleTypesController@storeMedia')->name('vehicle-types.storeMedia');
    Route::post('vehicle-types/ckmedia', 'VehicleTypesController@storeCKEditorImages')->name('vehicle-types.storeCKEditorImages');
    Route::resource('vehicle-types', 'VehicleTypesController');

    // Vehicle Models
    Route::delete('vehicle-models/destroy', 'VehicleModelsController@massDestroy')->name('vehicle-models.massDestroy');
    Route::post('vehicle-models/media', 'VehicleModelsController@storeMedia')->name('vehicle-models.storeMedia');
    Route::post('vehicle-models/ckmedia', 'VehicleModelsController@storeCKEditorImages')->name('vehicle-models.storeCKEditorImages');
    Route::resource('vehicle-models', 'VehicleModelsController');

    // Carriers
    Route::delete('carriers/destroy', 'CarriersController@massDestroy')->name('carriers.massDestroy');
    Route::resource('carriers', 'CarriersController');

    // Carrier Posts
    Route::delete('carrier-posts/destroy', 'CarrierPostsController@massDestroy')->name('carrier-posts.massDestroy');
    Route::resource('carrier-posts', 'CarrierPostsController');

    // Load Types
    Route::delete('load-types/destroy', 'LoadTypesController@massDestroy')->name('load-types.massDestroy');
    Route::resource('load-types', 'LoadTypesController');

    // Currencies
    Route::delete('currencies/destroy', 'CurrenciesController@massDestroy')->name('currencies.massDestroy');
    Route::resource('currencies', 'CurrenciesController');

    // Customer Posts
    Route::delete('customer-posts/destroy', 'CustomerPostsController@massDestroy')->name('customer-posts.massDestroy');
    Route::resource('customer-posts', 'CustomerPostsController');

    // Declarants
    Route::delete('declarants/destroy', 'DeclarantsController@massDestroy')->name('declarants.massDestroy');
    Route::resource('declarants', 'DeclarantsController');

    // Wallet
    Route::delete('wallets/destroy', 'WalletController@massDestroy')->name('wallets.massDestroy');
    Route::resource('wallets', 'WalletController');

    // Carrier Posts Description
    Route::delete('carrier-posts-descriptions/destroy', 'CarrierPostsDescriptionController@massDestroy')->name('carrier-posts-descriptions.massDestroy');
    Route::resource('carrier-posts-descriptions', 'CarrierPostsDescriptionController');

    // Customer Posts Description
    Route::delete('customer-posts-descriptions/destroy', 'CustomerPostsDescriptionController@massDestroy')->name('customer-posts-descriptions.massDestroy');
    Route::resource('customer-posts-descriptions', 'CustomerPostsDescriptionController');

    // Declarants Description
    Route::delete('declarants-descriptions/destroy', 'DeclarantsDescriptionController@massDestroy')->name('declarants-descriptions.massDestroy');
    Route::resource('declarants-descriptions', 'DeclarantsDescriptionController');

    // Insertion
    Route::delete('insertions/destroy', 'InsertionController@massDestroy')->name('insertions.massDestroy');
    Route::resource('insertions', 'InsertionController');

    // Expenses Carrier Posts
    Route::delete('expenses-carrier-posts/destroy', 'ExpensesCarrierPostsController@massDestroy')->name('expenses-carrier-posts.massDestroy');
    Route::resource('expenses-carrier-posts', 'ExpensesCarrierPostsController');

    // Expenses Customer Posts
    Route::delete('expenses-customer-posts/destroy', 'ExpensesCustomerPostsController@massDestroy')->name('expenses-customer-posts.massDestroy');
    Route::resource('expenses-customer-posts', 'ExpensesCustomerPostsController');

    // Expenses Declarant Posts
    Route::delete('expenses-declarant-posts/destroy', 'ExpensesDeclarantPostsController@massDestroy')->name('expenses-declarant-posts.massDestroy');
    Route::resource('expenses-declarant-posts', 'ExpensesDeclarantPostsController');

    // Trailer Size
    Route::delete('trailer-sizes/destroy', 'TrailerSizeController@massDestroy')->name('trailer-sizes.massDestroy');
    Route::resource('trailer-sizes', 'TrailerSizeController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
