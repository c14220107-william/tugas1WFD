<?php

namespace App\Http\Controllers;

use App\Models\Organizers;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    public function index()
    {
        $organizers = Organizers::all(); 
        return view('organizers.index', compact('organizers'));
    }

    public function create()
    {
        return view('organizers.create'); 
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
        ]);

        Organizers::create($validatedData); 
        return redirect()->route('organizers.index')->with('success', 'Organizer created successfully.');
    }

    public function show(Organizers $organizer)
    {
        return view('organizers.show', compact('organizer')); 
    }

    public function edit(Organizers $organizer)
    {
        return view('organizers.edit', compact('organizer'));
    }

    public function update(Request $request, Organizers $organizer)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
        ]);

        $organizer->update($validatedData);
        return redirect()->route('organizers.index')->with('success', 'Organizer updated successfully.');
    }

    public function destroy(Organizers $organizer)
    {
        $organizer->delete(); 
        return redirect()->route('organizers.index')->with('success', 'Organizer deleted successfully.');
    }
    public function detail(Organizers $organizer){


    }
}
