<x-layouts.public title="Sekolah Keagamaan - Peta Harmoni Sangihe">
    <x-public.page-hero eyebrow="Direktori Pendidikan" title="Sekolah Keagamaan" subtitle="Daftar lembaga pendidikan keagamaan publik di Kabupaten Kepulauan Sangihe." />

    <section class="section-padding bg-slate-50">
        <div class="container-public">
            <form method="GET" class="card-premium-static grid gap-4 p-5 md:grid-cols-2 lg:grid-cols-4">
                <input type="search" name="search" value="{{ request('search') }}" placeholder="Cari nama sekolah/lembaga" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f] lg:col-span-2">
                <select name="agama" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f]">
                    <option value="">Semua agama</option>
                    @foreach ($agamas as $agama)
                        <option value="{{ $agama->id }}" @selected(request('agama') == $agama->id)>{{ $agama->nama }}</option>
                    @endforeach
                </select>
                <select name="kecamatan" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f]">
                    <option value="">Semua kecamatan</option>
                    @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->id }}" @selected(request('kecamatan') == $kecamatan->id)>{{ $kecamatan->nama }}</option>
                    @endforeach
                </select>
                <div class="flex gap-3 lg:col-span-4">
                    <button class="btn-primary" type="submit">Terapkan Filter</button>
                    <a href="{{ route('public.sekolah-keagamaan.index') }}" class="btn-outline">Reset</a>
                </div>
            </form>

            @if ($sekolahs->count())
                <div class="mt-10 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($sekolahs as $item)
                        <x-public.school-card :item="$item" />
                    @endforeach
                </div>
                <div class="mt-10">{{ $sekolahs->links() }}</div>
            @else
                <div class="mt-10">
                    <x-public.empty-state title="Data sekolah keagamaan belum tersedia" message="Data publik akan tampil setelah dipublikasikan atau diverifikasi oleh admin." />
                </div>
            @endif
        </div>
    </section>
</x-layouts.public>
