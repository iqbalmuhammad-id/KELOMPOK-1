<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login SIPPAUD</title>
    @vite('resources/css/app.css')
</head>

<body class="min-h-screen bg-cover bg-center"
      style="background-image: url('{{ asset('images/savana.jpg') }}');">

<div class="min-h-screen flex items-center justify-center bg-black/40">
    @yield('content')
</div>

</body>
</html>