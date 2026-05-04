<x-layouts.public title="Layanan - Peta Harmoni Sangihe">
    <x-public.page-hero eyebrow="Layanan Publik" title="Layanan Kementerian Agama" subtitle="Ruang informasi layanan untuk masyarakat Kabupaten Kepulauan Sangihe." />

    <section class="section-padding bg-white">
        <div class="container-public">
            <x-public.section-heading align="center" eyebrow="Daftar Layanan" title="Pelayanan yang mudah dikenali dan diakses" subtitle="Informasi layanan disusun ringkas agar masyarakat dapat menemukan kanal yang sesuai dengan kebutuhan." />
            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ([['Informasi Rumah Ibadah', 'Direktori dan data lokasi rumah ibadah publik.', 'fa-place-of-worship'], ['Data Keagamaan', 'Ringkasan statistik dan informasi data umat beragama.', 'fa-chart-simple'], ['Pendidikan Keagamaan', 'Informasi sekolah dan lembaga pendidikan keagamaan.', 'fa-school'], ['Pengaduan Masyarakat', 'Kanal awal untuk menyampaikan aspirasi dan pengaduan.', 'fa-comments'], ['Konsultasi Keagamaan', 'Arah informasi konsultasi dan pembinaan umat.', 'fa-handshake-angle'], ['Informasi Kegiatan', 'Kabar kegiatan dan publikasi resmi Kementerian Agama.', 'fa-calendar-days']] as [$title, $desc, $icon])
                    <div class="card-premium p-8">
                        <div class="icon-wrap bg-[#2f6b3f]/10 text-[#2f6b3f]"><i class="fa-solid {{ $icon }}"></i></div>
                        <h3 class="mt-6 text-xl font-extrabold text-slate-900">{{ $title }}</h3>
                        <p class="mt-4 text-sm leading-7 text-slate-600">{{ $desc }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-layouts.public>
