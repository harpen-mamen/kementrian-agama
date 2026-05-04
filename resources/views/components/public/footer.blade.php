<footer class="bg-slate-950 text-white">
    <div class="container-public grid gap-10 py-14 lg:grid-cols-4">
        <div class="lg:col-span-2">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo-kemenag-sangihe.png') }}" alt="Logo Kementerian Agama Kabupaten Kepulauan Sangihe" class="h-14 w-auto object-contain">
                <div>
                    <div class="text-lg font-extrabold">Peta Harmoni Sangihe</div>
                    <div class="text-sm font-semibold text-white/60">Kementerian Agama Kab. Kepulauan Sangihe</div>
                </div>
            </div>
            <p class="mt-6 max-w-xl text-sm leading-7 text-slate-300">
                Portal informasi publik yang menghadirkan data keagamaan, rumah ibadah, pendidikan keagamaan, berita, dan layanan masyarakat secara tertib dan mudah diakses.
            </p>
        </div>

        <div>
            <h3 class="text-sm font-extrabold uppercase tracking-[0.14em] text-white">Navigasi</h3>
            <div class="mt-5 flex flex-col gap-3">
                <a href="{{ route('public.profil') }}" class="footer-link">Profil</a>
                <a href="{{ route('public.statistik') }}" class="footer-link">Informasi</a>
                <a href="{{ route('public.berita.index') }}" class="footer-link">Berita</a>
                <a href="{{ route('public.rumah-ibadah.index') }}" class="footer-link">Rumah Ibadah</a>
                <a href="{{ route('public.peta') }}" class="footer-link">Peta Digital</a>
            </div>
        </div>

        <div>
            <h3 class="text-sm font-extrabold uppercase tracking-[0.14em] text-white">Layanan</h3>
            <div class="mt-5 flex flex-col gap-3">
                <a href="{{ route('public.sekolah-keagamaan.index') }}" class="footer-link">Sekolah Keagamaan</a>
                <a href="{{ route('public.layanan') }}" class="footer-link">Layanan Publik</a>
                <a href="{{ route('public.kontak') }}" class="footer-link">Kontak</a>
            </div>
        </div>
    </div>
    <div class="border-t border-white/10">
        <div class="container-public flex flex-col gap-3 py-5 text-sm text-slate-400 md:flex-row md:items-center md:justify-between">
            <p>&copy; {{ date('Y') }} Kementerian Agama Kabupaten Kepulauan Sangihe.</p>
            <p>Portal informasi publik Kabupaten Kepulauan Sangihe.</p>
        </div>
    </div>
</footer>
