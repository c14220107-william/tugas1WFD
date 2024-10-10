@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    {{-- <h1 class="text-2xl font-bold mb-4">Event List</h1>

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-4">Add Event</a>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Venue</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->venue }}</td>
                    <td>{{ $event->date }}</td>
                    <td>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}

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
