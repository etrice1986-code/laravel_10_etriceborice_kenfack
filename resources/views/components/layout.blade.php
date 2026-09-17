<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Laravel Fortify' }}</title>
    <script src="https://kit.fontawesome.com/f5c8da6a8f.js" crossorigin="anonymous"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="page-{{ $title }}">


    <x-navbar />

    <main class="container py-5">
        {{ $slot }}
    </main>

   



<x-footer />


</body>
</html>
