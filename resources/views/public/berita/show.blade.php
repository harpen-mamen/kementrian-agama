<x-layouts.public title="{{ data_get($berita, 'judul') }} - Berita">
    <x-public.page-hero eyebrow="{{ data_get($berita, 'kategoriBerita.nama', 'Berita') }}" title="{{ data_get($berita, 'judul') }}" subtitle="{{ data_get($berita, 'published_at') ? data_get($berita, 'published_at')->translatedFormat('d F Y') : 'Publikasi resmi' }}" />

    @php
        $image = \App\Http\Controllers\PublicPageController::publicImage(data_get($berita, 'gambar'), 'images/placeholder-berita.jpg');
    @endphp

    <section class="section-padding bg-white">
        <div class="container-public">
            <article class="mx-auto max-w-4xl">
                <div class="card-premium-static overflow-hidden">
                    <img src="{{ $image }}" alt="{{ data_get($berita, 'judul') }}" class="h-[440px] w-full object-cover">
                </div>
                <div class="mt-10 max-w-none text-base leading-8 text-slate-700">
                    {!! nl2br(e(strip_tags(data_get($berita, 'isi', '')))) !!}
                </div>
                <a href="{{ route('public.berita.index') }}" class="btn-outline mt-10">Kembali ke Berita</a>
            </article>

            @if ($related->count())
                <div class="mt-20">
                    <x-public.section-heading eyebrow="Berita Terkait" title="Informasi lainnya" />
                    <div class="mt-8 grid gap-6 md:grid-cols-3">
                        @foreach ($related as $item)
                            <x-public.news-card :berita="$item" />
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </section>
</x-layouts.public>
