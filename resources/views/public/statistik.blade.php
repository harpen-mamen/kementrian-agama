@extends('layouts.public')

@section('content')
<x-public.page-hero
    title="Statistik Keagamaan"
    subtitle="Ringkasan informasi keagamaan yang disajikan secara sederhana, informatif, dan mudah dipahami masyarakat."
/>

<section class="bg-slate-50 py-24">
    <div class="mx-auto max-w-7xl px-6">
        <x-public.section-heading
            eyebrow="Ringkasan Data"
            title="Informasi Statistik Publik"
            description="Data publik ditampilkan secara ringkas. Data rinci tetap dikelola dan diverifikasi melalui admin Kemenag."
        />

        <div class="mt-12 grid gap-6 md:grid-cols-4">
            <div class="rounded-3xl bg-white p-8 shadow-sm" data-aos="fade-up">
                <div class="text-4xl font-bold text-[#2f6b3f]">{{ $stats['rumah_ibadah'] ?? 0 }}</div>
                <p class="mt-2 text-sm font-semibold text-slate-600">Rumah Ibadah</p>
            </div>

            <div class="rounded-3xl bg-white p-8 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                <div class="text-4xl font-bold text-[#0f5f7a]">{{ $stats['sekolah_keagamaan'] ?? 0 }}</div>
                <p class="mt-2 text-sm font-semibold text-slate-600">Pendidikan Keagamaan</p>
            </div>

            <div class="rounded-3xl bg-white p-8 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                <div class="text-4xl font-bold text-[#d6a63a]">{{ $stats['berita'] ?? 0 }}</div>
                <p class="mt-2 text-sm font-semibold text-slate-600">Berita Dipublikasikan</p>
            </div>

            <div class="rounded-3xl bg-white p-8 shadow-sm" data-aos="fade-up" data-aos-delay="300">
                <div class="text-4xl font-bold text-slate-900">{{ $stats['kecamatan'] ?? 0 }}</div>
                <p class="mt-2 text-sm font-semibold text-slate-600">Kecamatan</p>
            </div>
        </div>

        <div class="mt-12 rounded-3xl bg-white p-8 shadow-sm" data-aos="fade-up">
            <h3 class="text-xl font-bold text-slate-900">Grafik Informasi</h3>
            <p class="mt-2 text-sm text-slate-600">
                Grafik detail dapat dikembangkan setelah data rumah ibadah, data umat, dan pendidikan keagamaan sudah terverifikasi.
            </p>

            <div class="mt-8 h-72 rounded-2xl bg-slate-50 p-6">
                <canvas id="chartStatistik"></canvas>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('chartStatistik');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Rumah Ibadah', 'Pendidikan', 'Berita', 'Kecamatan'],
            datasets: [{
                label: 'Ringkasan Data',
                data: [
                    {{ $stats['rumah_ibadah'] ?? 0 }},
                    {{ $stats['sekolah_keagamaan'] ?? 0 }},
                    {{ $stats['berita'] ?? 0 }},
                    {{ $stats['kecamatan'] ?? 0 }}
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
        }
    });
</script>
@endpush