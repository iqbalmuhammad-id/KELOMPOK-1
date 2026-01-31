<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Pengenalan Hewan')</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-cover bg-center"
      style="background-image: url('{{ asset('images/bukit.jpg') }}');">

<div class="min-h-screen bg-black/40">

    <!-- HEADER -->
    <header class="py-5 relative">
        <div class="max-w-6xl mx-auto px-6 relative">

            <!-- DASHBOARD (KIRI) -->
            <a href="/dashboard"
               class="text-white font-semibold hover:underline">
                ← Dashboard
            </a>

            <!-- JUDUL (CENTER BENAR-BENAR) -->
            <h1 class="absolute left-1/2 -translate-x-1/2 top-0
                       text-2xl font-bold text-white tracking-wide">
                Pengenalan Hewan
            </h1>

        </div>
    </header>

    <!-- CONTENT -->
    <main class="max-w-6xl mx-auto px-6 pb-16 mt-6">
        @yield('content')
    </main>

</div>

</body>
</html>