@props(['berita' => null, 'delay' => 0])

@php
    $judul = data_get($berita, 'judul', 'Contoh Berita Kegiatan Kemenag');
    $ringkasan = data_get($berita, 'ringkasan', 'Informasi kegiatan pelayanan, pembinaan, dan penguatan harmoni umat beragama di Kabupaten Kepulauan Sangihe.');
    $slug = data_get($berita, 'slug', '#');
    $gambar = data_get($berita, 'gambar')
        ? asset('storage/' . data_get($berita, 'gambar'))
        : asset('images/placeholder-berita.jpg');
    $tanggal = data_get($berita, 'published_at')
        ? \Carbon\Carbon::parse(data_get($berita, 'published_at'))->translatedFormat('d F Y')
        : 'Contoh Tampilan';
@endphp

<article
    class="group overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-slate-100 transition duration-500 hover:-translate-y-2 hover:shadow-2xl"
    data-aos="fade-up"
    data-aos-delay="{{ $delay }}"
>
    <div class="relative h-56 overflow-hidden">
        <img src="{{ $gambar }}" alt="{{ $judul }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-110">
        <div class="absolute left-4 top-4 rounded-full bg-[#d6a63a] px-3 py-1 text-xs font-bold text-white">
            Kegiatan
        </div>
    </div>

    <div class="p-6">
        <div class="mb-3 flex items-center gap-2 text-xs font-medium text-slate-500">
            <i class="fa-regular fa-calendar text-[#2f6b3f]"></i>
            {{ $tanggal }}
        </div>

        <h3 class="line-clamp-2 text-xl font-bold text-slate-900 transition group-hover:text-[#2f6b3f]">
            {{ $judul }}
        </h3>

        <p class="mt-3 line-clamp-3 text-sm leading-relaxed text-slate-600">
            {{ $ringkasan }}
        </p>

        @if($slug !== '#')
            <a href="{{ route('public.berita.show', $slug) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#2f6b3f]">
                Baca Berita
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        @else
            <span class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#2f6b3f]">
                Baca Berita
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </span>
        @endif
    </div>
</article>