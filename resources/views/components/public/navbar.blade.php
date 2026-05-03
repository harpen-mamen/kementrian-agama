<header
    x-data="{
        scrolled: false,
        mobileOpen: false,
        init() {
            this.scrolled = window.scrollY > 70;

            window.addEventListener('scroll', () => {
                this.scrolled = window.scrollY > 70;
            });
        }
    }"
    class="fixed left-0 top-0 z-50 w-full transition-all duration-500"
>
    {{-- Topbar hanya tampil saat posisi paling atas --}}
    <div
        x-show="!scrolled"
        x-transition
        class="hidden text-white/90 lg:block"
    >
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 pt-5 text-xs">
            <div class="flex items-center gap-5">
                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-location-dot text-[#d6a63a]"></i>
                    Kemenag Kabupaten Kepulauan Sangihe
                </span>

                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-envelope text-[#d6a63a]"></i>
                    info@kemenagsangihe.go.id
                </span>

                <span class="flex items-center gap-2">
                    <i class="fa-solid fa-phone text-[#d6a63a]"></i>
                    Kontak Kantor
                </span>
            </div>

            <div class="flex items-center gap-3">
                <span>Ikuti Kami</span>
                <a href="#" class="transition hover:text-[#d6a63a]">
                    <i class="fa-brands fa-facebook-f"></i>
                </a>
                <a href="#" class="transition hover:text-[#d6a63a]">
                    <i class="fa-brands fa-instagram"></i>
                </a>
                <a href="#" class="transition hover:text-[#d6a63a]">
                    <i class="fa-brands fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>

    <nav
        :class="scrolled
            ? 'mx-auto mt-4 max-w-7xl rounded-full bg-white/95 px-6 py-3 shadow-2xl backdrop-blur-md ring-1 ring-slate-100'
            : 'mx-auto mt-4 max-w-7xl bg-transparent px-6 py-3'"
        class="transition-all duration-500"
    >
        <div class="flex items-center justify-between">
            {{-- Logo --}}
            <a href="{{ route('public.home') }}" class="flex items-center gap-3">
                <div
                    :class="scrolled
                        ? 'bg-[#2f6b3f] text-white'
                        : 'bg-transparent text-white'"
                    class="flex h-11 w-11 items-center justify-center rounded-full transition-all duration-500"
                >
                    <i class="fa-solid fa-handshake-angle text-lg"></i>
                </div>

                <div>
                    <div
                        :class="scrolled ? 'text-slate-900' : 'text-white'"
                        class="text-base font-bold leading-tight tracking-wide transition-colors duration-500"
                    >
                        Peta Harmoni Sangihe
                    </div>

                    <div
                        :class="scrolled ? 'text-slate-500' : 'text-white/80'"
                        class="hidden text-xs transition-colors duration-500 sm:block"
                    >
                        Kementerian Agama Kab. Kepulauan Sangihe
                    </div>
                </div>
            </a>

            {{-- Desktop Menu --}}
            <div class="hidden items-center gap-8 lg:flex">
                <a
                    href="{{ route('public.home') }}"
                    :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'"
                    class="text-sm font-semibold transition-colors duration-300"
                >
                    Beranda
                </a>

                <a
                    href="{{ route('public.profil') }}"
                    :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'"
                    class="text-sm font-semibold transition-colors duration-300"
                >
                    Profil
                </a>

                <a
                    href="{{ route('public.peta') }}"
                    :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'"
                    class="text-sm font-semibold transition-colors duration-300"
                >
                    Peta Digital
                </a>

                <a
                    href="{{ route('public.rumah-ibadah.index') }}"
                    :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'"
                    class="text-sm font-semibold transition-colors duration-300"
                >
                    Rumah Ibadah
                </a>

                <a
                    href="{{ route('public.berita.index') }}"
                    :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'"
                    class="text-sm font-semibold transition-colors duration-300"
                >
                    Berita
                </a>

                <a
                    href="{{ route('public.layanan') }}"
                    :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'"
                    class="text-sm font-semibold transition-colors duration-300"
                >
                    Layanan
                </a>

                <a
                    href="{{ route('public.kontak') }}"
                    :class="scrolled ? 'text-slate-700 hover:text-[#2f6b3f]' : 'text-white hover:text-[#d6a63a]'"
                    class="text-sm font-semibold transition-colors duration-300"
                >
                    Kontak
                </a>

                <a
                    href="/admin"
                    :class="scrolled
                        ? 'bg-[#2f6b3f] text-white hover:bg-[#255732]'
                        : 'bg-white/15 text-white ring-1 ring-white/30 hover:bg-white hover:text-[#2f6b3f]'"
                    class="rounded-full px-5 py-2.5 text-sm font-bold shadow-lg backdrop-blur transition duration-300"
                >
                    Admin
                </a>
            </div>

            {{-- Mobile Button --}}
            <button
                type="button"
                @click="mobileOpen = !mobileOpen"
                :class="scrolled ? 'text-slate-800' : 'text-white'"
                class="inline-flex h-10 w-10 items-center justify-center rounded-xl transition lg:hidden"
            >
                <i x-show="!mobileOpen" class="fa-solid fa-bars text-xl"></i>
                <i x-show="mobileOpen" class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        {{-- Mobile Menu --}}
        <div
            x-show="mobileOpen"
            x-transition
            class="mt-4 rounded-2xl bg-white p-4 shadow-2xl lg:hidden"
        >
            <div class="flex flex-col gap-1">
                <a href="{{ route('public.home') }}" class="rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Beranda
                </a>

                <a href="{{ route('public.profil') }}" class="rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Profil
                </a>

                <a href="{{ route('public.peta') }}" class="rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Peta Digital
                </a>

                <a href="{{ route('public.rumah-ibadah.index') }}" class="rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Rumah Ibadah
                </a>

                <a href="{{ route('public.berita.index') }}" class="rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Berita
                </a>

                <a href="{{ route('public.layanan') }}" class="rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Layanan
                </a>

                <a href="{{ route('public.kontak') }}" class="rounded-xl px-4 py-3 text-sm font-medium text-slate-700 hover:bg-slate-50">
                    Kontak
                </a>

                <a href="/admin" class="mt-2 rounded-xl bg-[#2f6b3f] px-4 py-3 text-center text-sm font-semibold text-white">
                    Admin
                </a>
            </div>
        </div>
    </nav>
</header>