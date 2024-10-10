@extends('layouts.app')

@section('content')

<div class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($events as $event)
        <div class="card bg-white p-4">
            <h2 class="text-xl font-bold mb-2">{{ $event->title }}</h2>
            <p>{{ $event->date }}</p>
            <p>{{ $event->venue }}</p>
            <p></p>
            <p class="text-gray-600"> Organizer: {{ $event->organizer->name }}</p>
        </div>

        @endforeach
        
    </div>
</div>
@endsection
