<x-layouts.public title="{{ data_get($rumahIbadah, 'nama') }} - Rumah Ibadah">
    <x-public.page-hero eyebrow="Detail Rumah Ibadah" title="{{ data_get($rumahIbadah, 'nama') }}" subtitle="{{ data_get($rumahIbadah, 'jenis') }} di {{ data_get($rumahIbadah, 'kecamatan.nama', 'Kabupaten Kepulauan Sangihe') }}" />

    @php
        $image = \App\Http\Controllers\PublicPageController::worshipImage($rumahIbadah);
        $lat = data_get($rumahIbadah, 'latitude');
        $lng = data_get($rumahIbadah, 'longitude');
    @endphp

    <section class="section-padding bg-white">
        <div class="container-public grid gap-8 lg:grid-cols-12">
            <div class="lg:col-span-7">
                <div class="card-premium-static overflow-hidden">
                    <img src="{{ $image }}" alt="{{ data_get($rumahIbadah, 'nama') }}" class="h-[420px] w-full object-cover">
                </div>
            </div>
            <div class="lg:col-span-5">
                <div class="card-premium-static p-8">
                    <div class="flex flex-wrap gap-2">
                        <span class="rounded-full bg-[#2f6b3f]/10 px-3 py-1 text-xs font-extrabold text-[#2f6b3f]">{{ data_get($rumahIbadah, 'agama.nama', 'Lintas Agama') }}</span>
                        <span class="rounded-full bg-[#d6a63a]/15 px-3 py-1 text-xs font-extrabold text-[#9a7122]">{{ data_get($rumahIbadah, 'jenis') }}</span>
                    </div>
                    <dl class="mt-7 grid gap-5 text-sm">
                        <div><dt class="font-extrabold text-slate-900">Alamat</dt><dd class="mt-2 leading-7 text-slate-600">{{ data_get($rumahIbadah, 'alamat') }}</dd></div>
                        <div><dt class="font-extrabold text-slate-900">Kecamatan</dt><dd class="mt-2 text-slate-600">{{ data_get($rumahIbadah, 'kecamatan.nama', '-') }}</dd></div>
                        @if (data_get($rumahIbadah, 'jumlah_jemaat'))<div><dt class="font-extrabold text-slate-900">Jumlah Jemaat/Jamaah</dt><dd class="mt-2 text-slate-600">{{ number_format(data_get($rumahIbadah, 'jumlah_jemaat'), 0, ',', '.') }}</dd></div>@endif
                        @if (data_get($rumahIbadah, 'kapasitas'))<div><dt class="font-extrabold text-slate-900">Kapasitas</dt><dd class="mt-2 text-slate-600">{{ number_format(data_get($rumahIbadah, 'kapasitas'), 0, ',', '.') }} orang</dd></div>@endif
                        @if (data_get($rumahIbadah, 'jadwal_ibadah'))<div><dt class="font-extrabold text-slate-900">Jadwal Ibadah</dt><dd class="mt-2 whitespace-pre-line leading-7 text-slate-600">{{ data_get($rumahIbadah, 'jadwal_ibadah') }}</dd></div>@endif
                    </dl>
                    <a href="{{ route('public.rumah-ibadah.index') }}" class="btn-outline mt-8">Kembali</a>
                </div>
            </div>
        </div>

        @if ($lat && $lng)
            <div class="container-public mt-8">
                <div class="card-premium-static overflow-hidden p-3">
                    <iframe class="h-80 w-full rounded-[1.5rem]" loading="lazy" src="https://www.openstreetmap.org/export/embed.html?bbox={{ $lng - 0.01 }}%2C{{ $lat - 0.01 }}%2C{{ $lng + 0.01 }}%2C{{ $lat + 0.01 }}&layer=mapnik&marker={{ $lat }}%2C{{ $lng }}"></iframe>
                </div>
            </div>
        @endif
    </section>
</x-layouts.public>
