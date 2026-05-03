@props([
    'title' => 'Data belum tersedia',
    'description' => 'Data masih dalam proses pengisian dan verifikasi.',
])

<div class="rounded-3xl border border-dashed border-slate-300 bg-slate-50 p-10 text-center">
    <div class="mx-auto mb-5 flex h-16 w-16 items-center justify-center rounded-full bg-white text-[#2f6b3f] shadow-sm">
        <i class="fa-solid fa-database text-2xl"></i>
    </div>

    <h3 class="text-lg font-bold text-slate-900">{{ $title }}</h3>
    <p class="mx-auto mt-2 max-w-md text-sm leading-relaxed text-slate-600">{{ $description }}</p>
</div>