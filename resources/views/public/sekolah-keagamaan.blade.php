@extends('layouts.public', ['title' => 'Sekolah Keagamaan'])

@section('content')
    <h1 class="mb-4 text-2xl font-semibold">Sekolah Keagamaan</h1>
    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($sekolahKeagamaan as $item)
            <article class="rounded-lg border border-slate-200 bg-white p-5">
                <h2 class="font-semibold">{{ $item->nama }}</h2>
                <p class="mt-1 text-sm text-slate-600">{{ $item->jenis }} - {{ $item->agama?->nama }}</p>
                <p class="mt-2 text-sm text-slate-500">{{ $item->kecamatan?->nama }}</p>
            </article>
        @empty
            <p class="text-slate-600">Belum ada sekolah keagamaan yang dipublikasikan.</p>
        @endforelse
    </div>
    <div class="mt-6">{{ $sekolahKeagamaan->links() }}</div>
@endsection
