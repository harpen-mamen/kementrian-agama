<x-layouts.public title="Kontak - Peta Harmoni Sangihe">
    <x-public.page-hero eyebrow="Kontak" title="Hubungi Kami" subtitle="Informasi kontak dan tampilan form pesan untuk Kementerian Agama Kabupaten Kepulauan Sangihe." />

    <section class="section-padding bg-slate-50">
        <div class="container-public grid gap-8 lg:grid-cols-12">
            <div class="lg:col-span-5">
                <div class="card-premium-static p-8">
                    <h2 class="text-2xl font-extrabold text-slate-900">Informasi Kantor</h2>
                    <div class="mt-7 grid gap-5 text-sm leading-7 text-slate-600">
                        <p><strong class="text-slate-900">Alamat:</strong><br>Kompleks Perkantoran Tahuna, Kabupaten Kepulauan Sangihe, Sulawesi Utara</p>
                        <p><strong class="text-slate-900">Email:</strong><br>kemenag.sangihe@example.go.id</p>
                        <p><strong class="text-slate-900">Telepon:</strong><br>(0432) 000000</p>
                        <p><strong class="text-slate-900">Jam Layanan:</strong><br>Senin - Jumat, 08.00 - 16.00 WITA</p>
                    </div>
                    <div class="mt-8 overflow-hidden rounded-[1.5rem] bg-slate-200">
                        <iframe class="h-72 w-full" loading="lazy" src="https://www.openstreetmap.org/export/embed.html?bbox=125.48%2C3.58%2C125.52%2C3.62&layer=mapnik"></iframe>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-7">
                <form class="card-premium-static grid gap-5 p-8">
                    <div class="grid gap-5 md:grid-cols-2">
                        <input type="text" placeholder="Nama" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f]">
                        <input type="email" placeholder="Email" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f]">
                    </div>
                    <input type="text" placeholder="Subjek" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f]">
                    <textarea rows="7" placeholder="Pesan" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f]"></textarea>
                    <button type="button" class="btn-primary justify-self-start">Kirim Pesan</button>
                    <p class="text-xs leading-6 text-slate-500">Form ini masih berupa tampilan. Integrasi pengiriman pesan dapat ditambahkan pada tahap berikutnya.</p>
                </form>
            </div>
        </div>
    </section>
</x-layouts.public>
