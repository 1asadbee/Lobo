<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Phone Numbers
    Route::apiResource('phone-numbers', 'PhoneNumbersApiController');

    // Countries
    Route::apiResource('countries', 'CountriesApiController');

    // Cities
    Route::apiResource('cities', 'CitiesApiController');

    // States
    Route::apiResource('states', 'StatesApiController');

    // Delivery Types
    Route::post('delivery-types/media', 'DeliveryTypesApiController@storeMedia')->name('delivery-types.storeMedia');
    Route::apiResource('delivery-types', 'DeliveryTypesApiController');

    // Vehicles
    Route::post('vehicles/media', 'VehiclesApiController@storeMedia')->name('vehicles.storeMedia');
    Route::apiResource('vehicles', 'VehiclesApiController');

    // Vehicle Types
    Route::post('vehicle-types/media', 'VehicleTypesApiController@storeMedia')->name('vehicle-types.storeMedia');
    Route::apiResource('vehicle-types', 'VehicleTypesApiController');

    // Vehicle Models
    Route::post('vehicle-models/media', 'VehicleModelsApiController@storeMedia')->name('vehicle-models.storeMedia');
    Route::apiResource('vehicle-models', 'VehicleModelsApiController');

    // Carriers
    Route::apiResource('carriers', 'CarriersApiController');

    // Carrier Posts
    Route::apiResource('carrier-posts', 'CarrierPostsApiController');

    // Load Types
    Route::apiResource('load-types', 'LoadTypesApiController');

    // Currencies
    Route::apiResource('currencies', 'CurrenciesApiController');

    // Customer Posts
    Route::apiResource('customer-posts', 'CustomerPostsApiController');

    // Declarants
    Route::apiResource('declarants', 'DeclarantsApiController');

    // Wallet
    Route::apiResource('wallets', 'WalletApiController');

    // Carrier Posts Description
    Route::apiResource('carrier-posts-descriptions', 'CarrierPostsDescriptionApiController');

    // Customer Posts Description
    Route::apiResource('customer-posts-descriptions', 'CustomerPostsDescriptionApiController');

    // Declarants Description
    Route::apiResource('declarants-descriptions', 'DeclarantsDescriptionApiController');

    // Insertion
    Route::apiResource('insertions', 'InsertionApiController');

    // Expenses Carrier Posts
    Route::apiResource('expenses-carrier-posts', 'ExpensesCarrierPostsApiController');

    // Expenses Customer Posts
    Route::apiResource('expenses-customer-posts', 'ExpensesCustomerPostsApiController');

    // Expenses Declarant Posts
    Route::apiResource('expenses-declarant-posts', 'ExpensesDeclarantPostsApiController');

    // Trailer Size
    Route::apiResource('trailer-sizes', 'TrailerSizeApiController');
});
