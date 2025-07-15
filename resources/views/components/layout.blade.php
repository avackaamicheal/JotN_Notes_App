<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Microsoft Teams icon from Tabler Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-sm py-4 px-6">
        
        {{-- flash message --}}
        <x-flash_message></x-flash_message>


        <div class="container mx-auto flex justify-between items-center">
            <div class="bi bi-journal-bookmark-fill text-2xl font-bold text-blue-600">JotN</div>
            <div class=" font-bold text-2xl text-blue-600">{{ $heading }}</div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
            @csrf
            <button>Log Out</button>
            </form>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto p-6 flex items-center justify-center">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white py-4 px-6 border-t">
        <div class="container mx-auto text-center text-gray-500 text-sm">
            © 2025 JotN. All rights reserved.
        </div>
    </footer>
</body>
</html>
