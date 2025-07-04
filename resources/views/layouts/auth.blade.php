<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Laravel101')</title>
    <script src="https://cdn.tailwindcss.com" ></script>
</head>
<body class="h-full">
        @yield('content')
</body>
</html>
