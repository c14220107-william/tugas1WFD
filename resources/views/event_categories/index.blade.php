@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Event Category List</h1>

    <a href="{{ route('event_categories.create') }}" class="btn btn-primary mb-4">Create </a>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <table id="example" class="display" style="width: 100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td><a href="{{ route('event_categories.show', $category->id) }}" >{{ $category->name }}</a></td>
                    <td>
                        <a href="{{ route('event_categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('event_categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
