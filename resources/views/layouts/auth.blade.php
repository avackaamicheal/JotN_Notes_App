<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel101')</title>
    <script src="https://cdn.tailwindcss.com" ></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body class="h-full">
        @yield('content')
</body>
<footer class="py-4 text-center text-xs text-gray-500">
        &copy; {{ date('Y') }} {{ config('JotN', 'JotN') }}. All rights reserved.
</footer>
</html>
