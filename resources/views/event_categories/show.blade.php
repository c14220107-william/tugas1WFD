@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">{{ $eventCategory->name }}</h1>

    <a href="{{ route('event_categories.edit', $eventCategory->id) }}" class="btn btn-warning">Edit Category</a>
    <a href="{{ route('event_categories.index') }}" class="btn btn-secondary">Back to Categories</a>
</div>
@endsection
