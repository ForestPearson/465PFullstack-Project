<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\DeckController;

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

Route::controller(WelcomeController::class)->group(function() {
    Route::get('/', 'show')->name('welcome');
});

Route::controller(ProfileController::class)->group(function() {
    Route::get('/profile', 'show')->name('profile');
    Route::get('/signup', 'signUp')->name('signup');
    Route::get('/changeProfile', 'changeProfile')->name('changeProfile');
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/admin', 'show')->name('admin');
    Route::get('/sync', 'syncDB')->name('sync');
});

Route::post('login', [LoginController::class,'authenticate'])->name('login');

Route::get('logout', [LoginController::class,'logout'])->name('logout');

Route::controller(UserController::class)->group(function() {
    Route::get('/authentication', function () {
        // Retrieve a piece of data from the session...
        $value = session('key');
     
        // Specifying a default value...
        $value = session('key', 'default');
     
        // Store a piece of data in the session...
        session(['key' => 'value']);
    });//->name('authenticate');
});

Route::controller(CardController::class)->group(function() {
    Route::get('/browse', 'show')->name('browse');
});

Route::controller(DeckController::class)->group(function() {
    Route::get('/decks', 'show')->name('decks');
    Route::get('/createDeck', 'createDeck')->name('createDeck');
    Route::get('/modify', 'modifyDeck')->name('modify');
    Route::get('/deleteCard', 'deleteCard')->name('deleteCard');
    Route::get('/deleteDeck/{deck_id}', 'deleteDeck')->name('deleteDeck');
});

Route::controller(CardController::class)->group(function() {
    Route::get('getAllCards', [CardController::class,'getAllCards'])->name('getAllCards');
    Route::get('getCardByName', [CardController::class,'getCardByName'])->name('getCardByName');
    Route::get('getCardsByColor', [CardController::class,'getCardsByColor'])->name('getCardsByColor');
    Route::get('getCardsBySet', [CardController::class,'getCardsBySet'])->name('getCardsBySet');
    Route::get('getCardsByType', [CardController::class,'getCardsByType'])->name('getCardsByType');
    Route::get('getCardsByRarity', [CardController::class,'getCardsByRarity'])->name('getCardsByRarity');
    Route::get('getMultiFilter', [CardController::class,'getMultiFilter'])->name('getMultiFilter');
});
Route::controller(DeckController::class)->group(function() {
    Route::get('getUserDecks', [DeckController::class,'getUserDecks'])->name('getUserDecks');
    Route::get('getDeckByName', [DeckController::class,'getDeckByName'])->name('getDeckByName');
    Route::get('getDeckCards', [DeckController::class,'getDeckCards'])->name('getDeckCards');
    Route::get('addCardsToDeck', [DeckController::class,'addCardsToDeck'])->name('addCardsToDeck');
});