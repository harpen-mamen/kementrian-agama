@props(['eyebrow' => null, 'title', 'subtitle' => null, 'align' => 'left'])

<div class="{{ $align === 'center' ? 'mx-auto max-w-3xl text-center' : 'max-w-3xl' }}">
    @if ($eyebrow)
        <div class="eyebrow">{{ $eyebrow }}</div>
    @endif
    <h2 class="section-title">{{ $title }}</h2>
    @if ($subtitle)
        <p class="section-subtitle">{{ $subtitle }}</p>
    @endif
</div>
