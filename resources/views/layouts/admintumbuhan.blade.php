<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SIPPAUD - Tumbuhan')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-green-50 min-h-screen">

    <!-- HEADER -->
    <header class="bg-green-600 text-white px-6 py-4 flex justify-between items-center">
        <h1 class="text-xl font-bold">SIPPAUD 🌱</h1>

        <a href="/dashboard"
           class="bg-green-500 px-4 py-2 rounded hover:bg-green-400 text-sm">
            Dashboard
        </a>
    </header>

    <!-- CONTENT -->
    <main class="py-10">
        @yield('content')
    </main>

</body>
</html>