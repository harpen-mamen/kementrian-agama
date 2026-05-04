<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Harmoni Sangihe</title>
    <meta name="description" content="Portal informasi keagamaan, rumah ibadah, pendidikan keagamaan, peta digital, statistik, berita, dan layanan publik Kementerian Agama Kabupaten Kepulauan Sangihe.">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="bg-slate-50 text-slate-800 antialiased">
    <header
        x-data="{
            scrolled: false,
            mobileOpen: false,
            init() {
                this.scrolled = window.scrollY > 80;
                window.addEventListener('scroll', () => {
                    this.scrolled = window.scrollY > 80;
                });
            }
        }"
        class="fixed inset-x-0 top-0 z-50"
    >
        <nav
            :class="scrolled
                ? 'mt-4 max-w-7xl rounded-full border border-slate-200/70 bg-white/92 shadow-[0_20px_60px_rgba(15,23,42,0.12)] backdrop-blur-xl'
                : 'mt-0 max-w-7xl bg-transparent'"
            class="mx-auto px-5 transition-all duration-500 sm:px-6 lg:px-8"
        >
            <div
                :class="scrolled ? 'h-20' : 'h-24'"
                class="flex items-center justify-between transition-all duration-500"
            >
                <a href="/" class="flex items-center gap-3">
                   <div
   
>
    <img
        src="{{ asset('images/logo-kemenag-sangihe.png') }}"
        alt="Logo Kementerian Agama Kabupaten Kepulauan Sangihe"
       class="h-16 w-auto object-contain transition-all duration-500"
    >
</div>

                    <div>
                        <div
                            :class="scrolled ? 'text-slate-900' : 'text-white'"
                            class="text-base font-extrabold leading-tight tracking-[-0.02em] transition-colors duration-500 md:text-lg"
                        >
                            Peta Harmoni Sangihe
                        </div>

                        <div
                            :class="scrolled ? 'text-slate-500' : 'text-white/80'"
                            class="hidden text-xs font-semibold transition-colors duration-500 sm:block"
                        >
                            Kementerian Agama Kab. Kepulauan Sangihe
                        </div>
                    </div>
                </a>

                <div class="hidden items-center gap-8 lg:flex">
                    <a href="/" :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'" class="nav-link">Beranda</a>
                    <a href="{{ route('public.profil') }}" :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'" class="nav-link">Profil</a>
                    <a href="{{ route('public.statistik') }}" :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'" class="nav-link">Informasi</a>
                    <a href="{{ route('public.berita.index') }}" :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'" class="nav-link">Berita</a>
                    <a href="{{ route('public.rumah-ibadah.index') }}" :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'" class="nav-link">Rumah Ibadah</a>
                    <a href="{{ route('public.peta') }}" :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'" class="nav-link">Peta</a>

                    
                </div>

                <button
                    type="button"
                    @click="mobileOpen = !mobileOpen"
                    :class="scrolled ? 'text-slate-900' : 'text-white'"
                    class="inline-flex h-11 w-11 items-center justify-center rounded-2xl transition lg:hidden"
                >
                    <i x-show="!mobileOpen" class="fa-solid fa-bars text-xl"></i>
                    <i x-show="mobileOpen" x-cloak class="fa-solid fa-xmark text-xl"></i>
                </button>
            </div>

            <div
                x-show="mobileOpen"
                x-cloak
                x-transition
                class="mb-4 rounded-[1.75rem] border border-slate-100 bg-white p-4 shadow-[0_24px_60px_rgba(15,23,42,0.14)] lg:hidden"
            >
                <div class="flex flex-col gap-1">
                    <a href="/" class="rounded-2xl px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">Beranda</a>
                    <a href="{{ route('public.profil') }}" class="rounded-2xl px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">Profil</a>
                    <a href="{{ route('public.statistik') }}" class="rounded-2xl px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">Informasi</a>
                    <a href="{{ route('public.berita.index') }}" class="rounded-2xl px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">Berita</a>
                    <a href="{{ route('public.rumah-ibadah.index') }}" class="rounded-2xl px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">Rumah Ibadah</a>
                    <a href="{{ route('public.peta') }}" class="rounded-2xl px-4 py-3 text-sm font-bold text-slate-700 hover:bg-slate-50">Peta</a>
                    
            </div>
        </nav>
    </header>

    <main>
    <section class="hero-section">
    <div class="absolute inset-0 bg-gradient-to-br from-[#0f5f7a] via-[#2f6b3f] to-slate-950"></div>

    <img
        src="{{ asset('images/hero-sangihe.jpg') }}"
        alt="Kabupaten Kepulauan Sangihe"
        class="hero-bg"
        onerror="this.style.display='none'"
    >

    <div class="absolute inset-0 bg-slate-950/35"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950/70 via-slate-950/10 to-slate-950/25"></div>

    <div class="relative z-10 flex min-h-screen items-center justify-center px-5">
    <div
        x-data="{
            fullText: 'Merawat Harmoni Umat Beragama di Kabupaten Kepulauan Sangihe',
            typedText: '',
            index: 0,
            speed: 70,
            init() {
                setTimeout(() => {
                    this.typeWriter();
                }, 500);
            },
            typeWriter() {
                if (this.index < this.fullText.length) {
                    this.typedText += this.fullText.charAt(this.index);
                    this.index++;

                    setTimeout(() => {
                        this.typeWriter();
                    }, this.speed);
                }
            }
        }"
        class="mx-auto max-w-4xl text-center"
    >
        <h1 class="min-h-[120px] text-balance text-2xl font-medium leading-[1.25] tracking-[-0.02em] text-white sm:text-3xl md:text-4xl lg:text-[42px]">
            <span x-text="typedText"></span>
            <span
                x-show="typedText.length < fullText.length"
                class="typing-caret"
            ></span>
        </h1>
    </div>
