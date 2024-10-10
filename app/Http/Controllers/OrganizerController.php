<?php

namespace App\Http\Controllers;

use App\Models\Organizers;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizers = Organizers::all(); // Mengambil semua organizer
        return view('organizers.index', compact('organizers'));
    }

    public function create()
    {
        return view('organizers.create'); // Menampilkan form untuk menambah organizer baru
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
        ]);

        Organizers::create($validatedData); // Menyimpan data organizer baru
        return redirect()->route('organizers.index')->with('success', 'Organizer created successfully.');
    }

    public function show(Organizers $organizer)
    {
        return view('organizers.show', compact('organizer')); // Menampilkan detail organizer
    }

    public function edit(Organizers $organizer)
    {
        return view('organizers.edit', compact('organizer')); // Menampilkan form edit
    }

    public function update(Request $request, Organizers $organizer)
    {
        // Validasi data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
        ]);

        $organizer->update($validatedData); // Memperbarui data organizer
        return redirect()->route('organizers.index')->with('success', 'Organizer updated successfully.');
    }

    public function destroy(Organizers $organizer)
    {
        $organizer->delete(); // Menghapus organizer
        return redirect()->route('organizers.index')->with('success', 'Organizer deleted successfully.');
    }
}
