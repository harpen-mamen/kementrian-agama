@props([
    'eyebrow' => '',
    'title',
    'description' => '',
    'align' => 'center',
])

<div class="{{ $align === 'left' ? 'text-left' : 'mx-auto max-w-3xl text-center' }}" data-aos="fade-up">
    @if($eyebrow)
        <div class="mb-3 inline-flex rounded-full bg-[#2f6b3f]/10 px-4 py-2 text-sm font-semibold text-[#2f6b3f]">
            {{ $eyebrow }}
        </div>
    @endif

    <h2 class="text-3xl font-bold tracking-tight text-slate-900 md:text-4xl">
        {{ $title }}
    </h2>

    @if($description)
        <p class="mt-4 text-base leading-relaxed text-slate-600 md:text-lg">
            {{ $description }}
        </p>
    @endif
</div>