</div>
</section>

        <section id="sambutan" class="relative overflow-hidden bg-white py-20 lg:py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(47,107,63,0.05),transparent_28%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_right,rgba(214,166,58,0.06),transparent_30%)]"></div>

    <div class="container-public relative">
        <div class="grid items-center gap-8 lg:grid-cols-12 lg:gap-12">
            <!-- FOTO KECIL DI KIRI -->
            <div class="lg:col-span-3">
                <div class="mx-auto max-w-sm">
                    <div class="overflow-hidden rounded-[1.75rem] border border-slate-100 bg-white p-3 shadow-[0_20px_60px_rgba(15,23,42,0.08)]">
                        <div class="overflow-hidden rounded-[1.35rem] bg-slate-100">
                            <img
                                src="{{ asset('images/pimpinan-placeholder.jpg') }}"
                                alt="Pimpinan Kementerian Agama Kabupaten Kepulauan Sangihe"
                                class="h-[380px] w-full object-cover object-top"
                            >
                        </div>
                    </div>
                </div>
            </div>

            <!-- TEKS DI KANAN -->
            <div class="lg:col-span-9">
                <div class="max-w-4xl">
                    <div class="inline-flex items-center gap-2 rounded-full border border-[#2f6b3f]/15 bg-[#2f6b3f]/10 px-4 py-2 text-[11px] font-extrabold uppercase tracking-[0.16em] text-[#2f6b3f]">
                        <i class="fa-solid fa-handshake-angle"></i>
                        Ucapan Selamat Datang
                    </div>

                    <h2 class="mt-5 text-3xl font-semibold leading-tight tracking-[-0.03em] text-slate-900 sm:text-4xl">
                        Selamat Datang di Portal Harmoni Sangihe
                    </h2>

                    <p class="mt-6 text-base leading-8 text-slate-600">
                        Portal ini dihadirkan sebagai sarana informasi publik Kementerian Agama
                        Kabupaten Kepulauan Sangihe yang menyajikan informasi keagamaan, rumah ibadah,
                        pendidikan keagamaan, berita kegiatan, dan peta digital secara lebih tertata,
                        ramah, serta mudah diakses oleh masyarakat.
                    </p>

                    <p class="mt-5 text-base leading-8 text-slate-600">
                        Kami berharap kehadiran portal ini dapat menjadi ruang informasi yang
                        memperkuat pelayanan, keterbukaan data, serta semangat kerukunan umat
                        beragama dalam kehidupan masyarakat Kabupaten Kepulauan Sangihe.
                    </p>

                    <div class="mt-8 rounded-[1.5rem] border border-slate-100 bg-slate-50 p-6 shadow-sm">
                        <div class="flex gap-4">
                            <div class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#2f6b3f] text-white shadow-[0_12px_25px_rgba(47,107,63,0.18)]">
                                <i class="fa-solid fa-quote-left"></i>
                            </div>

                            <div>
                                <p class="text-base leading-8 text-slate-700">
                                    “Perbedaan adalah kekayaan, dan kerukunan adalah kekuatan.
                                    Mari bersama menjaga kehidupan beragama yang damai, saling
                                    menghormati, dan penuh kasih di Kepulauan Sangihe.”
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8 border-t border-slate-200 pt-5">
                        <h3 class="text-lg font-extrabold text-slate-900">
                            Kepala Kantor Kementerian Agama
                        </h3>
                        <p class="mt-1 text-sm font-medium text-slate-500">
                            Kabupaten Kepulauan Sangihe
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="infografis" class="relative overflow-hidden bg-slate-50 py-20 lg:py-24">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(47,107,63,0.06),transparent_28%)]"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_bottom_right,rgba(214,166,58,0.08),transparent_30%)]"></div>

    <div class="container-public relative">
        <div class="mx-auto max-w-3xl text-center">
            <div class="inline-flex items-center gap-2 rounded-full border border-[#2f6b3f]/15 bg-[#2f6b3f]/10 px-4 py-2 text-[11px] font-extrabold uppercase tracking-[0.16em] text-[#2f6b3f]">
                <i class="fa-solid fa-chart-column"></i>
                Infografis Singkat
            </div>

            <h2 class="mt-5 text-3xl font-semibold leading-tight tracking-[-0.03em] text-slate-900 sm:text-4xl">
                Gambaran Singkat Data Keagamaan
            </h2>

            <p class="mt-5 text-base leading-8 text-slate-600">
                Ringkasan data ditampilkan secara singkat dan informatif agar masyarakat
                dapat memahami gambaran umum kondisi keagamaan di Kabupaten Kepulauan Sangihe.
            </p>
        </div>

        <div class="mt-12 grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <!-- Rumah Ibadah -->
            <div
                x-data="counterStat()"
                data-target="215"
                data-suffix="+"
                class="group relative overflow-hidden rounded-[1.75rem] border border-white/80 bg-white p-6 shadow-[0_20px_60px_rgba(15,23,42,0.06)] transition duration-500 hover:-translate-y-2 hover:shadow-[0_28px_70px_rgba(15,23,42,0.10)]"
            >
                <div class="absolute right-0 top-0 h-28 w-28 rounded-full bg-[#2f6b3f]/10 blur-3xl"></div>

                <div class="relative">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#2f6b3f]/10 text-[#2f6b3f]">
                        <i class="fa-solid fa-place-of-worship text-lg"></i>
                    </div>

                    <div class="mt-6 text-sm font-bold uppercase tracking-[0.14em] text-slate-500">
                        Rumah Ibadah
                    </div>

                    <div class="mt-3 text-4xl font-semibold tracking-[-0.04em] text-slate-900 sm:text-5xl" x-text="formatted()"></div>

                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Jumlah rumah ibadah yang terdata di wilayah Kabupaten Kepulauan Sangihe.
                    </p>

                    <div class="mt-6 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full w-[82%] rounded-full bg-[#2f6b3f]"></div>
                    </div>
                </div>
            </div>

            <!-- Agama -->
            <div
                x-data="counterStat()"
                data-target="6"
                class="group relative overflow-hidden rounded-[1.75rem] border border-white/80 bg-white p-6 shadow-[0_20px_60px_rgba(15,23,42,0.06)] transition duration-500 hover:-translate-y-2 hover:shadow-[0_28px_70px_rgba(15,23,42,0.10)]"
            >
                <div class="absolute right-0 top-0 h-28 w-28 rounded-full bg-[#0f5f7a]/10 blur-3xl"></div>

                <div class="relative">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#0f5f7a]/10 text-[#0f5f7a]">
                        <i class="fa-solid fa-hands-praying text-lg"></i>
                    </div>

                    <div class="mt-6 text-sm font-bold uppercase tracking-[0.14em] text-slate-500">
                        Agama Terlayani
                    </div>

                    <div class="mt-3 text-4xl font-semibold tracking-[-0.04em] text-slate-900 sm:text-5xl" x-text="formatted()"></div>

                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Representasi agama yang menjadi bagian dari layanan dan informasi publik.
                    </p>

                    <div class="mt-6 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full w-[68%] rounded-full bg-[#0f5f7a]"></div>
                    </div>
                </div>
            </div>

            <!-- Pendidikan -->
            <div
                x-data="counterStat()"
                data-target="38"
                data-suffix="+"
                class="group relative overflow-hidden rounded-[1.75rem] border border-white/80 bg-white p-6 shadow-[0_20px_60px_rgba(15,23,42,0.06)] transition duration-500 hover:-translate-y-2 hover:shadow-[0_28px_70px_rgba(15,23,42,0.10)]"
            >
                <div class="absolute right-0 top-0 h-28 w-28 rounded-full bg-[#d6a63a]/10 blur-3xl"></div>

                <div class="relative">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-[#d6a63a]/15 text-[#9a741d]">
                        <i class="fa-solid fa-school text-lg"></i>
                    </div>

                    <div class="mt-6 text-sm font-bold uppercase tracking-[0.14em] text-slate-500">
                        Lembaga Pendidikan
                    </div>

                    <div class="mt-3 text-4xl font-semibold tracking-[-0.04em] text-slate-900 sm:text-5xl" x-text="formatted()"></div>

                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Jumlah lembaga pendidikan keagamaan yang sementara terdata dalam sistem.
                    </p>

                    <div class="mt-6 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full w-[74%] rounded-full bg-[#d6a63a]"></div>
                    </div>
                </div>
            </div>

            <!-- Kecamatan -->
            <div
                x-data="counterStat()"
                data-target="15"
                class="group relative overflow-hidden rounded-[1.75rem] border border-white/80 bg-white p-6 shadow-[0_20px_60px_rgba(15,23,42,0.06)] transition duration-500 hover:-translate-y-2 hover:shadow-[0_28px_70px_rgba(15,23,42,0.10)]"
            >
                <div class="absolute right-0 top-0 h-28 w-28 rounded-full bg-rose-500/10 blur-3xl"></div>

                <div class="relative">
                    <div class="flex h-14 w-14 items-center justify-center rounded-2xl bg-rose-100 text-rose-600">
                        <i class="fa-solid fa-map-location-dot text-lg"></i>
                    </div>

                    <div class="mt-6 text-sm font-bold uppercase tracking-[0.14em] text-slate-500">
                        Kecamatan Terlayani
                    </div>

                    <div class="mt-3 text-4xl font-semibold tracking-[-0.04em] text-slate-900 sm:text-5xl" x-text="formatted()"></div>

                    <p class="mt-4 text-sm leading-7 text-slate-600">
                        Jangkauan wilayah administrasi yang terlibat dalam pengumpulan dan penyajian data.
                    </p>

                    <div class="mt-6 h-1.5 w-full overflow-hidden rounded-full bg-slate-100">
                        <div class="h-full w-[92%] rounded-full bg-rose-500"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8 rounded-[2rem] border border-slate-100 bg-white/80 p-6 shadow-[0_20px_60px_rgba(15,23,42,0.05)] backdrop-blur-sm lg:p-8">
            <div class="grid gap-6 lg:grid-cols-3">
               
    </div>
</section>
        
        <section id="berita" class="section-padding bg-white">
            <div class="container-public">
                <div class="mb-12 flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
                    <div class="max-w-2xl">
                        <div class="eyebrow">
                            <i class="fa-regular fa-newspaper"></i>
                            Kabar Terbaru
                        </div>

                        <h2 class="section-title">
                            Berita dan Kegiatan Terbaru
                        </h2>

                        <p class="section-subtitle">
                            Informasi kegiatan, publikasi, dan agenda pelayanan Kementerian Agama Kabupaten Kepulauan Sangihe.
                        </p>
                    </div>

                    <a href="{{ route('public.berita.index') }}" class="btn-outline">
                        Semua Berita
                        <i class="fa-solid fa-arrow-right text-xs"></i>
                    </a>
                </div>

                <div class="grid gap-8 lg:grid-cols-3">
                    @for ($i = 1; $i <= 3; $i++)
                        <article class="card-premium group overflow-hidden">
                            <div class="relative h-64 overflow-hidden bg-gradient-to-br from-[#2f6b3f] to-[#0f5f7a]">
                                <img
                                    src="{{ asset('images/placeholder-berita.jpg') }}"
                                    alt="Berita Kemenag Sangihe"
                                    class="news-card-image"
                                    onerror="this.style.display='none'"
                                >

                                <div class="absolute left-5 top-5 rounded-full bg-white/90 px-4 py-2 text-[11px] font-extrabold uppercase tracking-[0.12em] text-[#2f6b3f] shadow-lg backdrop-blur">
                                    Berita Kegiatan
                                </div>
                            </div>

                            <div class="p-7">
                                <div class="flex items-center gap-3 text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
                                    <span class="inline-flex items-center gap-2">
                                        <i class="fa-regular fa-calendar text-[#2f6b3f]"></i>
                                        Publikasi
                                    </span>
                                </div>

                                <h3 class="mt-4 text-xl font-extrabold leading-snug tracking-[-0.02em] text-slate-900 transition duration-300 group-hover:text-[#2f6b3f]">
                                    Kegiatan Pelayanan dan Penguatan Harmoni Umat Beragama
                                </h3>

                                <p class="mt-3 text-sm leading-7 text-slate-600">
                                    Ringkasan berita, dokumentasi kegiatan, dan layanan Kemenag Kabupaten Kepulauan Sangihe ditampilkan di bagian ini.
                                </p>

                                <div class="mt-6 inline-flex items-center gap-2 text-sm font-extrabold text-[#2f6b3f]">
                                    Baca Selengkapnya
                                    <i class="fa-solid fa-arrow-right text-xs"></i>
                                </div>
                            </div>
                        </article>
                    @endfor
                </div>
            </div>
        </section>
        <section id="peta" class="section-padding bg-white">
            <div class="container-public grid items-center gap-14 lg:grid-cols-2">
                <div>
                    <div class="eyebrow">
                        <i class="fa-solid fa-map-location-dot"></i>
                        Peta Digital
                    </div>

                    <h2 class="section-title">
                        Jelajahi Sebaran Informasi Keagamaan Melalui Peta
                    </h2>

                    <p class="section-subtitle">
                        Peta digital membantu masyarakat memahami sebaran rumah ibadah,
                        pendidikan keagamaan, dan data wilayah dengan pendekatan visual yang lebih intuitif.
                    </p>

                    <div class="mt-8 flex flex-wrap gap-4">
                        <a href="{{ route('public.peta') }}" class="btn-primary">
                            Buka Peta Digital
                            <i class="fa-solid fa-location-arrow text-xs"></i>
                        </a>

                        <a href="{{ route('public.rumah-ibadah.index') }}" class="btn-outline">
                            Jelajah Rumah Ibadah
                        </a>
                    </div>
                </div>

                <div class="card-premium-static overflow-hidden p-3">
                    <div class="relative h-[440px] overflow-hidden rounded-[1.75rem] bg-gradient-to-br from-[#0f5f7a] via-[#2f6b3f] to-slate-900">
                        <img
                            src="{{ asset('images/hero-sangihe.jpg') }}"
                            alt="Preview Peta Digital"
                            class="h-full w-full object-cover opacity-80"
                            onerror="this.style.display='none'"
                        >

                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-transparent to-transparent"></div>

                        <div class="absolute inset-x-5 bottom-5 rounded-[1.5rem] border border-white/15 bg-white/10 p-5 text-white shadow-xl backdrop-blur-xl">
                            <div class="text-xs font-extrabold uppercase tracking-[0.14em] text-white/70">
                                Preview
                            </div>

                            <h3 class="mt-2 text-2xl font-extrabold tracking-[-0.03em]">
                                Peta Digital Interaktif
                            </h3>

                            <p class="mt-2 text-sm leading-7 text-white/80">
                                Tampilkan rumah ibadah, data wilayah, dan informasi lainnya dalam satu pengalaman visual yang elegan.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="harmoni" class="relative overflow-hidden bg-slate-950 py-24 text-white">
            <div class="absolute inset-0 bg-gradient-to-r from-[#0d3d2a] via-[#0f5f7a] to-[#08111c]"></div>
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_left,rgba(214,166,58,0.14),transparent_30%)]"></div>

            <div class="container-public relative">
                <div class="mx-auto max-w-3xl text-center">
                    <div class="eyebrow-light">
                        <i class="fa-solid fa-heart text-[#d6a63a]"></i>
                        Harmoni dan Toleransi
                    </div>

                    <h2 class="section-title-light">
                        Merawat Kerukunan, Menguatkan Toleransi
                    </h2>

                    <p class="section-subtitle-light">
                        Perbedaan adalah anugerah. Kerukunan adalah komitmen bersama untuk menjaga Sangihe tetap damai, teduh, dan penuh saling hormat.
                    </p>
                </div>

                <div class="mt-14 grid gap-6 lg:grid-cols-3">
                    <div class="card-dark gradient-border p-8">
                        <div class="icon-wrap bg-white/10 text-[#d6a63a]">
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                        <h3 class="mt-5 text-xl font-extrabold text-white">Dialog Lintas Agama</h3>
                        <p class="mt-3 text-sm leading-7 text-white/75">
                            Menumbuhkan komunikasi yang sehat antarumat beragama dan memperkuat rasa saling menghargai.
                        </p>
                    </div>

                    <div class="card-dark gradient-border p-8">
                        <div class="icon-wrap bg-white/10 text-[#d6a63a]">
                            <i class="fa-solid fa-handshake"></i>
                        </div>
                        <h3 class="mt-5 text-xl font-extrabold text-white">Moderasi Beragama</h3>
                        <p class="mt-3 text-sm leading-7 text-white/75">
                            Menguatkan semangat beragama yang damai, berimbang, dan berpijak pada nilai kebersamaan.
                        </p>
                    </div>

                    <div class="card-dark gradient-border p-8">
                        <div class="icon-wrap bg-white/10 text-[#d6a63a]">
                            <i class="fa-solid fa-seedling"></i>
                        </div>
                        <h3 class="mt-5 text-xl font-extrabold text-white">Cerita Harmoni</h3>
                        <p class="mt-3 text-sm leading-7 text-white/75">
                            Menampilkan praktik baik kerukunan, gotong royong, dan kehidupan sosial yang menyejukkan.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white py-16">
            <div class="container-public">
                <div class="rounded-[2rem] bg-[#2f6b3f] p-8 text-white shadow-[0_24px_70px_rgba(47,107,63,0.22)] md:p-10">
                    <div class="grid items-center gap-8 lg:grid-cols-3">
                        <div class="lg:col-span-2">
                            <div class="text-xs font-extrabold uppercase tracking-[0.16em] text-white/70">
                                Akses Informasi
                            </div>

                            <h2 class="mt-3 text-2xl font-extrabold tracking-[-0.03em] md:text-3xl">
                                Temukan informasi keagamaan Kabupaten Kepulauan Sangihe secara lebih mudah.
                            </h2>

                            <p class="mt-4 max-w-2xl text-sm leading-7 text-white/75">
                                Portal ini akan terus dikembangkan menjadi pusat informasi publik, peta digital,
                                berita kegiatan, dan layanan AAmasyarakat berbasis data.
                            </p>
                        </div>

                        <div class="flex flex-col gap-3 sm:flex-row lg:justify-end">
                            <a href="{{ route('public.peta') }}" class="btn-gold">
                                Buka Peta
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-[#060b12] text-white">
        <div class="container-public grid gap-10 py-16 lg:grid-cols-4">
            <div class="lg:col-span-2">
                <div class="flex items-center gap-3">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#2f6b3f] shadow-[0_14px_30px_rgba(47,107,63,0.28)]">
                        <i class="fa-solid fa-dove text-lg"></i>
                    </div>

                    <div>
                        <h3 class="text-lg font-extrabold tracking-[-0.02em]">Peta Harmoni Sangihe</h3>
                        <p class="text-sm text-slate-400">Kementerian Agama Kabupaten Kepulauan Sangihe</p>
                    </div>
                </div>

                <p class="mt-6 max-w-2xl text-sm leading-8 text-slate-300">
                    Portal informasi keagamaan, rumah ibadah, pendidikan keagamaan, berita kegiatan,
                    peta digital, statistik, dan layanan publik yang dirancang untuk menghadirkan
                    pengalaman informasi yang lebih tertata, indah, dan mudah diakses.
                </p>
            </div>

            <div>
                <h4 class="text-sm font-extrabold uppercase tracking-[0.14em] text-white/90">Menu Cepat</h4>

                <div class="mt-5 flex flex-col gap-3">
                    <a href="{{ route('public.profil') }}" class="footer-link">Profil</a>
                    <a href="{{ route('public.statistik') }}" class="footer-link">Informasi</a>
                    <a href="{{ route('public.berita.index') }}" class="footer-link">Berita</a>
                    <a href="{{ route('public.rumah-ibadah.index') }}" class="footer-link">Rumah Ibadah</a>
                    <a href="{{ route('public.peta') }}" class="footer-link">Peta Digital</a>
                </div>
            </div>

            <div>
                <h4 class="text-sm font-extrabold uppercase tracking-[0.14em] text-white/90">Kontak</h4>

                <div class="mt-5 space-y-4 text-sm text-slate-300">
                    <p class="flex gap-3">
                        <i class="fa-solid fa-location-dot mt-1 text-[#d6a63a]"></i>
                        <span>Kabupaten Kepulauan Sangihe, Sulawesi Utara</span>
                    </p>

                    <p class="flex gap-3">
                        <i class="fa-solid fa-envelope mt-1 text-[#d6a63a]"></i>
                        <span>info@kemenagsangihe.go.id</span>
                    </p>

                    <p class="flex gap-3">
                        <i class="fa-solid fa-phone mt-1 text-[#d6a63a]"></i>
                        <span>Kontak Kantor</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="border-t border-white/10">
            <div class="container-public flex flex-col gap-3 py-5 text-sm text-slate-400 md:flex-row md:items-center md:justify-between">
                <p>&copy; {{ date('Y') }} Kementerian Agama Kabupaten Kepulauan Sangihe.</p>
                <p>Merawat Kerukunan, Menguatkan Pelayanan.</p>
            </div>
        </div>
    </footer>
</body>
</html>
