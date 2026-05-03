@extends('layouts.public')

@section('content')
<x-public.page-hero
    title="Rumah Ibadah"
    subtitle="Direktori informasi rumah ibadah yang telah dipublikasikan untuk masyarakat."
/>

<section class="bg-slate-50 py-20">
    <div class="mx-auto max-w-7xl px-6">
        <form class="mb-10 rounded-3xl bg-white p-6 shadow-sm" method="GET" data-aos="fade-up">
            <div class="grid gap-4 md:grid-cols-3">
                <input
                    type="text"
                    name="q"
                    value="{{ request('q') }}"
                    placeholder="Cari nama rumah ibadah..."
                    class="rounded-2xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#2f6b3f]"
                >

                <select name="jenis" class="rounded-2xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#2f6b3f]">
                    <option value="">Semua Jenis</option>
                    <option value="Masjid" @selected(request('jenis') === 'Masjid')>Masjid</option>
                    <option value="Gereja" @selected(request('jenis') === 'Gereja')>Gereja</option>
                    <option value="Pura" @selected(request('jenis') === 'Pura')>Pura</option>
                    <option value="Vihara" @selected(request('jenis') === 'Vihara')>Vihara</option>
                    <option value="Klenteng" @selected(request('jenis') === 'Klenteng')>Klenteng</option>
                </select>

                <button class="rounded-2xl bg-[#2f6b3f] px-5 py-3 text-sm font-bold text-white">
                    Cari Data
                </button>
            </div>
        </form>

        @if($rumahIbadahs instanceof \Illuminate\Pagination\AbstractPaginator && $rumahIbadahs->count())
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($rumahIbadahs as $index => $item)
                    <x-public.worship-card
                        :item="$item"
                        :delay="$index * 80"
                        :aos="$index % 2 === 0 ? 'fade-left' : 'fade-right'"
                    />
                @endforeach
            </div>

            <div class="mt-12">
                {{ $rumahIbadahs->links() }}
            </div>
        @else
            <x-public.empty-state
                title="Data rumah ibadah belum tersedia"
                description="Data rumah ibadah yang tampil untuk publik adalah data yang sudah dipublikasikan oleh admin pusat."
            />
        @endif
    </div>
</section>
@endsection