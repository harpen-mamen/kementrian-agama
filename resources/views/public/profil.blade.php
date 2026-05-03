@extends('layouts.public')

@section('content')
<x-public.page-hero
    title="Profil Kementerian Agama"
    subtitle="Mengenal Kementerian Agama Kabupaten Kepulauan Sangihe sebagai lembaga pelayanan, pembinaan, dan penguatan kerukunan umat beragama."
/>

<section class="bg-white py-24">
    <div class="mx-auto grid max-w-7xl gap-12 px-6 lg:grid-cols-2">
        <div data-aos="fade-right">
            <x-public.section-heading
                align="left"
                eyebrow="Tentang Kami"
                title="Melayani Umat, Merawat Kerukunan"
                description="Kementerian Agama Kabupaten Kepulauan Sangihe hadir untuk memberikan pelayanan keagamaan, pendidikan keagamaan, pembinaan masyarakat, serta penguatan harmoni kehidupan umat beragama."
            />

            <div class="mt-8 space-y-5 leading-relaxed text-slate-600">
                <p>
                    Portal ini menjadi ruang informasi publik yang menghubungkan masyarakat dengan layanan,
                    berita, data, dan informasi keagamaan yang dikelola secara bertahap dan terverifikasi.
                </p>
                <p>
                    Dengan semangat pelayanan yang ramah dan terbuka, kami mendukung kehidupan beragama
                    yang damai, tertib, harmonis, dan saling menghormati.
                </p>
            </div>
        </div>

        <div class="overflow-hidden rounded-[2rem] shadow-2xl" data-aos="fade-left">
            <img src="{{ asset('images/pimpinan-placeholder.jpg') }}" alt="Profil Kemenag Sangihe" class="h-[520px] w-full object-cover">
        </div>
    </div>
</section>

<section class="bg-slate-50 py-24">
    <div class="mx-auto max-w-7xl px-6">
        <x-public.section-heading
            eyebrow="Arah Pelayanan"
            title="Visi, Misi, dan Nilai Pelayanan"
            description="Menjadi lembaga yang memberikan pelayanan publik secara profesional, informatif, dan menguatkan kerukunan umat."
        />

        <div class="mt-12 grid gap-6 md:grid-cols-3">
            <div class="rounded-3xl bg-white p-8 shadow-sm" data-aos="fade-up">
                <i class="fa-solid fa-eye text-3xl text-[#2f6b3f]"></i>
                <h3 class="mt-5 text-xl font-bold">Visi</h3>
                <p class="mt-3 text-sm leading-relaxed text-slate-600">Terwujudnya masyarakat Sangihe yang taat beragama, rukun, cerdas, dan sejahtera.</p>
            </div>

            <div class="rounded-3xl bg-white p-8 shadow-sm" data-aos="fade-up" data-aos-delay="100">
                <i class="fa-solid fa-bullseye text-3xl text-[#0f5f7a]"></i>
                <h3 class="mt-5 text-xl font-bold">Misi</h3>
                <p class="mt-3 text-sm leading-relaxed text-slate-600">Meningkatkan kualitas pelayanan keagamaan, pendidikan keagamaan, dan pembinaan kerukunan umat.</p>
            </div>

            <div class="rounded-3xl bg-white p-8 shadow-sm" data-aos="fade-up" data-aos-delay="200">
                <i class="fa-solid fa-heart text-3xl text-[#d6a63a]"></i>
                <h3 class="mt-5 text-xl font-bold">Nilai</h3>
                <p class="mt-3 text-sm leading-relaxed text-slate-600">Ramah, adil, terbuka, profesional, dan menjaga harmoni dalam keberagaman.</p>
            </div>
        </div>
    </div>
</section>
@endsection