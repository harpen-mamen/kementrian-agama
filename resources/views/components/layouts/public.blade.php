<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Peta Harmoni Sangihe' }}</title>
    <meta name="description" content="{{ $description ?? 'Portal informasi publik Kementerian Agama Kabupaten Kepulauan Sangihe.' }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    @stack('styles')
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
    <x-public.navbar />

    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <x-public.footer />

    @stack('scripts')
</body>
</html>
