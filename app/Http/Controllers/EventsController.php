<?php

namespace App\Http\Controllers;

use App\Models\Event_Categories;
use App\Models\Events;
use App\Models\Organizers;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{

    
    public function index()
    {
        $events = Events::with('organizer', 'eventCategory')->get(); 
        return view('events.index', compact('events'));
    }

    public function create()
    {
        $organizers = Organizers::all(); 
        $categories = Event_Categories::all();
        return view('events.create', compact('organizers', 'categories'));
    }

    public function masterData()
    {
    $events = Events::with('organizer')->get(); 
    return view('master_data.events.index', compact('events')); 
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'description' => 'required|string',
            'booking_url' => 'nullable|url',
            'tags' => 'nullable|string',
            'organizers_id' => 'required|exists:organizers,id',
            'event_category_id' => 'required|exists:event__categories,id',
        ]);

        Events::create($validatedData); 
        
        if ($request->tags) {
            $tags = explode(',', $request->tags); 
            
        }
        return redirect()->route('master.data.events.index')->with('success', 'Event created successfully.');
    }

    public function show(Events $event)
    {
        
        $event->formatted_date = Carbon::parse($event->date)->format('l, d F Y'); 
        return view('events.show', compact('event')); 
    }

    public function edit(Events $event)
    {
        $organizers = Organizers::all(); 
        $categories = Event_Categories::all(); 

        // Memisahkan tags menjadi array
        $tagsArray = explode(',', $event->tags); 

        return view('events.edit', compact('event', 'organizers', 'categories', 'tagsArray'));
    }

    public function update(Request $request, Events $event)
    {
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'venue' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'description' => 'required|string',
            'booking_url' => 'nullable|url',
            'tags' => 'nullable|string',
            'organizers_id' => 'required|exists:organizers,id',
            'event_category_id' => 'required|exists:event__categories,id',
        ]);

        $event->update($validatedData); // Memperbarui data event
        // Proses tags
        $tags = implode(',', array_map('trim', explode(',', $request->input('tags', '')))); // Menggabungkan tags menjadi string
        $event->tags = $tags; // Menyimpan kembali string tags ke database
        $event->save();
        return redirect()->route('master.data.events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Events $event)
    {
        $event->delete(); 
        return redirect()->route('master.data.events.index')->with('success', 'Event deleted successfully.');
    }

    
}
