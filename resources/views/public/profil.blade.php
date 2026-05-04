<x-layouts.public title="Profil - Peta Harmoni Sangihe">
    <x-public.page-hero
        eyebrow="Profil Lembaga"
        title="Kementerian Agama Kabupaten Kepulauan Sangihe"
        subtitle="Menghadirkan pelayanan keagamaan yang profesional, teduh, dan inklusif bagi masyarakat kepulauan."
    />

    <section class="section-padding bg-white">
        <div class="container-public grid gap-10 lg:grid-cols-12">
            <div class="lg:col-span-5">
                <x-public.section-heading eyebrow="Tentang Kami" title="Pelayanan agama yang dekat dengan masyarakat." subtitle="Kementerian Agama Kabupaten Kepulauan Sangihe berperan dalam pembinaan kehidupan beragama, pendidikan keagamaan, pelayanan umat, dan penguatan kerukunan di wilayah kepulauan." />
            </div>
            <div class="grid gap-5 lg:col-span-7">
                @foreach (['Melayani kebutuhan informasi dan administrasi keagamaan secara tertib dan transparan.', 'Mendukung pendidikan keagamaan yang berkualitas dan berkarakter.', 'Memperkuat kerukunan umat beragama melalui dialog, pendataan, dan pelayanan yang adil.'] as $item)
                    <div class="card-premium-static flex gap-5 p-6">
                        <div class="icon-wrap shrink-0 bg-[#2f6b3f]/10 text-[#2f6b3f]"><i class="fa-solid fa-check"></i></div>
                        <p class="text-sm leading-7 text-slate-600">{{ $item }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-padding bg-slate-50">
        <div class="container-public">
            <x-public.section-heading align="center" eyebrow="Arah Pelayanan" title="Visi, Misi, Tugas dan Fungsi" subtitle="Kerangka pelayanan publik yang menjaga keseimbangan antara ketertiban data, kualitas layanan, dan harmoni sosial." />
            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                <div class="card-premium-static p-8">
                    <div class="icon-wrap bg-[#2f6b3f]/10 text-[#2f6b3f]"><i class="fa-solid fa-compass"></i></div>
                    <h3 class="mt-6 text-xl font-extrabold text-slate-900">Visi</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">Terwujudnya masyarakat Sangihe yang taat beragama, rukun, cerdas, dan sejahtera lahir batin.</p>
                </div>
                <div class="card-premium-static p-8">
                    <div class="icon-wrap bg-[#d6a63a]/15 text-[#9a7122]"><i class="fa-solid fa-list-check"></i></div>
                    <h3 class="mt-6 text-xl font-extrabold text-slate-900">Misi</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">Meningkatkan kualitas pelayanan keagamaan, memperkuat pendidikan keagamaan, dan mengembangkan tata kelola data yang akuntabel.</p>
                </div>
                <div class="card-premium-static p-8">
                    <div class="icon-wrap bg-[#0f5f7a]/10 text-[#0f5f7a]"><i class="fa-solid fa-building-columns"></i></div>
                    <h3 class="mt-6 text-xl font-extrabold text-slate-900">Tugas dan Fungsi</h3>
                    <p class="mt-4 text-sm leading-7 text-slate-600">Melaksanakan kebijakan teknis, pembinaan, pelayanan, bimbingan masyarakat, serta koordinasi lintas sektor di bidang agama.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding bg-white">
        <div class="container-public grid gap-8 lg:grid-cols-2">
            <div class="card-premium-static p-8">
                <h3 class="text-2xl font-extrabold text-slate-900">Nilai Pelayanan</h3>
                <div class="mt-7 grid gap-4 sm:grid-cols-2">
                    @foreach (['Integritas', 'Profesional', 'Responsif', 'Adil', 'Transparan', 'Humanis'] as $nilai)
                        <div class="rounded-2xl border border-slate-100 bg-slate-50 px-5 py-4 text-sm font-extrabold text-slate-700">{{ $nilai }}</div>
                    @endforeach
                </div>
            </div>
            <div class="card-premium-static p-8">
                <h3 class="text-2xl font-extrabold text-slate-900">Kerukunan dan Moderasi Beragama</h3>
                <p class="mt-5 text-sm leading-7 text-slate-600">Pelayanan publik diarahkan untuk menjaga ruang hidup bersama yang damai, menghargai keberagaman, dan memastikan setiap umat memperoleh akses informasi serta layanan yang setara.</p>
                <a href="{{ route('public.statistik') }}" class="btn-primary mt-7">Lihat Statistik</a>
            </div>
        </div>
    </section>
</x-layouts.public>
