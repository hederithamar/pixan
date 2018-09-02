<?php

/**
 * All route names are prefixed with 'admin.auth'.
 */
Route::group([
    'prefix'     => 'auth',
    'as'         => 'auth.',
    'namespace'  => 'Auth',
], function () {
    Route::group([
        'middleware' => 'role:administrator',
    ], function () {
        /*
         * User Management
         */
        Route::group(['namespace' => 'User'], function () {

            /*
             * User Status'
             */
            Route::get('user/deactivated', 'UserStatusController@getDeactivated')->name('user.deactivated');
            Route::get('user/deleted', 'UserStatusController@getDeleted')->name('user.deleted');

            /*
             * User CRUD
             */
            Route::resource('user', 'UserController');

            /*
             * Specific User
             */
            Route::group(['prefix' => 'user/{user}'], function () {
                // Account
                Route::get('account/confirm/resend', 'UserConfirmationController@sendConfirmationEmail')->name('user.account.confirm.resend');

                // Status
                Route::get('mark/{status}', 'UserStatusController@mark')->name('user.mark')->where(['status' => '[0,1]']);

                // Social
                Route::delete('social/{social}/unlink', 'UserSocialController@unlink')->name('user.social.unlink');

                // Confirmation
                Route::get('confirm', 'UserConfirmationController@confirm')->name('user.confirm');
                Route::get('unconfirm', 'UserConfirmationController@unconfirm')->name('user.unconfirm');

                // Password
                Route::get('password/change', 'UserPasswordController@edit')->name('user.change-password');
                Route::patch('password/change', 'UserPasswordController@update')->name('user.change-password.post');

                // Access
                Route::get('login-as', 'UserAccessController@loginAs')->name('user.login-as');

                // Session
                Route::get('clear-session', 'UserSessionController@clearSession')->name('user.clear-session');
            });

            /*
             * Deleted User
             */
            Route::group(['prefix' => 'user/{deletedUser}'], function () {
                Route::get('delete', 'UserStatusController@delete')->name('user.delete-permanently');
                Route::get('restore', 'UserStatusController@restore')->name('user.restore');
            });
        });

        /*
         * Role Management
         */
        Route::group(['namespace' => 'Role'], function () {
            Route::resource('role', 'RoleController', ['except' => ['show']]);
        });

        /*
         * Product Management
         */
        Route::group(['namespace' => 'Product'], function () {

            Route::get('product/deleted', 'ProductStatusController@getDeleted')->name('product.deleted');
            /*
             * Product CRUD
             */
            Route::resource('product', 'ProductController');

            /*
             * Deleted Product
             */
            Route::group(['prefix' => 'product/{deletedProduct}'], function () {
                Route::get('delete', 'ProductStatusController@delete')->name('product.delete-permanently');
                Route::get('restore', 'ProductStatusController@restore')->name('product.restore');
            });
        });
    });

    Route::group([
        'prefix'     => 'donation',
        'as'         => 'donation.',
    ], function () {
        
        /*
         * Donation Management
         */
        Route::group(['namespace' => 'Donation'], function () {
            /*
             * Donation CRUD
             */
            Route::resource('donation', 'DonationController');
        });
        /*
         * Service Management
         */
        Route::group(['namespace' => 'Service'], function () {
            
            Route::get('service/deleted', 'ServiceController@getDeleted')->name('service.deleted');
            /*
             * Service CRUD
             */
            Route::resource('service', 'ServiceController');

            /*
             * Deleted Clothes
             */
            Route::group(['prefix' => 'service/{deletedService}'], function () {
                Route::get('delete', 'ServiceController@delete')->name('service.delete-permanently');
                Route::get('restore', 'ServiceController@restore')->name('service.restore');
            });
        });

        /*
         * Donation Management
         */
        Route::group(['namespace' => 'Voluntary'], function () {
            Route::get('voluntary/deleted', 'VoluntaryController@getDeleted')->name('voluntary.deleted');
            /*
             * Service CRUD
             */
            Route::resource('voluntary', 'VoluntaryController');

            /*
             * Deleted Clothes
             */
            Route::group(['prefix' => 'voluntary/{deletedVoluntary}'], function () {
                Route::get('delete', 'VoluntaryController@delete')->name('voluntary.delete-permanently');
                Route::get('restore', 'VoluntaryController@restore')->name('voluntary.restore');
            });
        });

        /*
         * Alimentos Management
         */
        Route::group(['namespace' => 'Food'], function () {

            Route::get('food/deleted', 'FoodController@getDeleted')->name('food.deleted');
            /*
             * Food CRUD
             */
            Route::resource('food', 'FoodController');

            /*
             * Deleted Food
             */
            Route::group(['prefix' => 'food/{deletedFood}'], function () {
                Route::get('delete', 'FoodController@delete')->name('food.delete-permanently');
                Route::get('restore', 'FoodController@restore')->name('food.restore');
            });
        });

        /*
         * Ropa Management
         */
        Route::group(['namespace' => 'Clothes'], function () {

            Route::get('clothes/deleted', 'ClothesController@getDeleted')->name('clothes.deleted');
            /*
             * Clothes CRUD
             */
            Route::resource('clothes', 'ClothesController');

            /*
             * Deleted Clothes
             */
            Route::group(['prefix' => 'clothes/{deletedClothes}'], function () {
                Route::get('delete', 'ClothesController@delete')->name('clothes.delete-permanently');
                Route::get('restore', 'ClothesController@restore')->name('clothes.restore');
            });
        });

        /*
         * Babies Management
         */
        Route::group(['namespace' => 'Babies'], function () {

            Route::get('babies/deleted', 'BaibiesController@getDeleted')->name('babies.deleted');
            /*
             * Babies CRUD
             */
            Route::resource('babies', 'BabiesController');

            /*
             * Deleted babies
             */
            Route::group(['prefix' => 'babies/{deletedBabies}'], function () {
                Route::get('delete', 'BabiesController@delete')->name('babies.delete-permanently');
                Route::get('restore', 'BabiesController@restore')->name('babies.restore');
            });
        });

        

        /*
         * Muebles Management
         */
        Route::group(['namespace' => 'Furniture'], function () {

            Route::get('furniture/deleted', 'FurnitureController@getDeleted')->name('furniture.deleted');
            /*
             * Food CRUD
             */
            Route::resource('furniture', 'FurnitureController');

            /*
             * Deleted Food
             */
            Route::group(['prefix' => 'furniture/{deletedFurniture}'], function () {
                Route::get('delete', 'FurnitureController@delete')->name('furniture.delete-permanently');
                Route::get('restore', 'FurnitureController@restore')->name('furniture.restore');
            });
        });




    });
});
