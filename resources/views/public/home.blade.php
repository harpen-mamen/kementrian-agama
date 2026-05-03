@extends('layouts.public')

@section('content')
<section class="relative flex min-h-screen items-center overflow-hidden bg-slate-950">
    <div class="absolute inset-0 hero-zoom">
        <img src="{{ asset('images/hero-sangihe.jpg') }}" alt="Kabupaten Kepulauan Sangihe" class="h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/90 via-slate-900/65 to-slate-900/20"></div>
    </div>

    <div class="relative z-10 mx-auto w-full max-w-7xl px-6 pt-36">
        <div class="max-w-4xl">
            <div class="mb-6 inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold text-white backdrop-blur" data-aos="fade-up">
                Portal Harmoni Kementerian Agama Kabupaten Kepulauan Sangihe
            </div>

            <h1 class="text-4xl font-bold leading-tight text-white md:text-6xl lg:text-7xl" data-aos="fade-up" data-aos-delay="100">
                Merawat Harmoni Umat Beragama di Kabupaten Kepulauan Sangihe
            </h1>

            <p class="mt-6 max-w-2xl text-lg leading-relaxed text-white/80 md:text-xl" data-aos="fade-up" data-aos-delay="200">
                Portal informasi keagamaan, rumah ibadah, pendidikan keagamaan, berita kegiatan,
                peta digital, dan layanan publik yang ramah bagi seluruh masyarakat.
            </p>

            <div class="mt-9 flex flex-col gap-4 sm:flex-row" data-aos="fade-up" data-aos-delay="300">
                <a href="{{ route('public.peta') }}" class="rounded-full bg-[#d6a63a] px-7 py-4 text-center text-sm font-bold text-white shadow-lg transition hover:bg-[#c2932e]">
                    Jelajahi Peta Digital
                </a>
                <a href="{{ route('public.berita.index') }}" class="rounded-full border border-white/30 bg-white/10 px-7 py-4 text-center text-sm font-bold text-white backdrop-blur transition hover:bg-white hover:text-slate-900">
                    Lihat Berita Terbaru
                </a>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 z-10 -translate-x-1/2 text-white/70">
        <div class="flex flex-col items-center gap-2 text-xs">
            <span>Gulir ke bawah</span>
            <i class="fa-solid fa-chevron-down animate-bounce"></i>
        </div>
    </div>
</section>

<section id="sambutan" class="bg-white py-24">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-2">
        <div class="relative" data-aos="fade-right">
            <div class="absolute -left-5 -top-5 h-32 w-32 rounded-full bg-[#d6a63a]/20"></div>
            <div class="absolute -bottom-5 -right-5 h-40 w-40 rounded-full bg-[#2f6b3f]/10"></div>
            <div class="relative overflow-hidden rounded-[2rem] bg-slate-100 shadow-2xl">
                <img src="{{ asset('images/pimpinan-placeholder.jpg') }}" alt="Pimpinan Kemenag Sangihe" class="h-[520px] w-full object-cover">
            </div>
        </div>

        <div data-aos="fade-left">
            <div class="mb-4 inline-flex rounded-full bg-[#2f6b3f]/10 px-4 py-2 text-sm font-bold text-[#2f6b3f]">
                Sambutan Pimpinan
            </div>

            <h2 class="text-3xl font-bold leading-tight text-slate-900 md:text-5xl">
                Selamat Datang di Portal Harmoni Sangihe
            </h2>

            <p class="mt-6 text-lg leading-relaxed text-slate-600">
                Website ini dihadirkan sebagai media informasi, pelayanan, dan penyajian data
                keagamaan yang terbuka, ramah, dan informatif bagi masyarakat Kabupaten Kepulauan Sangihe.
            </p>

            <p class="mt-4 leading-relaxed text-slate-600">
                Melalui portal ini, kami ingin menghadirkan wajah pelayanan Kementerian Agama yang
                dekat dengan masyarakat, menguatkan kerukunan, serta mendukung kehidupan umat beragama
                yang damai dan harmonis.
            </p>

            <a href="{{ route('public.profil') }}" class="mt-8 inline-flex rounded-full bg-[#2f6b3f] px-7 py-4 text-sm font-bold text-white shadow-lg transition hover:bg-[#255732]">
                Baca Profil Kemenag
            </a>
        </div>
    </div>
