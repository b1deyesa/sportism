<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers')->group(function() {
    
    // Guest
    Route::namespace('Guest')->name('guest.')->group(function() {
        Route::get('/', function() {
            return view('guest.index', [
                'events' => Event::orderBy('order')->get()
            ]);
        })->name('index');
    });
    
    // Superadmin
    Route::middleware('auth')->namespace('Superadmin')->prefix('superadmin')->name('superadmin.')->group(function() {
        Route::view('/', 'superadmin.index')->name('index');
        Route::resource('event', 'EventController');
        Route::resource('club', 'ClubController');
        Route::resource('team', 'TeamController');
    });
    
    // Admin Event
    Route::middleware('auth')->namespace('AdminEvent')->prefix('admin-event')->name('admin-event.')->group(function() {
        Route::resource('event', 'EventController');
    });
    
    // Admin Team
    Route::middleware('auth')->namespace('AdminTeam')->prefix('admin-team')->name('admin-team.')->group(function() {
        Route::view('/', 'admin-team.index')->name('index');
    });
    
});
