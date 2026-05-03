@extends('layouts.public')

@section('content')
<x-public.page-hero
    title="Berita dan Kegiatan"
    subtitle="Kabar terbaru, kegiatan pelayanan, pengumuman, dan informasi resmi Kementerian Agama Kabupaten Kepulauan Sangihe."
/>

<section class="bg-slate-50 py-20">
    <div class="mx-auto max-w-7xl px-6">
        @if($beritas instanceof \Illuminate\Pagination\AbstractPaginator && $beritas->count())
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($beritas as $index => $berita)
                    <x-public.news-card :berita="$berita" :delay="$index * 80" />
                @endforeach
            </div>

            <div class="mt-12">
                {{ $beritas->links() }}
            </div>
        @else
            <div class="grid gap-8 md:grid-cols-3">
                <x-public.news-card delay="0" />
                <x-public.news-card delay="100" />
                <x-public.news-card delay="200" />
            </div>
        @endif
    </div>
</section>
@endsection