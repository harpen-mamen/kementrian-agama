@extends('layouts.public')

@section('content')
<x-public.page-hero
    title="Pendidikan Keagamaan"
    subtitle="Informasi sekolah dan lembaga pendidikan keagamaan di Kabupaten Kepulauan Sangihe."
/>

<section class="bg-slate-50 py-20">
    <div class="mx-auto max-w-7xl px-6">
        <form class="mb-10 rounded-3xl bg-white p-6 shadow-sm" method="GET" data-aos="fade-up">
            <div class="grid gap-4 md:grid-cols-2">
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari nama sekolah/lembaga..."
                    class="rounded-2xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#2f6b3f]"
                >

                <button class="rounded-2xl bg-[#2f6b3f] px-5 py-3 text-sm font-bold text-white">
                    Cari Data
                </button>
            </div>
        </form>

        @if($sekolahs instanceof \Illuminate\Pagination\AbstractPaginator && $sekolahs->count())
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($sekolahs as $index => $sekolah)
                    <div class="group overflow-hidden rounded-3xl bg-white shadow-sm transition hover:-translate-y-2 hover:shadow-2xl" data-aos="fade-up" data-aos-delay="{{ $index * 80 }}">
                        <img src="{{ asset('images/placeholder-sekolah.jpg') }}" alt="{{ $sekolah->nama }}" class="h-56 w-full object-cover transition duration-700 group-hover:scale-105">

                        <div class="p-6">
                            <div class="mb-2 text-sm font-semibold text-[#d6a63a]">{{ $sekolah->jenis ?? 'Lembaga Pendidikan' }}</div>
                            <h3 class="text-xl font-bold text-slate-900">{{ $sekolah->nama }}</h3>
                            <p class="mt-3 text-sm text-slate-600">{{ $sekolah->kecamatan->nama ?? 'Kabupaten Kepulauan Sangihe' }}</p>

                            <a href="{{ route('public.sekolah-keagamaan.show', $sekolah->id) }}" class="mt-5 inline-flex text-sm font-bold text-[#2f6b3f]">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-12">
                {{ $sekolahs->links() }}
            </div>
        @else
            <x-public.empty-state
                title="Data pendidikan keagamaan belum tersedia"
                description="Data yang tampil untuk publik adalah data yang sudah dipublikasikan oleh admin pusat."
            />
        @endif
    </div>
</section>
@endsection