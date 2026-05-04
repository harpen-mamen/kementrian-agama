@php
    $links = [
        ['label' => 'Beranda', 'route' => 'public.home', 'url' => route('public.home'), 'active' => request()->routeIs('public.home')],
        ['label' => 'Profil', 'route' => 'public.profil', 'url' => route('public.profil'), 'active' => request()->routeIs('public.profil')],
        ['label' => 'Informasi', 'route' => 'public.statistik', 'url' => route('public.statistik'), 'active' => request()->routeIs('public.statistik')],
        ['label' => 'Berita', 'route' => 'public.berita.index', 'url' => route('public.berita.index'), 'active' => request()->routeIs('public.berita.*')],
        ['label' => 'Rumah Ibadah', 'route' => 'public.rumah-ibadah.index', 'url' => route('public.rumah-ibadah.index'), 'active' => request()->routeIs('public.rumah-ibadah.*')],
        ['label' => 'Peta', 'route' => 'public.peta', 'url' => route('public.peta'), 'active' => request()->routeIs('public.peta')],
        ['label' => 'Layanan', 'route' => 'public.layanan', 'url' => route('public.layanan'), 'active' => request()->routeIs('public.layanan')],
        ['label' => 'Kontak', 'route' => 'public.kontak', 'url' => route('public.kontak'), 'active' => request()->routeIs('public.kontak')],
    ];
@endphp

<header x-data="{ mobileOpen: false }" class="sticky top-0 z-50 border-b border-slate-200/70 bg-white/92 shadow-[0_16px_46px_rgba(15,23,42,0.08)] backdrop-blur-xl">
    <nav class="container-public">
        <div class="flex h-20 items-center justify-between">
            <a href="{{ route('public.home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/logo-kemenag-sangihe.png') }}" alt="Logo Kementerian Agama Kabupaten Kepulauan Sangihe" class="h-14 w-auto object-contain">
                <div>
                    <div class="text-base font-extrabold leading-tight tracking-[-0.02em] text-slate-900 md:text-lg">Peta Harmoni Sangihe</div>
                    <div class="hidden text-xs font-semibold text-slate-500 sm:block">Kementerian Agama Kab. Kepulauan Sangihe</div>
                </div>
            </a>

            <div class="hidden items-center gap-6 lg:flex">
                @foreach ($links as $link)
                    <a href="{{ $link['url'] }}" class="nav-link {{ $link['active'] ? 'text-[#2f6b3f]' : 'text-slate-700 hover:text-[#2f6b3f]' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>

            <button type="button" @click="mobileOpen = !mobileOpen" class="inline-flex h-11 w-11 items-center justify-center rounded-2xl text-slate-900 transition hover:bg-slate-100 lg:hidden" aria-label="Buka menu">
                <i x-show="!mobileOpen" class="fa-solid fa-bars text-xl"></i>
                <i x-show="mobileOpen" x-cloak class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <div x-show="mobileOpen" x-cloak x-transition class="mb-4 rounded-[1.75rem] border border-slate-100 bg-white p-4 shadow-[0_24px_60px_rgba(15,23,42,0.14)] lg:hidden">
            <div class="flex flex-col gap-1">
                @foreach ($links as $link)
                    <a href="{{ $link['url'] }}" class="rounded-2xl px-4 py-3 text-sm font-bold {{ $link['active'] ? 'bg-[#2f6b3f]/10 text-[#2f6b3f]' : 'text-slate-700 hover:bg-slate-50' }}">
                        {{ $link['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </nav>
</header>
