@props(['title' => 'Data belum tersedia', 'message' => 'Informasi akan tampil setelah data publik tersedia.'])

<div class="card-premium-static p-10 text-center">
    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-2xl bg-[#2f6b3f]/10 text-2xl text-[#2f6b3f]">
        <i class="fa-solid fa-inbox"></i>
    </div>
    <h3 class="mt-5 text-xl font-extrabold text-slate-900">{{ $title }}</h3>
    <p class="mx-auto mt-3 max-w-xl text-sm leading-7 text-slate-600">{{ $message }}</p>
</div>