</section>

<section id="informasi" class="bg-slate-50 py-24">
    <div class="mx-auto max-w-7xl px-6">
        <x-public.section-heading
            eyebrow="Informasi Publik"
            title="Informasi Keagamaan yang Tertata dan Mudah Diakses"
            description="Portal ini menyajikan informasi secara ringkas, damai, dan informatif. Data lengkap tetap tersedia pada halaman khusus agar pengunjung tidak langsung dibanjiri informasi."
        />

        <div class="mt-14 grid gap-6 md:grid-cols-2 lg:grid-cols-4">
            <x-public.service-card icon="fa-solid fa-place-of-worship" title="Rumah Ibadah" description="Informasi rumah ibadah dari berbagai agama yang telah dipublikasikan." url="{{ route('public.rumah-ibadah.index') }}" delay="0" />
            <x-public.service-card icon="fa-solid fa-school" title="Pendidikan Keagamaan" description="Informasi sekolah dan lembaga pendidikan keagamaan di Sangihe." url="{{ route('public.sekolah-keagamaan.index') }}" delay="100" />
            <x-public.service-card icon="fa-solid fa-map-location-dot" title="Peta Digital" description="Peta interaktif untuk melihat sebaran rumah ibadah dan informasi wilayah." url="{{ route('public.peta') }}" delay="200" />
            <x-public.service-card icon="fa-solid fa-handshake" title="Harmoni Umat" description="Informasi kegiatan moderasi, kerukunan, dan toleransi umat beragama." url="{{ route('public.layanan') }}" delay="300" />
        </div>
    </div>
</section>

<section class="bg-white py-24">
    <div class="mx-auto max-w-7xl px-6">
        <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
            <x-public.section-heading
                align="left"
                eyebrow="Kabar Terbaru"
                title="Berita dan Kegiatan Terbaru"
                description="Informasi kegiatan, pengumuman, dan pelayanan Kementerian Agama Kabupaten Kepulauan Sangihe."
            />

            <a href="{{ route('public.berita.index') }}" class="inline-flex rounded-full border border-[#2f6b3f] px-6 py-3 text-sm font-bold text-[#2f6b3f] transition hover:bg-[#2f6b3f] hover:text-white">
                Semua Berita
            </a>
        </div>

        <div class="mt-12 grid gap-8 md:grid-cols-3">
            @forelse($beritas as $index => $berita)
                <x-public.news-card :berita="$berita" :delay="$index * 100" />
            @empty
                <x-public.news-card :delay="0" />
                <x-public.news-card :delay="100" />
                <x-public.news-card :delay="200" />
            @endforelse
        </div>
    </div>
</section>

<section class="bg-slate-50 py-24">
    <div class="mx-auto max-w-7xl px-6">
        <x-public.section-heading
            eyebrow="Direktori Harmoni"
            title="Rumah Ibadah di Sangihe"
            description="Temukan informasi rumah ibadah dari berbagai agama yang tersebar di wilayah Kabupaten Kepulauan Sangihe."
        />

        <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @forelse($rumahIbadahs as $index => $item)
                <x-public.worship-card
                    :item="$item"
                    :delay="$index * 100"
                    :aos="$index % 2 === 0 ? 'fade-left' : 'fade-right'"
                />
            @empty
                <x-public.worship-card aos="fade-left" delay="0" />
                <x-public.worship-card aos="fade-right" delay="100" />
                <x-public.worship-card aos="fade-left" delay="200" />
            @endforelse
        </div>

        <div class="mt-12 text-center">
            <a href="{{ route('public.rumah-ibadah.index') }}" class="inline-flex rounded-full bg-[#2f6b3f] px-7 py-4 text-sm font-bold text-white shadow-lg transition hover:bg-[#255732]">
                Lihat Semua Rumah Ibadah
            </a>
        </div>
    </div>
