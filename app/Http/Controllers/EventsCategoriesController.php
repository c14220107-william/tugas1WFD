<?php

namespace App\Http\Controllers;

use App\Models\Event_Categories;
use Illuminate\Http\Request;

class EventsCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Event_Categories::all(); // Mengambil semua kategori event
        return view('event_categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Event_Categories::create($validatedData); 
        return redirect()->route('event_categories.index')->with('success', 'Event category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Event_Categories $eventCategory)
    {
        return view('event_categories.show', compact('eventCategory')); // Menampilkan detail kategori event
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event_Categories $eventCategory)
    {
        return view('event_categories.edit', compact('eventCategory')); // Menampilkan form edit

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event_Categories $eventCategories)
    {
         // Validasi data
         $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $eventCategories->update($validatedData); 
        
        return redirect()->route('event_categories.index')->with('success', 'Event category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event_Categories $eventCategories)
    {
        $eventCategories->delete();
        return redirect()->route('event_categories.index')->with('success', 'Event category deleted successfully.');

    }
}
