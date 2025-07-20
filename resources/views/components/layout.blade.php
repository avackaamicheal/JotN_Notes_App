<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'JotN - Team Collaboration')</title>
    <!-- Preload assets -->
    <link rel="preload" href="https://cdn.tailwindcss.com" as="script">
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" as="style">
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" as="style">

    <!-- CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Favicon -->
    <link rel="icon" href="/favicon.ico" type="image/x-icon">

    <!-- Dark mode support -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: {
                            600: '#2563eb',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 min-h-screen flex flex-col transition-colors duration-200">
    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow-sm py-4 px-6 sticky top-0 z-10">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Logo/Branding -->
            <div class="flex items-center space-x-2">
                <a href="{{ route('teams.index') }}">
                    <i class="bi bi-journal-bookmark-fill text-2xl text-primary-600 dark:text-primary-400"></i>
                    <h1 class="text-xl font-bold text-primary-600 dark:text-primary-400">JotN</h1>
                </a>
            </div>

            <!-- Page Title -->
            <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                {{ $heading }}
            </h2>

            <!-- User Dropdown -->
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                    <span class="text-gray-700 dark:text-gray-300">Welcome, {{ Str::title(Auth::user()->name) }}</span>
                    <i class="fas fa-chevron-down text-gray-500 dark:text-gray-400 transition-transform duration-200" :class="{ 'transform rotate-180': open }"></i>
                </button>

                <!-- Dropdown Menu -->
                <div x-show="open" @click.away="open = false"
                     class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-md shadow-lg py-1 z-20">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                            <i class="fas fa-sign-out-alt mr-2"></i> Log Out
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </header>

    <!-- Flash Messages -->
    <div class="container mx-auto px-6 pt-4">
        <x-flash_message></x-flash_message>
    </div>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto p-6">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 py-4 px-6 border-t dark:border-gray-700">
        <div class="container mx-auto text-center text-gray-500 dark:text-gray-400 text-sm">
            © {{ date('Y') }} JotN. All rights reserved.
            <div class="mt-1 flex justify-center space-x-4">
                <a href="#" class="hover:text-primary-600 dark:hover:text-primary-400">Terms</a>
                <a href="#" class="hover:text-primary-600 dark:hover:text-primary-400">Privacy</a>
                <a href="#" class="hover:text-primary-600 dark:hover:text-primary-400">Contact</a>
            </div>
        </div>
    </footer>

    <!-- Alpine.js for dropdown functionality -->
    <script src="//unpkg.com/alpinejs" defer></script>
</body>
</html>
