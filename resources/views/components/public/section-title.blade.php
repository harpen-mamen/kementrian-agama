@props([
    'eyebrow' => null,
    'title',
    'description' => null,
    'align' => 'center',
])

<div {{ $attributes->merge(['class' => $align === 'left' ? 'max-w-2xl' : 'mx-auto max-w-3xl text-center']) }}>
    @if ($eyebrow)
        <p class="text-sm font-semibold uppercase tracking-[0.2em] text-[#2f6b3f]">{{ $eyebrow }}</p>
    @endif
    <h2 class="mt-3 text-3xl font-bold tracking-tight text-slate-900 sm:text-4xl">{{ $title }}</h2>
    @if ($description)
        <p class="mt-4 text-base leading-7 text-slate-600">{{ $description }}</p>
    @endif
</div>
