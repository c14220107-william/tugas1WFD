@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">{{ $event->title }}</h1>

    <p><strong>Venue:</strong> {{ $event->venue }}</p>
    <p><strong>Date:</strong> {{ $event->date }}</p>
    <p><strong>Start Time:</strong> {{ $event->start_time }}</p>
    <p><strong>Description:</strong> {{ $event->description }}</p>
    <p><strong>Booking URL:</strong> <a href="{{ $event->booking_url }}" class="text-blue-500" target="_blank">{{ $event->booking_url }}</a></p>
    <p><strong>Tags:</strong> {{ $event->tags }}</p>
    <p><strong>Organizer:</strong> {{ $event->organizers->name }}</p>
    <p><strong>Category:</strong> {{ $event->eventCategory->name }}</p>

    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit Event</a>
    <a href="{{ route('events.index') }}" class="btn btn-secondary">Back to Events</a>
</div>
@endsection
