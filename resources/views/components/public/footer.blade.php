<footer class="bg-slate-950 text-white">
    <div class="mx-auto grid max-w-7xl gap-10 px-6 py-16 md:grid-cols-4">
        <div class="md:col-span-2">
            <div class="mb-5 flex items-center gap-3">
                <div class="flex h-12 w-12 items-center justify-center rounded-full bg-[#2f6b3f]">
                    <i class="fa-solid fa-handshake-angle text-xl"></i>
                </div>
                <div>
                    <h3 class="text-lg font-bold">Peta Harmoni Sangihe</h3>
                    <p class="text-sm text-slate-400">Kementerian Agama Kabupaten Kepulauan Sangihe</p>
                </div>
            </div>
            <p class="max-w-xl leading-relaxed text-slate-300">
                Portal informasi keagamaan, peta digital rumah ibadah, pendidikan keagamaan,
                berita kegiatan, dan layanan publik untuk mendukung kerukunan umat beragama
                di Kabupaten Kepulauan Sangihe.
            </p>
        </div>

        <div>
            <h4 class="mb-4 font-semibold text-white">Menu Cepat</h4>
            <div class="flex flex-col gap-3 text-sm text-slate-300">
                <a href="{{ route('public.profil') }}" class="hover:text-[#d6a63a]">Profil</a>
                <a href="{{ route('public.peta') }}" class="hover:text-[#d6a63a]">Peta Digital</a>
                <a href="{{ route('public.rumah-ibadah.index') }}" class="hover:text-[#d6a63a]">Rumah Ibadah</a>
                <a href="{{ route('public.berita.index') }}" class="hover:text-[#d6a63a]">Berita</a>
                <a href="{{ route('public.layanan') }}" class="hover:text-[#d6a63a]">Layanan</a>
            </div>
        </div>

        <div>
            <h4 class="mb-4 font-semibold text-white">Kontak</h4>
            <div class="space-y-3 text-sm text-slate-300">
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
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-6 py-5 text-sm text-slate-400 md:flex-row md:items-center md:justify-between">
            <p>&copy; {{ date('Y') }} Kementerian Agama Kabupaten Kepulauan Sangihe.</p>
            <p>Merawat Kerukunan, Menguatkan Pelayanan.</p>
        </div>
    </div>
</footer>