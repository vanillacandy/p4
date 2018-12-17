<?php
Route::get('/debug', function () {

    $debug = [
        'Environment' => App::environment(),
    ];

    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    //$debug['MySQL connection config'] = config('database.connections.mysql');

    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }

    dump($debug);
});

//This page is the main front page
Route::get('/', 'FoodController@index'); # <-- NEW 1 of 2

Route::get('/food/search', 'FoodController@search'); # <-- NEW 1 of 2
Route::get('/food/search-process', 'FoodController@searchProcess'); # <-- NEW 2 of 2
Route::get('/food/{title}', 'FoodController@search');


Route::any('/practice/{n?}', 'PracticeController@index');