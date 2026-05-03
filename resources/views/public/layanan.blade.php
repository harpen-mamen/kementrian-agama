@extends('layouts.public')

@section('content')
<x-public.page-hero
    title="Layanan Publik"
    subtitle="Informasi layanan Kementerian Agama Kabupaten Kepulauan Sangihe untuk masyarakat."
/>

<section class="bg-slate-50 py-24">
    <div class="mx-auto max-w-7xl px-6">
        <x-public.section-heading
            eyebrow="Akses Layanan"
            title="Layanan yang Dekat dengan Masyarakat"
            description="Pilih informasi layanan yang dibutuhkan. Detail alur layanan dapat dikembangkan secara bertahap."
        />

        <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            <x-public.service-card icon="fa-solid fa-ring" title="Layanan Nikah" description="Informasi awal terkait layanan nikah dan konsultasi administrasi." delay="0" />
            <x-public.service-card icon="fa-solid fa-school" title="Pendidikan Keagamaan" description="Informasi layanan terkait lembaga dan pendidikan keagamaan." delay="100" />
            <x-public.service-card icon="fa-solid fa-database" title="Permohonan Data" description="Layanan permintaan informasi data keagamaan publik." delay="200" />
            <x-public.service-card icon="fa-solid fa-comments" title="Konsultasi Keagamaan" description="Informasi konsultasi dan pembinaan masyarakat." delay="300" />
            <x-public.service-card icon="fa-solid fa-bullhorn" title="Pengaduan Masyarakat" description="Kanal aspirasi dan laporan masyarakat." delay="400" />
            <x-public.service-card icon="fa-solid fa-handshake" title="Kerukunan Umat" description="Informasi kegiatan harmoni, FKUB, dan moderasi beragama." delay="500" />
        </div>
    </div>
</section>
@endsection