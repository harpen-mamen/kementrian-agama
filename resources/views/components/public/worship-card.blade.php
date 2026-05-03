@props(['item' => null, 'delay' => 0, 'aos' => 'fade-up'])

@php
    $nama = data_get($item, 'nama', 'Contoh Rumah Ibadah');
    $jenis = data_get($item, 'jenis', 'Rumah Ibadah');
    $agama = data_get($item, 'agama.nama', 'Lintas Agama');
    $kecamatan = data_get($item, 'kecamatan.nama', 'Kabupaten Kepulauan Sangihe');
    $id = data_get($item, 'id');
    $foto = asset('images/placeholder-rumah-ibadah.jpg');
@endphp

<div
    class="group overflow-hidden rounded-3xl bg-white shadow-sm ring-1 ring-slate-100 transition duration-500 hover:-translate-y-2 hover:shadow-2xl"
    data-aos="{{ $aos }}"
    data-aos-delay="{{ $delay }}"
>
    <div class="relative h-56 overflow-hidden">
        <img src="{{ $foto }}" alt="{{ $nama }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-110">
        <div class="absolute left-4 top-4 rounded-full bg-white/90 px-3 py-1 text-xs font-bold text-[#2f6b3f] backdrop-blur">
            {{ $agama }}
        </div>
    </div>

    <div class="p-6">
        <div class="mb-2 text-sm font-semibold text-[#d6a63a]">
            {{ $jenis }}
        </div>

        <h3 class="line-clamp-2 text-xl font-bold text-slate-900 transition group-hover:text-[#2f6b3f]">
            {{ $nama }}
        </h3>

        <p class="mt-3 flex items-center gap-2 text-sm text-slate-600">
            <i class="fa-solid fa-location-dot text-[#2f6b3f]"></i>
            {{ $kecamatan }}
        </p>

        @if($id)
            <a href="{{ route('public.rumah-ibadah.show', $id) }}" class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#2f6b3f]">
                Lihat Detail
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </a>
        @else
            <span class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#2f6b3f]">
                Lihat Detail
                <i class="fa-solid fa-arrow-right text-xs"></i>
            </span>
        @endif
    </div>
</div>