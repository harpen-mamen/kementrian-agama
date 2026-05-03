@extends('layouts.public')

@section('content')
<x-public.page-hero
    :title="$rumahIbadah->nama"
    subtitle="Informasi rumah ibadah yang telah dipublikasikan untuk masyarakat."
/>

<section class="bg-slate-50 py-20">
    <div class="mx-auto grid max-w-7xl gap-10 px-6 lg:grid-cols-3">
        <div class="lg:col-span-2">
            <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm" data-aos="fade-up">
                <img src="{{ asset('images/placeholder-rumah-ibadah.jpg') }}" alt="{{ $rumahIbadah->nama }}" class="h-[430px] w-full object-cover">

                <div class="p-8">
                    <div class="mb-4 inline-flex rounded-full bg-[#2f6b3f]/10 px-4 py-2 text-sm font-bold text-[#2f6b3f]">
                        {{ $rumahIbadah->agama->nama ?? 'Agama' }}
                    </div>

                    <h2 class="text-3xl font-bold text-slate-900">{{ $rumahIbadah->nama }}</h2>

                    <p class="mt-4 leading-relaxed text-slate-600">
                        {{ $rumahIbadah->alamat ?? 'Alamat belum tersedia.' }}
                    </p>
                </div>
            </div>
        </div>

        <aside class="space-y-6">
            <div class="rounded-[2rem] bg-white p-8 shadow-sm" data-aos="fade-left">
                <h3 class="mb-6 text-xl font-bold text-slate-900">Informasi Ringkas</h3>

                <div class="space-y-4 text-sm">
                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <span class="text-slate-500">Jenis</span>
                        <span class="font-semibold text-slate-900">{{ $rumahIbadah->jenis ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <span class="text-slate-500">Agama</span>
                        <span class="font-semibold text-slate-900">{{ $rumahIbadah->agama->nama ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <span class="text-slate-500">Kecamatan</span>
                        <span class="font-semibold text-slate-900">{{ $rumahIbadah->kecamatan->nama ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <span class="text-slate-500">Jemaat/Jamaah</span>
                        <span class="font-semibold text-slate-900">{{ $rumahIbadah->jumlah_jemaat ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between gap-4 border-b border-slate-100 pb-3">
                        <span class="text-slate-500">Kapasitas</span>
                        <span class="font-semibold text-slate-900">{{ $rumahIbadah->kapasitas ?? '-' }}</span>
                    </div>

                    <div class="flex justify-between gap-4">
                        <span class="text-slate-500">Status</span>
                        <span class="font-semibold text-[#2f6b3f]">Dipublikasikan</span>
                    </div>
                </div>
            </div>

            <div class="rounded-[2rem] bg-white p-8 shadow-sm" data-aos="fade-left" data-aos-delay="100">
                <h3 class="mb-3 text-xl font-bold text-slate-900">Jadwal Ibadah</h3>
                <p class="text-sm leading-relaxed text-slate-600">
                    {{ $rumahIbadah->jadwal_ibadah ?? 'Jadwal ibadah belum tersedia untuk publik.' }}
                </p>
            </div>
        </aside>
    </div>
</section>
@endsection