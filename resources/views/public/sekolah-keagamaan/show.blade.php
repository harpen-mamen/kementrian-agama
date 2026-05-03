@extends('layouts.public')

@section('content')
<x-public.page-hero
    :title="$sekolah->nama"
    subtitle="Informasi pendidikan keagamaan yang telah dipublikasikan untuk masyarakat."
/>

<section class="bg-slate-50 py-20">
    <div class="mx-auto max-w-5xl px-6">
        <div class="overflow-hidden rounded-[2rem] bg-white shadow-sm" data-aos="fade-up">
            <img src="{{ asset('images/placeholder-sekolah.jpg') }}" alt="{{ $sekolah->nama }}" class="h-[430px] w-full object-cover">

            <div class="p-8">
                <div class="mb-4 inline-flex rounded-full bg-[#2f6b3f]/10 px-4 py-2 text-sm font-bold text-[#2f6b3f]">
                    {{ $sekolah->agama->nama ?? 'Pendidikan Keagamaan' }}
                </div>

                <h2 class="text-3xl font-bold text-slate-900">{{ $sekolah->nama }}</h2>

                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <div>
                        <p class="text-sm text-slate-500">Jenis</p>
                        <p class="mt-1 font-semibold text-slate-900">{{ $sekolah->jenis ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-slate-500">Kecamatan</p>
                        <p class="mt-1 font-semibold text-slate-900">{{ $sekolah->kecamatan->nama ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-slate-500">Jumlah Siswa</p>
                        <p class="mt-1 font-semibold text-slate-900">{{ $sekolah->jumlah_siswa ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-sm text-slate-500">Jumlah Guru</p>
                        <p class="mt-1 font-semibold text-slate-900">{{ $sekolah->jumlah_guru ?? '-' }}</p>
                    </div>
                </div>

                <p class="mt-8 leading-relaxed text-slate-600">
                    {{ $sekolah->alamat ?? 'Alamat belum tersedia.' }}
                </p>
            </div>
        </div>
    </div>
</section>
@endsection