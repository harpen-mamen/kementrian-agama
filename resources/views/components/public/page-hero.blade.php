@props(['title', 'subtitle' => null, 'eyebrow' => null, 'image' => null])

<section class="relative overflow-hidden bg-slate-950">
    @if ($image)
        <img src="{{ $image }}" alt="{{ $title }}" class="absolute inset-0 h-full w-full object-cover object-center opacity-35" onerror="this.style.display='none'">
    @endif
    <div class="absolute inset-0 bg-gradient-to-br from-[#0f5f7a] via-[#2f6b3f] to-slate-950"></div>
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_20%,rgba(214,166,58,0.18),transparent_32%)]"></div>
    <div class="container-public relative py-16 lg:py-20">
        @if ($eyebrow)
            <div class="eyebrow-light">{{ $eyebrow }}</div>
        @endif
        <h1 class="mt-5 max-w-4xl text-3xl font-extrabold leading-tight tracking-[-0.03em] text-white sm:text-4xl lg:text-5xl">{{ $title }}</h1>
        @if ($subtitle)
            <p class="mt-5 max-w-3xl text-base leading-8 text-white/75">{{ $subtitle }}</p>
        @endif
    </div>
</section>
