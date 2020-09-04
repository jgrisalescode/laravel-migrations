<?php

use Illuminate\Support\Facades\DB;
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
    return view('welcome');
});

// Using DB Interface for CRUD

Route::get('/insert', function () {
    DB::insert("INSERT INTO articles (name, price, origin, observations, section) VALUES (?,?,?,?,?)", ["Jarron", 15.2, "Colombia", "Super bonito", "Cocina"]);
});

Route::get('/read', function () {
    $articles = DB::select("SELECT * FROM articles");
    foreach ($articles as $article) {
        return $article->name;
    }
});

Route::get('/update', function () {
    DB::update("UPDATE articles SET section='Cerámica' WHERE id=?", [1]);
});

Route::get('/delete', function () {
    DB::update("DELETE FROM articles WHERE id=?", [1]);
});
