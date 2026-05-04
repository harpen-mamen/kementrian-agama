@props(['berita'])

@php
    $image = \App\Http\Controllers\PublicPageController::publicImage(data_get($berita, 'gambar'), 'images/placeholder-berita.jpg');
@endphp

<article class="card-premium group overflow-hidden">
    <a href="{{ route('public.berita.show', data_get($berita, 'slug')) }}" class="block overflow-hidden bg-slate-100">
        <img src="{{ $image }}" alt="{{ data_get($berita, 'judul') }}" class="h-56 w-full object-cover transition duration-700 group-hover:scale-105">
    </a>
    <div class="p-7">
        <div class="flex flex-wrap items-center gap-2 text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
            <span>{{ data_get($berita, 'kategoriBerita.nama', 'Berita') }}</span>
            @if (data_get($berita, 'published_at'))
                <span class="text-slate-300">/</span>
                <span>{{ data_get($berita, 'published_at')->translatedFormat('d M Y') }}</span>
            @endif
        </div>
        <h3 class="mt-4 text-xl font-extrabold leading-snug text-slate-900">
            <a href="{{ route('public.berita.show', data_get($berita, 'slug')) }}" class="hover:text-[#2f6b3f]">{{ data_get($berita, 'judul') }}</a>
        </h3>
        <p class="mt-3 line-clamp-3 text-sm leading-7 text-slate-600">{{ data_get($berita, 'ringkasan') ?: str(data_get($berita, 'isi', ''))->stripTags()->limit(130) }}</p>
    </div>
</article>
