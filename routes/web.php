<?php

use Illuminate\Support\Facades\Route;

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
    // return view('welcome');

    $data = ['products' => [
                    [
                        "pizza"=> 1,
                        "bottom"=> 3,
                        "topping"=> 4
                    ],
                    [
                        "pizza"=> 2,
                        "bottom"=> 1,
                        "topping"=> 2
                    ]
                ]
            ];
    dump($data);

    // $test = array_filter($data['products'] , function($val, $key) {
    //     dump($key);
    //     dump($val['pizza']);
    //     return $val['pizza'];
    // }, ARRAY_FILTER_USE_BOTH);

    $test = array_column($data['products'], 'pizza');

    dd($test);
});
