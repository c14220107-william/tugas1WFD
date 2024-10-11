@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">{{ $organizer->name }}</h1>

    <p><strong>Description:</strong> {{ $organizer->description }}</p>
    <p><strong>Facebook Link:</strong> <a href="{{ $organizer->facebook_link }}" class="text-blue-500" target="_blank">{{ $organizer->facebook_link }}</a></p>
    <p><strong>X Link:</strong> <a href="{{ $organizer->x_link }}" class="text-blue-500" target="_blank">{{ $organizer->x_link }}</a></p>
    <p><strong>Website Link:</strong> <a href="{{ $organizer->website_link }}" class="text-blue-500" target="_blank">{{ $organizer->website_link }}</a></p>

    <a href="{{ route('organizers.edit', $organizer->id) }}" class="btn btn-warning">Edit Organizer</a>
    <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
</div>
@endsection
