<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Portal Harmoni Kemenag Sangihe' }}</title>

    <meta name="description" content="Portal informasi keagamaan, rumah ibadah, pendidikan keagamaan, berita, peta digital, dan layanan publik Kementerian Agama Kabupaten Kepulauan Sangihe.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @stack('styles')
</head>
<body class="overflow-x-hidden bg-white text-slate-800 antialiased">
    @include('components.public.navbar')

    <main>
        @yield('content')
    </main>

    @include('components.public.footer')

    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 900,
            once: true,
            easing: 'ease-out-cubic',
            offset: 80,
        });
    </script>

    @stack('scripts')
</body>
</html>