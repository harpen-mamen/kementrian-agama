@props(['item'])

@php
    $image = \App\Http\Controllers\PublicPageController::publicImage(data_get($item, 'foto') ?? data_get($item, 'gambar'), 'images/placeholder-sekolah.jpg');
@endphp

<article class="card-premium group overflow-hidden">
    <a href="{{ route('public.sekolah-keagamaan.show', data_get($item, 'id')) }}" class="block overflow-hidden bg-slate-100">
        <img src="{{ $image }}" alt="{{ data_get($item, 'nama') }}" class="h-52 w-full object-cover transition duration-700 group-hover:scale-105">
    </a>
    <div class="p-7">
        <div class="flex flex-wrap gap-2">
            <span class="rounded-full bg-[#2f6b3f]/10 px-3 py-1 text-xs font-extrabold text-[#2f6b3f]">{{ data_get($item, 'agama.nama', 'Pendidikan Keagamaan') }}</span>
            <span class="rounded-full bg-[#d6a63a]/15 px-3 py-1 text-xs font-extrabold text-[#9a7122]">{{ data_get($item, 'jenis', 'Lembaga') }}</span>
        </div>
        <h3 class="mt-4 text-xl font-extrabold leading-snug text-slate-900">{{ data_get($item, 'nama') }}</h3>
        <p class="mt-3 text-sm leading-7 text-slate-600">{{ data_get($item, 'alamat') }}</p>
        <div class="mt-5 flex items-center justify-between gap-4">
            <span class="text-sm font-bold text-slate-500"><i class="fa-solid fa-location-dot mr-2 text-[#2f6b3f]"></i>{{ data_get($item, 'kecamatan.nama', 'Sangihe') }}</span>
            <a href="{{ route('public.sekolah-keagamaan.show', data_get($item, 'id')) }}" class="text-sm font-extrabold text-[#2f6b3f]">Detail</a>
        </div>
    </div>
</article>
