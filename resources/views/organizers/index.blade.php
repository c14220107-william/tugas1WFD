@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Organizer List</h1>

    <a href="{{ route('organizers.create') }}" class="btn btn-primary mb-4">Create</a>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table id="example" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organizers as $organizer)
                <tr>
                    <td>{{ $organizer->name }}</td>
                    <td>{{ $organizer->description }}</td>
                    <td>
                        <a href="{{ route('organizers.show', $organizer->id) }}" class="btn btn-info">View</a>
                        <a href="{{ route('organizers.edit', $organizer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('organizers.destroy', $organizer->id) }}" method="POST" class="d-inline">
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
