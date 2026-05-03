@props([
    'title',
    'subtitle' => '',
    'image' => asset('images/hero-sangihe.jpg'),
])

<section class="relative flex min-h-[430px] items-center overflow-hidden bg-slate-900 pt-28">
    <div class="absolute inset-0">
        <img src="{{ $image }}" alt="{{ $title }}" class="h-full w-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-950/85 via-slate-900/65 to-slate-900/30"></div>
    </div>

    <div class="relative z-10 mx-auto w-full max-w-7xl px-6 py-20">
        <div class="max-w-3xl" data-aos="fade-up">
            <div class="mb-5 inline-flex rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-medium text-white backdrop-blur">
                Peta Harmoni Sangihe
            </div>

            <h1 class="text-4xl font-bold leading-tight text-white md:text-6xl">
                {{ $title }}
            </h1>

            @if($subtitle)
                <p class="mt-6 max-w-2xl text-lg leading-relaxed text-white/80">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
    </div>
</section>