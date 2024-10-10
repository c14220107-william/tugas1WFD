<?php

use App\Http\Controllers\EventsCategoriesController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\OrganizerController;
use Illuminate\Support\Facades\Route;



Route::get('/events', [EventSController::class, 'index'])->name('events.index');
Route::get('/master_data/events', [EventsController::class, 'masterData'])->name('master.data.events.index');


// Resource route untuk events
Route::resource('events', EventsController::class);

// Resource route untuk organizers
Route::resource('organizers', OrganizerController::class);

// Resource route untuk event categories
Route::resource('event_categories', EventsCategoriesController::class);


