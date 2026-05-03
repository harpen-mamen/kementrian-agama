@props([
    'icon' => 'fa-solid fa-circle-info',
    'title',
    'description',
    'url' => '#',
    'delay' => 0,
])

<a
    href="{{ $url }}"
    class="group rounded-3xl bg-white p-7 shadow-sm ring-1 ring-slate-100 transition duration-500 hover:-translate-y-2 hover:shadow-2xl"
    data-aos="fade-up"
    data-aos-delay="{{ $delay }}"
>
    <div class="mb-6 flex h-14 w-14 items-center justify-center rounded-2xl bg-[#2f6b3f]/10 text-[#2f6b3f] transition group-hover:bg-[#2f6b3f] group-hover:text-white">
        <i class="{{ $icon }} text-xl"></i>
    </div>

    <h3 class="text-xl font-bold text-slate-900">
        {{ $title }}
    </h3>

    <p class="mt-3 text-sm leading-relaxed text-slate-600">
        {{ $description }}
    </p>

    <div class="mt-5 inline-flex items-center gap-2 text-sm font-bold text-[#2f6b3f]">
        Lihat Informasi
        <i class="fa-solid fa-arrow-right text-xs"></i>
    </div>
</a>