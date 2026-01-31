<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SIPPAUD</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-cover bg-center"
      style="background-image: url('{{ asset('images/savana.jpg') }}');">

<div class="min-h-screen bg-black/40">

    <!-- HEADER -->
    <div class="flex justify-between items-center px-6 py-4 text-white">
        <button id="menuBtn" class="text-3xl">☰</button>


        <a href="/logout" class="bg-red-500 px-4 py-2 rounded hover:bg-red-600">
            Logout
        </a>
    </div>

    <!-- SIDEBAR -->
    <div id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-white shadow-lg transform -translate-x-full transition-transform duration-300 z-50">
        <div class="p-4 font-bold text-xl border-b">Menu</div>
        <a href="/dashboard" class="block px-4 py-3 hover:bg-green-100">Dashboard</a>
        <a href="/kelola-hewan" class="block px-4 py-3 hover:bg-green-100">Kelola Hewan</a>
        <a href="/kelola-tumbuhan" class="block px-4 py-3 hover:bg-green-100">Kelola Tumbuhan</a>
        <div class="px-4 py-3 text-gray-500">Tentang SIPPAUD</div>
    </div>

    <!-- CONTENT -->
    <div class="p-10 text-white">
        @yield('content')
    </div>

</div>

<script>
document.getElementById('menuBtn').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('-translate-x-full');
});
</script>

</body>
</html>