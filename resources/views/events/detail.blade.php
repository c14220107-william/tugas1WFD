@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-4xl p-6 bg-white shadow-md rounded-lg">
    <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $event->title }}</h1>
    
    <div class="mb-6">
        <img src="{{ asset('img/tj.jpg') }}" alt="Event Banner" class="w-full h-64 object-cover rounded-lg">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <p class="text-lg font-semibold text-gray-700"><strong>Venue:</strong> {{ $event->venue }}</p>
            <p class="text-lg font-semibold text-gray-700"><strong>Date:</strong> {{ $event->formatted_date }}</p>
            <p class="text-lg font-semibold text-gray-700"><strong>Time:</strong> {{ $event->start_time }}</p>
        </div>
        
        <div>
            <p class="text-lg font-semibold text-gray-700"><strong>Category:</strong> {{ $event->eventCategory->name }}</p>
            <p class="text-lg font-semibold text-gray-700"><strong>Organizer:</strong> {{ $event->organizer->name }}</p>
            
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-bold text-gray-800 mb-2">Description</h2>
        <p class="text-gray-700">{{ $event->description }}</p>
    </div>

    <div class="mt-4">
        <h2 class="text-xl font-bold text-gray-800 mb-2">Booking Information</h2>
        <p class="text-blue-500"><a href="{{ $event->booking_url }}" target="_blank" class="hover:underline">{{ $event->booking_url }}</a></p>
    </div>

    <div class="mt-4">
        <h2 class="text-xl font-bold text-gray-800 mb-2">Tags</h2>
        <div class="flex flex-wrap">
            @foreach(explode(',', $event->tags) as $tag)
                <span class="bg-blue-200 text-blue-700 px-3 py-1 rounded-full text-sm font-semibold mr-2 mb-2">{{ $tag }}</span>
            @endforeach
        </div>
    </div>

    
</div>
@endsection
