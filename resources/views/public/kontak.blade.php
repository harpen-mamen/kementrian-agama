@extends('layouts.public')

@section('content')
<x-public.page-hero
    title="Kontak Kami"
    subtitle="Hubungi Kementerian Agama Kabupaten Kepulauan Sangihe untuk informasi dan layanan publik."
/>

<section class="bg-slate-50 py-24">
    <div class="mx-auto grid max-w-7xl gap-10 px-6 lg:grid-cols-2">
        <div class="rounded-[2rem] bg-white p-8 shadow-sm" data-aos="fade-right">
            <h2 class="text-3xl font-bold text-slate-900">Informasi Kontak</h2>
            <p class="mt-4 leading-relaxed text-slate-600">
                Silakan hubungi kantor Kementerian Agama Kabupaten Kepulauan Sangihe melalui informasi berikut.
            </p>

            <div class="mt-8 space-y-5">
                <div class="flex gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#2f6b3f]/10 text-[#2f6b3f]">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Alamat</h3>
                        <p class="mt-1 text-sm text-slate-600">Kabupaten Kepulauan Sangihe, Sulawesi Utara</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#2f6b3f]/10 text-[#2f6b3f]">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Email</h3>
                        <p class="mt-1 text-sm text-slate-600">info@kemenagsangihe.go.id</p>
                    </div>
                </div>

                <div class="flex gap-4">
                    <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-[#2f6b3f]/10 text-[#2f6b3f]">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Jam Layanan</h3>
                        <p class="mt-1 text-sm text-slate-600">Senin - Jumat, jam kerja kantor</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="rounded-[2rem] bg-white p-8 shadow-sm" data-aos="fade-left">
            <h2 class="text-3xl font-bold text-slate-900">Kirim Pesan</h2>
            <p class="mt-4 text-sm text-slate-600">Form ini masih tampilan awal. Fungsi pengiriman dapat ditambahkan kemudian.</p>

            <form class="mt-8 space-y-4">
                <input type="text" placeholder="Nama lengkap" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#2f6b3f]">
                <input type="email" placeholder="Email / kontak" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#2f6b3f]">
                <textarea rows="5" placeholder="Pesan Anda" class="w-full rounded-2xl border border-slate-200 px-4 py-3 text-sm outline-none focus:border-[#2f6b3f]"></textarea>
                <button type="button" class="rounded-full bg-[#2f6b3f] px-7 py-4 text-sm font-bold text-white">
                    Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</section>
@endsection