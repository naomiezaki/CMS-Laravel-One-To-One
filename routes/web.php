<?php

use App\User;
use App\Address;

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

Route::get('/', function () {
    return view('welcome');
});



/*
    ONE TO ONE CRUD

    //Step 1:
        php artisan make:model Address -m

    //Step 2: Add code to database/migrations/2020_01_20_052023_create_addresses_table.php:
        $table->integer('user_id')->unsigned()->nullable();
        $table->string('name');

    //Step 3:
        php artisan migrate

    //Step 4: Add code to app/User.php:
        public function address(){
            return $this->hasOne('App\Address');
        }
    
    //Step 5: Add code to app/Address.php
        protected $fillable = ['name'];
*/
    //Route:
    //I. Creating Data:
            Route::get('/insert', function(){
                $user = User::findOrFail(1);

                $address = new Address(['name'=>'4435 Paulina av NY NY 11218']);

                $user->address()->save($address);
            });
    
    //II. Updating Data:
            Route::get('/update', function(){
                $address = Address::whereUserId(1)->first();
                $address->name = "4353 Update Av, Alaska";

                $address->save();
            });
    
    //III. Reading Data
            Route::get('/read', function(){
                $user = User::findOrFail(1);

                echo $user->address->name;
            });
    
    //IV. Deleting Data
            Route::get('/delete', function(){
                $user = User::findOrFail(1);

                $user->address()->delete();
            });



