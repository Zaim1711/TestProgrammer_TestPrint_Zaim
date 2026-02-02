<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Fastprint Test</title>

    <!-- Tailwind CDN (aman untuk tes) -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow mb-6">
        <div class="max-w-7xl mx-auto px-4 py-4 font-bold">
            Fastprint – Test Programmer
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    @stack('scripts')

</body>
</html>
