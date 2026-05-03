@extends('layouts.public', ['title' => 'Peta Harmoni Sangihe', 'fullWidth' => true])

@php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;

    $sampleBerita = collect([
        [
            'judul' => 'Dialog Kerukunan Umat Beragama di Kepulauan Sangihe',
            'ringkasan' => 'Kegiatan bersama tokoh lintas agama untuk memperkuat saling pengertian dan pelayanan masyarakat.',
            'kategori' => 'Contoh Berita',
            'tanggal' => now(),
            'gambar' => asset('images/placeholder-berita.jpg'),
            'url' => route('berita.index'),
            'dummy' => true,
        ],
        [
            'judul' => 'Pelayanan Keagamaan Hadir Lebih Dekat untuk Masyarakat',
            'ringkasan' => 'Informasi layanan publik Kementerian Agama disiapkan agar mudah diakses oleh warga.',
            'kategori' => 'Contoh Berita',
            'tanggal' => now()->subDays(2),
            'gambar' => asset('images/placeholder-berita.jpg'),
            'url' => route('berita.index'),
            'dummy' => true,
        ],
        [
            'judul' => 'Pemutakhiran Data Rumah Ibadah Kabupaten Kepulauan Sangihe',
            'ringkasan' => 'Data rumah ibadah diverifikasi bertahap untuk mendukung keterbukaan informasi publik.',
            'kategori' => 'Contoh Berita',
            'tanggal' => now()->subDays(5),
            'gambar' => asset('images/placeholder-berita.jpg'),
            'url' => route('berita.index'),
            'dummy' => true,
        ],
    ]);

    $beritaCards = $beritaTerbaru->isNotEmpty()
        ? $beritaTerbaru->map(fn ($item) => [
            'judul' => $item->judul,
            'ringkasan' => $item->ringkasan ?: Str::limit(strip_tags($item->isi), 120),
            'kategori' => $item->kategoriBerita?->nama ?? 'Informasi',
            'tanggal' => $item->published_at ?? $item->created_at,
            'gambar' => $item->gambar ? Storage::url($item->gambar) : asset('images/placeholder-berita.jpg'),
            'url' => route('berita.show', $item->slug),
            'dummy' => false,
        ])
        : $sampleBerita;

    $sampleRumahIbadah = collect([
        ['nama' => 'Rumah Ibadah Harmoni Tahuna', 'jenis' => 'Rumah Ibadah', 'agama' => 'Lintas Data', 'kecamatan' => 'Tahuna', 'dummy' => true],
        ['nama' => 'Rumah Ibadah Damai Sangihe', 'jenis' => 'Rumah Ibadah', 'agama' => 'Lintas Data', 'kecamatan' => 'Manganitu', 'dummy' => true],
        ['nama' => 'Rumah Ibadah Persaudaraan', 'jenis' => 'Rumah Ibadah', 'agama' => 'Lintas Data', 'kecamatan' => 'Tabukan Utara', 'dummy' => true],
    ]);

    $rumahIbadahCards = $rumahIbadahTerbaru->isNotEmpty()
        ? $rumahIbadahTerbaru->map(function ($item) {
            $foto = $item->fotoRumahIbadah->sortByDesc('is_utama')->first();

            return [
                'nama' => $item->nama,
                'jenis' => $item->jenis,
                'agama' => $item->agama?->nama ?? 'Data agama',
                'kecamatan' => $item->kecamatan?->nama ?? 'Kecamatan',
                'gambar' => $foto ? Storage::url($foto->file_path) : asset('images/placeholder-rumah-ibadah.jpg'),
                'url' => route('rumah-ibadah.show', $item),
                'dummy' => false,
            ];
        })
        : $sampleRumahIbadah->map(fn ($item) => $item + [
            'gambar' => asset('images/placeholder-rumah-ibadah.jpg'),
            'url' => route('rumah-ibadah.index'),
        ]);
@endphp

