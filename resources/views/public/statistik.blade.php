<x-layouts.public title="Statistik - Peta Harmoni Sangihe">
    <x-public.page-hero eyebrow="Infografis Publik" title="Statistik Keagamaan" subtitle="Ringkasan data publik rumah ibadah, agama, pendidikan keagamaan, wilayah, dan berita." />

    <section class="section-padding bg-slate-50">
        <div class="container-public">
            <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-5">
                @foreach ([['Rumah Ibadah', $stats['totalRumahIbadah'], 'fa-place-of-worship'], ['Agama', $stats['totalAgama'], 'fa-hands-praying'], ['Sekolah', $stats['totalSekolah'], 'fa-school'], ['Kecamatan', $stats['totalKecamatan'], 'fa-map-location-dot'], ['Berita', $stats['totalBerita'], 'fa-newspaper']] as [$label, $value, $icon])
                    <div class="card-premium-static p-6">
                        <div class="icon-wrap bg-[#2f6b3f]/10 text-[#2f6b3f]"><i class="fa-solid {{ $icon }}"></i></div>
                        <div class="mt-5 text-3xl font-extrabold text-slate-900">{{ number_format($value, 0, ',', '.') }}</div>
                        <div class="mt-2 text-sm font-bold text-slate-500">{{ $label }}</div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10 grid gap-6 lg:grid-cols-2">
                <div class="card-premium-static p-7">
                    <h3 class="text-lg font-extrabold text-slate-900">Rumah Ibadah per Agama</h3>
                    <canvas id="chartRumahAgama" class="mt-6 h-80"></canvas>
                    <div id="emptyRumahAgama" class="hidden"><x-public.empty-state title="Grafik belum tersedia" message="Belum ada data rumah ibadah per agama yang dapat ditampilkan." /></div>
                </div>
                <div class="card-premium-static p-7">
                    <h3 class="text-lg font-extrabold text-slate-900">Rumah Ibadah per Kecamatan</h3>
                    <canvas id="chartRumahKecamatan" class="mt-6 h-80"></canvas>
                    <div id="emptyRumahKecamatan" class="hidden"><x-public.empty-state title="Grafik belum tersedia" message="Belum ada data rumah ibadah per kecamatan yang dapat ditampilkan." /></div>
                </div>
                <div class="card-premium-static p-7 lg:col-span-2">
                    <h3 class="text-lg font-extrabold text-slate-900">Sekolah Keagamaan per Agama</h3>
                    <canvas id="chartSekolahAgama" class="mt-6 h-80"></canvas>
                    <div id="emptySekolahAgama" class="hidden"><x-public.empty-state title="Grafik belum tersedia" message="Belum ada data sekolah keagamaan per agama yang dapat ditampilkan." /></div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const chartData = @json($charts);
            const palette = ['#2f6b3f', '#0f5f7a', '#d6a63a', '#64748b', '#16a34a', '#0891b2', '#a16207'];

            function renderChart(canvasId, emptyId, source, type = 'bar') {
                const canvas = document.getElementById(canvasId);
                const empty = document.getElementById(emptyId);
                if (!canvas || !window.Chart || !source?.labels?.length) {
                    if (canvas) canvas.classList.add('hidden');
                    if (empty) empty.classList.remove('hidden');
                    return;
                }

                new Chart(canvas, {
                    type,
                    data: {
                        labels: source.labels,
                        datasets: [{ data: source.values, backgroundColor: palette, borderRadius: 12 }]
                    },
                    options: { responsive: true, maintainAspectRatio: false, plugins: { legend: { display: type === 'doughnut' } }, scales: type === 'bar' ? { y: { beginAtZero: true, ticks: { precision: 0 } } } : {} }
                });
            }

            renderChart('chartRumahAgama', 'emptyRumahAgama', chartData.rumahIbadahPerAgama, 'doughnut');
            renderChart('chartRumahKecamatan', 'emptyRumahKecamatan', chartData.rumahIbadahPerKecamatan);
            renderChart('chartSekolahAgama', 'emptySekolahAgama', chartData.sekolahPerAgama);
        </script>
    @endpush
</x-layouts.public>
