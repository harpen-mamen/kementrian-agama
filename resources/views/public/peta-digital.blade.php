@extends('layouts.public')

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
@endpush

@section('content')
<x-public.page-hero
    title="Peta Digital Keagamaan"
    subtitle="Melihat sebaran rumah ibadah dan informasi keagamaan Kabupaten Kepulauan Sangihe secara visual dan mudah dipahami."
/>

<section class="bg-slate-50 py-16">
    <div class="mx-auto max-w-7xl px-6">
        <div class="mb-8 rounded-3xl bg-white p-6 shadow-sm" data-aos="fade-up">
            <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-slate-900">Peta Rumah Ibadah</h2>
                    <p class="mt-1 text-sm text-slate-600">Data yang tampil adalah data yang telah dipublikasikan.</p>
                </div>

                <div class="flex flex-wrap gap-2 text-xs font-semibold">
                    <span class="rounded-full bg-[#2f6b3f]/10 px-4 py-2 text-[#2f6b3f]">Rumah Ibadah</span>
                    <span class="rounded-full bg-[#0f5f7a]/10 px-4 py-2 text-[#0f5f7a]">Pendidikan</span>
                    <span class="rounded-full bg-[#d6a63a]/10 px-4 py-2 text-[#9a741d]">Wilayah</span>
                </div>
            </div>
        </div>

        <div class="overflow-hidden rounded-[2rem] bg-white shadow-2xl" data-aos="zoom-in">
            <div id="map" class="h-[650px] w-full"></div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([3.6, 125.5], 10);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; OpenStreetMap'
    }).addTo(map);

    const rumahIbadahs = @json($rumahIbadahs ?? []);

    rumahIbadahs.forEach((item) => {
        if (!item.latitude || !item.longitude) {
            return;
        }

        const popup = `
            <div style="min-width: 220px">
                <strong>${item.nama ?? 'Rumah Ibadah'}</strong><br>
                <span>${item.jenis ?? ''}</span><br>
                <span>${item.kecamatan?.nama ?? ''}</span><br>
                <a href="/rumah-ibadah/${item.id}" style="display:inline-block;margin-top:8px;color:#2f6b3f;font-weight:bold">
                    Lihat Detail
                </a>
            </div>
        `;

        L.marker([item.latitude, item.longitude]).addTo(map).bindPopup(popup);
    });
</script>
@endpush