<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'SIPPAUD - Hewan')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-blue-50 min-h-screen">

    <!-- HEADER -->
    <header class="bg-blue-600 text-white px-6 py-4 flex justify-between items-center">
        
        <!-- JUDUL + IKON -->
        <h1 class="text-xl font-bold">
            SIPPAUD 🐘
        </h1>

        <!-- DASHBOARD -->
        <a href="/dashboard"
           class="bg-blue-500 px-4 py-2 rounded hover:bg-blue-400 text-sm">
            Dashboard
        </a>
    </header>

    <!-- CONTENT -->
    <main class="py-10">
        @yield('content')
    </main>

</body>
</html>