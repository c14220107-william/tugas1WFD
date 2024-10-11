@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Event</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')
        @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" value="{{ $event->title }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="venue" class="form-label">Venue</label>
            <input type="text" name="venue" id="venue" value="{{ $event->venue }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" id="date" value="{{ $event->date }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="start_time" class="form-label">Time</label>
            
            <input type="time" name="start_time" id="start_time" value="{{ $event->start_time }}" class="form-control" 
            min="00:00:" max="23:59">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ $event->description }}</textarea>
        </div>

        <div class="mb-3">
            <label for="booking_url" class="form-label">Booking URL</label>
            <input type="url" name="booking_url" id="booking_url" value="{{ $event->booking_url }}" class="form-control">
        </div>

        <div class="mb-3">
            <label for="tags" class="form-label">Tags</label>
            <div class="input-group mb-2">
                <input type="text" name="tagInput" id="tagInput" class="form-control" placeholder="Add a tag" aria-label="Add a tag">
                <button type="button" id="addTag" class="btn btn-outline-secondary">Add</button>
            </div>
            <div id="tagContainer" class="mt-2">
                @foreach($tagsArray as $tag)
                    <span class="badge bg-primary me-1" id="tag-{{ $loop->index }}">{{ $tag }}
                        <button type="button" class="btn-close btn-close-white ms-1" aria-label="Close" onclick="removeTag('tag-{{ $loop->index }}')"></button>
                    </span>
                @endforeach
            </div>
        </div>

        <input type="hidden" name="tags" id="tags" value="{{ $event->tags }}">

        <div class="mb-3">
            <label for="organizers_id" class="form-label">Organizer</label>
            <select name="organizers_id" id="organizers_id" class="form-select" required>
                @foreach ($organizers as $organizer)
                    <option value="{{ $organizer->id }}" {{ $event->organizer_id == $organizer->id ? 'selected' : '' }}>{{ $organizer->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="event_category_id" class="form-label">Event Category</label>
            <select name="event_category_id" id="event_category_id" class="form-select" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $event->event_category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Event</button>
    </form>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        const updateTagsInput = () => {
            const tags = [];
            $('#tagContainer .badge').each(function() {
                tags.push($(this).text().trim());
            });
            $('#tags').val(tags.join(',')); // Memperbarui hidden input dengan string tags
        };

        $('#addTag').on('click', function() {
            const tagValue = $('#tagInput').val().trim();
            if (tagValue) {
                const badge = $('<span class="badge bg-primary me-1"></span>').text(tagValue);
                const closeButton = $('<button type="button" class="btn-close btn-close-white ms-1" aria-label="Close"></button>');

                closeButton.on('click', function() {
                    badge.remove();
                    updateTagsInput(); // Update hidden input saat tag dihapus
                });

                badge.append(closeButton);
                $('#tagContainer').append(badge);
                $('#tagInput').val(''); // Clear input field
                updateTagsInput(); // Update hidden input saat tag ditambahkan
            }
        });

        window.removeTag = function(tagId) {
            document.getElementById(tagId).remove();
            updateTagsInput(); // Update hidden input saat tag dihapus
        };
    });
</script>
@endsection
@endsection
