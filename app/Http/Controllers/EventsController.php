<?php

namespace App\Http\Controllers;

use App\Models\Event_Categories;
use App\Models\Events;
use App\Models\Organizers;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function index()
    {
        $events = Events::with('organizer', 'eventCategory')->get(); // Mengambil semua event
        return view('events.index', compact('events'));
    }

    public function create()
    {
        $organizers = Organizers::all(); // Mengambil semua organizer
        $categories = Event_Categories::all(); // Mengambil semua kategori event
        return view('events.create', compact('organizers', 'categories'));
    }

    public function masterData()
    {
    $events = Events::with('organizer')->get(); // Eager loading
    return view('master_data.events.index', compact('events')); // Untuk tampilan tabel
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
            'organizer_id' => 'required|exists:organizers,id',
            'event_category_id' => 'required|exists:event__categories,id',
        ]);

        Events::create($validatedData); // Menyimpan data event baru
        // Jika tags tidak kosong, simpan atau proses tags
        if ($request->tags) {
            $tags = explode(',', $request->tags); // Memisahkan tags berdasarkan koma
            // Simpan tags ke dalam database atau lakukan hal lainnya
        }
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Events $event)
    {
        return view('events.show', compact('event')); // Menampilkan detail event
    }

    public function edit(Events $event)
    {
        $organizers = Organizers::all(); // Mengambil semua organizer
        $categories = Event_Categories::all(); // Mengambil semua kategori event

        // Memisahkan tags menjadi array
        $tagsArray = explode(',', $event->tags); // Memecah string tags menjadi array

        return view('events.edit', compact('event', 'organizers', 'categories', 'tagsArray'));
    }

    public function update(Request $request, Events $event)
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
            'organizer_id' => 'required|exists:organizers,id',
            'event_category_id' => 'required|exists:event__categories,id',
        ]);

        $event->update($validatedData); // Memperbarui data event
        // Proses tags
        $tags = implode(',', array_map('trim', explode(',', $request->input('tags', '')))); // Menggabungkan tags menjadi string
        $event->tags = $tags; // Menyimpan kembali string tags ke database
        $event->save();
        return redirect()->route('events.index')->with('success', 'Event updated successfully.');
    }

    public function destroy(Events $event)
    {
        $event->delete(); // Menghapus event
        return redirect()->route('events.index')->with('success', 'Event deleted successfully.');
    }
}
