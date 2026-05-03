@extends('layouts.public')

@section('content')
<x-public.page-hero
    :title="$berita->judul"
    subtitle="Berita dan informasi resmi Kementerian Agama Kabupaten Kepulauan Sangihe."
/>

<section class="bg-white py-20">
    <article class="mx-auto max-w-4xl px-6">
        <div data-aos="fade-up">
            <div class="mb-6 flex flex-wrap items-center gap-3 text-sm text-slate-500">
                <span class="rounded-full bg-[#2f6b3f]/10 px-4 py-2 font-semibold text-[#2f6b3f]">Berita</span>
                <span>
                    <i class="fa-regular fa-calendar mr-2"></i>
                    {{ $berita->published_at ? \Carbon\Carbon::parse($berita->published_at)->translatedFormat('d F Y') : 'Tanggal belum tersedia' }}
                </span>
            </div>

            <img
                src="{{ $berita->gambar ? asset('storage/' . $berita->gambar) : asset('images/placeholder-berita.jpg') }}"
                alt="{{ $berita->judul }}"
                class="mb-10 h-[460px] w-full rounded-[2rem] object-cover shadow-xl"
            >

            <div class="prose prose-lg max-w-none prose-headings:text-slate-900 prose-p:text-slate-600">
                {!! $berita->isi !!}
            </div>
        </div>
    </article>

    <div class="mx-auto mt-20 max-w-7xl px-6">
        <x-public.section-heading
            eyebrow="Berita Terkait"
            title="Informasi Lainnya"
            description="Berita dan kegiatan lain yang mungkin ingin Anda baca."
        />

        <div class="mt-10 grid gap-8 md:grid-cols-3">
            @forelse($beritaTerkait as $index => $item)
                <x-public.news-card :berita="$item" :delay="$index * 100" />
            @empty
                <x-public.empty-state title="Belum ada berita terkait" description="Berita terkait akan tampil setelah tersedia." />
            @endforelse
        </div>
    </div>
</section>
@endsection