</section>

<section class="bg-white py-24">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-2">
        <div data-aos="fade-right">
            <div class="mb-4 inline-flex rounded-full bg-[#0f5f7a]/10 px-4 py-2 text-sm font-bold text-[#0f5f7a]">
                Peta Digital
            </div>

            <h2 class="text-3xl font-bold leading-tight text-slate-900 md:text-5xl">
                Lihat Sebaran Informasi Keagamaan Melalui Peta
            </h2>

            <p class="mt-6 text-lg leading-relaxed text-slate-600">
                Peta digital membantu masyarakat melihat informasi rumah ibadah, pendidikan keagamaan,
                dan data wilayah secara lebih mudah dan visual.
            </p>

            <a href="{{ route('public.peta') }}" class="mt-8 inline-flex rounded-full bg-[#0f5f7a] px-7 py-4 text-sm font-bold text-white shadow-lg transition hover:bg-[#0b4c63]">
                Buka Peta Digital
            </a>
        </div>

        <div class="overflow-hidden rounded-[2rem] bg-slate-100 shadow-2xl" data-aos="fade-left">
            <div class="relative h-[430px]">
                <img src="{{ asset('images/hero-sangihe.jpg') }}" alt="Preview Peta Digital" class="h-full w-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 rounded-2xl bg-white/90 p-5 backdrop-blur">
                    <h3 class="text-lg font-bold text-slate-900">Preview Peta Digital</h3>
                    <p class="mt-1 text-sm text-slate-600">Peta lengkap tersedia pada halaman Peta Digital.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="relative overflow-hidden bg-slate-950 py-24 text-white">
    <div class="absolute inset-0 bg-gradient-to-r from-[#2f6b3f] via-[#0f5f7a] to-slate-950"></div>
    <div class="relative mx-auto max-w-7xl px-6">
        <x-public.section-heading
            eyebrow="Harmoni dan Toleransi"
            title="Merawat Kerukunan, Menguatkan Toleransi"
            description="Perbedaan adalah anugerah. Kerukunan adalah tanggung jawab bersama untuk membangun Sangihe yang damai."
        />

        <div class="mt-12 grid gap-6 md:grid-cols-3">
            <div class="rounded-3xl bg-white/10 p-8 backdrop-blur" data-aos="fade-up">
                <i class="fa-solid fa-people-group text-3xl text-[#d6a63a]"></i>
                <h3 class="mt-5 text-xl font-bold">Dialog Lintas Agama</h3>
                <p class="mt-3 text-sm leading-relaxed text-white/75">Mendorong ruang komunikasi yang sehat antara tokoh dan masyarakat lintas agama.</p>
            </div>

            <div class="rounded-3xl bg-white/10 p-8 backdrop-blur" data-aos="fade-up" data-aos-delay="100">
                <i class="fa-solid fa-handshake text-3xl text-[#d6a63a]"></i>
                <h3 class="mt-5 text-xl font-bold">Moderasi Beragama</h3>
                <p class="mt-3 text-sm leading-relaxed text-white/75">Menguatkan sikap beragama yang damai, adil, dan menghargai perbedaan.</p>
            </div>

            <div class="rounded-3xl bg-white/10 p-8 backdrop-blur" data-aos="fade-up" data-aos-delay="200">
                <i class="fa-solid fa-heart text-3xl text-[#d6a63a]"></i>
                <h3 class="mt-5 text-xl font-bold">Cerita Harmoni</h3>
                <p class="mt-3 text-sm leading-relaxed text-white/75">Menampilkan praktik baik kerukunan dan gotong royong masyarakat Sangihe.</p>
            </div>
        </div>
    </div>
</section>
@endsection