@section('content')
    <section class="relative isolate flex min-h-[80vh] items-center overflow-hidden bg-[#1f2937]">
        {{-- TODO ganti hero image dengan foto resmi Sangihe/Kemenag --}}
        <img src="{{ asset('images/hero-sangihe.jpg') }}" alt="Lanskap Kepulauan Sangihe" class="hero-kenburns absolute inset-0 -z-20 h-full w-full object-cover">
        <div class="absolute inset-0 -z-10 bg-black/55"></div>
        <div class="absolute inset-x-0 bottom-0 -z-10 h-40 bg-gradient-to-t from-[#1f2937]/80 to-transparent"></div>

        <div class="mx-auto w-full max-w-7xl px-4 py-24 sm:px-6 lg:px-8">
            <div class="max-w-4xl text-white">
                <p data-aos="fade-up" class="inline-flex rounded-full border border-white/25 bg-white/10 px-4 py-2 text-sm font-semibold backdrop-blur">Kementerian Agama Kabupaten Kepulauan Sangihe</p>
                <h1 data-aos="fade-up" data-aos-delay="120" class="mt-6 text-4xl font-bold leading-tight tracking-tight sm:text-5xl lg:text-6xl">Merawat Harmoni Umat Beragama di Kabupaten Kepulauan Sangihe</h1>
                <p data-aos="fade-up" data-aos-delay="240" class="mt-6 max-w-3xl text-base leading-8 text-white/85 sm:text-lg">Portal informasi keagamaan, rumah ibadah, pendidikan keagamaan, berita, dan layanan publik Kementerian Agama Kabupaten Kepulauan Sangihe.</p>
                <div data-aos="fade-up" data-aos-delay="360" class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('peta-digital') }}" class="inline-flex items-center justify-center rounded-full bg-[#d6a63a] px-6 py-3 text-sm font-bold text-[#1f2937] shadow-lg shadow-black/20 transition hover:-translate-y-0.5 hover:bg-[#e4b64c]">Jelajahi Peta Digital</a>
                    <a href="{{ route('berita.index') }}" class="inline-flex items-center justify-center rounded-full border border-white/35 bg-white/10 px-6 py-3 text-sm font-bold text-white backdrop-blur transition hover:-translate-y-0.5 hover:bg-white/20">Lihat Berita Terbaru</a>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-[0.9fr_1.1fr] lg:items-center lg:px-8">
            <div data-aos="fade-right" class="relative">
                <div class="absolute -left-4 -top-4 h-24 w-24 rounded-2xl border-2 border-[#d6a63a]"></div>
                {{-- TODO ganti foto pimpinan dengan foto resmi --}}
                <img src="{{ asset('images/pimpinan-placeholder.jpg') }}" alt="Kepala Kantor Kementerian Agama Kabupaten Kepulauan Sangihe" class="relative aspect-[4/5] w-full rounded-2xl object-cover shadow-xl shadow-slate-900/10">
            </div>
            <div data-aos="fade-left" class="rounded-2xl border border-slate-100 bg-white p-6 shadow-xl shadow-slate-900/5 sm:p-10">
                <div class="h-1 w-20 rounded-full bg-[#d6a63a]"></div>
                <h2 class="mt-6 text-3xl font-bold tracking-tight text-slate-900">Sambutan Kepala Kantor Kementerian Agama Kabupaten Kepulauan Sangihe</h2>
                {{-- TODO isi sambutan resmi pimpinan --}}
                <p class="mt-5 text-base leading-8 text-slate-600">Selamat datang di Portal Harmoni Kementerian Agama Kabupaten Kepulauan Sangihe. Website ini dihadirkan sebagai media informasi, pelayanan, dan penyajian data keagamaan yang terbuka, ramah, dan informatif bagi masyarakat.</p>
                <a href="{{ route('kontak') }}#profil" class="mt-8 inline-flex rounded-full bg-[#2f6b3f] px-5 py-3 text-sm font-semibold text-white transition hover:bg-[#285d36]">Baca Selengkapnya</a>
            </div>
        </div>
    </section>

    <section class="bg-[#f8fafc] py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-public.section-title title="Informasi Keagamaan yang Tertata dan Mudah Diakses" description="Ringkasan layanan dan data disusun agar masyarakat dapat menemukan informasi penting dengan cepat tanpa merasa penuh oleh angka." />
            <div class="mt-12 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
                @foreach ([
                    ['title' => 'Rumah Ibadah', 'desc' => 'Direktori rumah ibadah dari berbagai agama yang sudah diverifikasi.', 'meta' => $totalRumahIbadah . ' data tercatat', 'icon' => 'RI'],
                    ['title' => 'Pendidikan Keagamaan', 'desc' => 'Informasi sekolah dan lembaga pendidikan keagamaan di Sangihe.', 'meta' => $totalSekolahKeagamaan . ' data tercatat', 'icon' => 'PK'],
                    ['title' => 'Peta Digital', 'desc' => 'Sebaran informasi lokasi dalam peta yang mudah dijelajahi.', 'meta' => $totalKecamatan . ' kecamatan', 'icon' => 'PD'],
                    ['title' => 'Harmoni dan Toleransi', 'desc' => 'Ruang informasi kegiatan moderasi beragama dan pelayanan umat.', 'meta' => 'Inklusif dan netral', 'icon' => 'HT'],
                ] as $card)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 90 }}" class="group rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-900/10">
                        <div class="grid h-12 w-12 place-items-center rounded-2xl bg-[#2f6b3f]/10 text-sm font-bold text-[#2f6b3f]">{{ $card['icon'] }}</div>
                        <h3 class="mt-5 text-lg font-bold text-slate-900">{{ $card['title'] }}</h3>
                        <p class="mt-3 text-sm leading-6 text-slate-600">{{ $card['desc'] }}</p>
                        <p class="mt-5 text-xs font-semibold uppercase tracking-wide text-[#0f5f7a]">{{ $card['meta'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <x-public.section-title align="left" title="Berita dan Kegiatan Terbaru" description="Kabar terbaru seputar pelayanan, kegiatan, dan informasi publik Kementerian Agama Kabupaten Kepulauan Sangihe." />
                <a href="{{ route('berita.index') }}" class="inline-flex rounded-full border border-[#2f6b3f]/25 px-5 py-3 text-sm font-semibold text-[#2f6b3f] transition hover:bg-[#2f6b3f] hover:text-white">Semua Berita</a>
            </div>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach ($beritaCards as $item)
                    <article data-aos="fade-up" data-aos-delay="{{ $loop->index * 120 }}" class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl hover:shadow-slate-900/10">
                        <a href="{{ $item['url'] }}" class="block overflow-hidden">
                            <div class="relative aspect-[4/3] overflow-hidden">
                                <img src="{{ $item['gambar'] }}" alt="{{ $item['judul'] }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
                                <span class="absolute left-4 top-4 rounded-full bg-white/95 px-3 py-1 text-xs font-bold text-[#2f6b3f] shadow">{{ $item['kategori'] }}</span>
                                @if ($item['dummy'])
                                    <span class="absolute bottom-4 left-4 rounded-full bg-[#d6a63a] px-3 py-1 text-xs font-bold text-[#1f2937]">Contoh tampilan</span>
                                @endif
                            </div>
                        </a>
                        <div class="p-6">
                            <p class="text-xs font-semibold uppercase tracking-wide text-slate-500">{{ optional($item['tanggal'])->translatedFormat('d F Y') }}</p>
                            <h3 class="mt-3 text-xl font-bold leading-snug text-slate-900">{{ $item['judul'] }}</h3>
                            <p class="mt-3 text-sm leading-6 text-slate-600">{{ $item['ringkasan'] }}</p>
                            <a href="{{ $item['url'] }}" class="mt-5 inline-flex text-sm font-bold text-[#0f5f7a] transition hover:text-[#2f6b3f]">Baca Berita</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-[#f8fafc] py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-public.section-title title="Rumah Ibadah di Sangihe" description="Temukan informasi rumah ibadah dari berbagai agama yang tersebar di wilayah Kabupaten Kepulauan Sangihe." />
            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($rumahIbadahCards as $item)
                    <article data-aos="{{ $loop->index % 2 === 0 ? 'fade-left' : 'fade-right' }}" data-aos-delay="{{ ($loop->index % 3) * 100 }}" class="group overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm transition duration-300 hover:-translate-y-1.5 hover:shadow-xl hover:shadow-slate-900/10">
                        <div class="aspect-[4/3] overflow-hidden">
                            <img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}" class="h-full w-full object-cover transition duration-700 group-hover:scale-105">
                        </div>
                        <div class="p-6">
                            <div class="flex flex-wrap gap-2">
                                <span class="rounded-full bg-[#2f6b3f]/10 px-3 py-1 text-xs font-bold text-[#2f6b3f]">{{ $item['jenis'] }}</span>
                                @if ($item['dummy'])
                                    <span class="rounded-full bg-[#d6a63a]/20 px-3 py-1 text-xs font-bold text-[#7a5a10]">Data contoh</span>
                                @endif
                            </div>
                            <h3 class="mt-4 text-xl font-bold text-slate-900">{{ $item['nama'] }}</h3>
                            <p class="mt-2 text-sm text-slate-600">{{ $item['agama'] }} - {{ $item['kecamatan'] }}</p>
                            <a href="{{ $item['url'] }}" class="mt-5 inline-flex rounded-full border border-slate-200 px-4 py-2 text-sm font-semibold text-[#0f5f7a] transition hover:border-[#0f5f7a] hover:bg-[#0f5f7a] hover:text-white">Lihat Detail</a>
                        </div>
                    </article>
                @endforeach
            </div>
            {{-- TODO verifikasi data rumah ibadah sebelum dipublikasikan --}}
        </div>
    </section>

    <section class="bg-white py-20">
        <div class="mx-auto grid max-w-7xl gap-10 px-4 sm:px-6 lg:grid-cols-2 lg:items-center lg:px-8">
            <div data-aos="fade-right">
                <x-public.section-title align="left" title="Peta Digital Keagamaan" description="Preview lokasi disajikan ringan di halaman utama. Peta lengkap dengan marker rumah ibadah tetap tersedia di halaman peta digital." />
                <a href="{{ route('peta-digital') }}" class="mt-8 inline-flex rounded-full bg-[#0f5f7a] px-6 py-3 text-sm font-bold text-white transition hover:bg-[#0b5269]">Buka Peta Digital</a>
            </div>
            <div data-aos="fade-left" class="overflow-hidden rounded-2xl border border-slate-100 bg-slate-100 shadow-xl shadow-slate-900/10">
                <div id="homeMapPreview" class="h-[360px]"></div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-br from-[#2f6b3f] to-[#0f5f7a] py-20 text-white">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <x-public.section-title title="Merawat Kerukunan, Menguatkan Toleransi" description="Harmoni tumbuh melalui pelayanan yang adil, edukasi yang terbuka, dan ruang temu yang saling menghargai." class="text-white [&_h2]:text-white [&_p]:text-white/75 [&>p:first-child]:text-[#d6a63a]" />
            <div class="mt-12 grid gap-5 md:grid-cols-3">
                @foreach ([
                    ['title' => 'Kegiatan Lintas Agama', 'desc' => 'Mendorong ruang dialog dan kolaborasi sosial yang menjaga persaudaraan.'],
                    ['title' => 'Moderasi Beragama', 'desc' => 'Menguatkan cara pandang yang seimbang, damai, dan menghargai kemajemukan.'],
                    ['title' => 'Pelayanan Masyarakat', 'desc' => 'Menghadirkan layanan informasi keagamaan yang mudah dijangkau publik.'],
                ] as $item)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 120 }}" class="rounded-2xl border border-white/15 bg-white/10 p-6 backdrop-blur">
                        <div class="h-1 w-12 rounded-full bg-[#d6a63a]"></div>
                        <h3 class="mt-5 text-xl font-bold">{{ $item['title'] }}</h3>
                        <p class="mt-3 text-sm leading-6 text-white/75">{{ $item['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const mapElement = document.getElementById('homeMapPreview');

            if (!mapElement || !window.L) {
                return;
            }

            const map = window.L.map(mapElement, {
                zoomControl: false,
                dragging: false,
                scrollWheelZoom: false,
                doubleClickZoom: false,
                boxZoom: false,
                keyboard: false,
                tap: false,
            }).setView([3.58, 125.55], 9);

            window.L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors',
            }).addTo(map);

            window.L.circleMarker([3.58, 125.55], {
                radius: 10,
                color: '#2f6b3f',
                fillColor: '#d6a63a',
                fillOpacity: 0.85,
                weight: 3,
            }).addTo(map).bindPopup('Kabupaten Kepulauan Sangihe');
        });
    </script>
@endpush
