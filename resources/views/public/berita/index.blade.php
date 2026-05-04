<x-layouts.public title="Berita - Peta Harmoni Sangihe">
    <x-public.page-hero eyebrow="Kabar Publik" title="Berita dan Informasi" subtitle="Informasi resmi, kegiatan, dan publikasi Kementerian Agama Kabupaten Kepulauan Sangihe." />

    <section class="section-padding bg-slate-50">
        <div class="container-public">
            <form method="GET" class="card-premium-static grid gap-4 p-5 md:grid-cols-4">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari judul berita" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f] md:col-span-2">
                <select name="kategori" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f]">
                    <option value="">Semua kategori</option>
                    @foreach ($kategoris as $kategori)
                        <option value="{{ $kategori->id }}" @selected(request('kategori') == $kategori->id)>{{ $kategori->nama }}</option>
                    @endforeach
                </select>
                <div class="flex gap-3">
                    <button class="btn-primary w-full px-5" type="submit">Cari</button>
                    <a href="{{ route('public.berita.index') }}" class="btn-outline px-5">Reset</a>
                </div>
            </form>

            @if ($featuredBerita && !request()->filled('search') && !request()->filled('kategori'))
                @php
                    $featuredImage = \App\Http\Controllers\PublicPageController::publicImage(data_get($featuredBerita, 'gambar'), 'images/placeholder-berita.jpg');
                @endphp
                <article class="card-premium group mt-10 grid overflow-hidden lg:grid-cols-2">
                    <a href="{{ route('public.berita.show', $featuredBerita->slug) }}" class="block overflow-hidden bg-slate-100">
                        <img src="{{ $featuredImage }}" alt="{{ $featuredBerita->judul }}" class="h-full min-h-[340px] w-full object-cover transition duration-700 group-hover:scale-105">
                    </a>
                    <div class="p-8 lg:p-10">
                        <div class="eyebrow">Berita Utama</div>
                        <h2 class="mt-5 text-3xl font-extrabold leading-tight tracking-[-0.03em] text-slate-900">{{ $featuredBerita->judul }}</h2>
                        <p class="mt-5 text-sm leading-7 text-slate-600">{{ $featuredBerita->ringkasan ?: str($featuredBerita->isi)->stripTags()->limit(220) }}</p>
                        <a href="{{ route('public.berita.show', $featuredBerita->slug) }}" class="btn-primary mt-8">Baca Berita</a>
                    </div>
                </article>
            @endif

            @if ($beritas->count())
                <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($beritas as $berita)
                        <x-public.news-card :berita="$berita" />
                    @endforeach
                </div>
                <div class="mt-10">{{ $beritas->links() }}</div>
            @else
                <div class="mt-10">
                    <x-public.empty-state title="Berita belum tersedia" message="Berita publik akan tampil setelah dipublikasikan oleh admin." />
                </div>
            @endif
        </div>
    </section>
</x-layouts.public>
