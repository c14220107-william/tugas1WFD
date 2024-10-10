<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light"">
        <div class="container mx-auto flex justify-between items-center">
            <div class="text-white text-xl font-bold"></div>
            <div class="flex space-x-4">
                <div class="relative group">
                    <button class="text-white px-4 py-2 hover:bg-gray-700 focus:outline-none">Master Data</button>
                    <div class="absolute hidden group-hover:block bg-white text-gray-800 mt-2 rounded shadow-lg">
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Master Event Category</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Master Organizer</a>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Master Event</a>
                    </div>
                </div>
                <button class="text-white px-4 py-2 hover:bg-gray-700 focus:outline-none">Events</button>
            </div>
        </div>
    </nav> --}}

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('events.index') }}">Events</a>
                    </li>
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Master Data
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('event_categories.index') }}">Master Event Category</a></li>
                            <li><a class="dropdown-item" href="{{ route('organizers.index') }}">Master Organizer</a></li>
                            <li><a class="dropdown-item" href="{{ route('master.data.events.index') }}">Master Event</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    
</body>
</html>
