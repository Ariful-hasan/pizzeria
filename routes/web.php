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
//     $input = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
// $rand_keys = array_rand($input, 2);
// dump($rand_keys);
// echo $input[$rand_keys[0]] . "\n";

$test = ['Dominos', 'New York Pizza'];
dd($test[array_rand($test, 1)]);
// echo $input[$rand_keys[1]] . "\n";
    // return view('welcome');
});
