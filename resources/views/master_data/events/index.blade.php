@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Event List</h1>

    <a href="{{ route('events.create') }}" class="btn btn-primary mb-4">Add Event</a>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table id="example" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>Event Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>Organizer</th>
                <th>About</th>
                <th>Tags</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td><a href="{{ route('events.show', $event->id) }}">{{ $event->title }}</a></td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->venue }}</td>
                    <td>{{ $event->organizer->name }}</td>
                    <td>{{ $event->description }}</td>
                    <td>{{ $event->tags }}</td>
                    <td>
                        
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
</div>

@endsection
