@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Add Organizer</h1>

    <form action="{{ route('organizers.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="facebook_link" class="form-label">Facebook Link</label>
            <input type="url" name="facebook_link" id="facebook_link" class="form-control">
        </div>

        <div class="mb-3">
            <label for="x_link" class="form-label">X Link</label>
            <input type="url" name="x_link" id="x_link" class="form-control">
        </div>

        <div class="mb-3">
            <label for="website_link" class="form-label">Website Link</label>
            <input type="url" name="website_link" id="website_link" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Add Organizer</button>
    </form>
</div>
@endsection
