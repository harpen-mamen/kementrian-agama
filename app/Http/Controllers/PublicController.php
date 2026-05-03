<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home()
    {
        $beritas = $this->getPublishedBeritas(3);
        $rumahIbadahs = $this->getPublishedRumahIbadahs(6);

        return view('public.home', compact('beritas', 'rumahIbadahs'));
    }

    public function profil()
    {
        return view('public.profil');
    }

    public function petaDigital()
    {
        $rumahIbadahs = $this->getPublishedRumahIbadahs(200);

        return view('public.peta-digital', compact('rumahIbadahs'));
    }

    public function statistik()
    {
        $stats = [
            'rumah_ibadah' => 0,
            'sekolah_keagamaan' => 0,
            'berita' => 0,
            'kecamatan' => 0,
        ];

        if (class_exists(\App\Models\RumahIbadah::class)) {
            $stats['rumah_ibadah'] = \App\Models\RumahIbadah::query()
                ->where('status_data', 'dipublikasikan')
                ->count();
        }

        if (class_exists(\App\Models\SekolahKeagamaan::class)) {
            $stats['sekolah_keagamaan'] = \App\Models\SekolahKeagamaan::query()
                ->where('status_data', 'dipublikasikan')
                ->count();
        }

        if (class_exists(\App\Models\Berita::class)) {
            $stats['berita'] = \App\Models\Berita::query()
                ->whereIn('status', ['published', 'dipublikasikan'])
                ->count();
        }

        if (class_exists(\App\Models\Kecamatan::class)) {
            $stats['kecamatan'] = \App\Models\Kecamatan::query()->count();
        }

        return view('public.statistik', compact('stats'));
    }

    public function rumahIbadah(Request $request)
    {
        $rumahIbadahs = collect();

        if (class_exists(\App\Models\RumahIbadah::class)) {
            $query = \App\Models\RumahIbadah::query()
                ->with(['agama', 'kecamatan'])
                ->where('status_data', 'dipublikasikan');

            if ($request->filled('q')) {
                $query->where('nama', 'like', '%' . $request->q . '%');
            }

            if ($request->filled('jenis')) {
                $query->where('jenis', $request->jenis);
            }

            $rumahIbadahs = $query->latest()->paginate(12)->withQueryString();
        }

        return view('public.rumah-ibadah.index', compact('rumahIbadahs'));
    }

    public function detailRumahIbadah($id)
    {
        abort_unless(class_exists(\App\Models\RumahIbadah::class), 404);

        $rumahIbadah = \App\Models\RumahIbadah::query()
            ->with(['agama', 'kecamatan'])
            ->where('status_data', 'dipublikasikan')
            ->findOrFail($id);

        return view('public.rumah-ibadah.show', compact('rumahIbadah'));
    }

    public function sekolahKeagamaan(Request $request)
    {
        $sekolahs = collect();

        if (class_exists(\App\Models\SekolahKeagamaan::class)) {
            $query = \App\Models\SekolahKeagamaan::query()
                ->with(['agama', 'kecamatan'])
                ->where('status_data', 'dipublikasikan');

            if ($request->filled('q')) {
                $query->where('nama', 'like', '%' . $request->q . '%');
            }

            $sekolahs = $query->latest()->paginate(12)->withQueryString();
        }

        return view('public.sekolah-keagamaan.index', compact('sekolahs'));
    }

    public function detailSekolahKeagamaan($id)
    {
        abort_unless(class_exists(\App\Models\SekolahKeagamaan::class), 404);

        $sekolah = \App\Models\SekolahKeagamaan::query()
            ->with(['agama', 'kecamatan'])
            ->where('status_data', 'dipublikasikan')
            ->findOrFail($id);

        return view('public.sekolah-keagamaan.show', compact('sekolah'));
    }

    public function berita()
    {
        $beritas = $this->getPublishedBeritas(12, true);

        return view('public.berita.index', compact('beritas'));
    }

    public function detailBerita($slug)
    {
        abort_unless(class_exists(\App\Models\Berita::class), 404);

        $berita = \App\Models\Berita::query()
            ->whereIn('status', ['published', 'dipublikasikan'])
            ->where('slug', $slug)
            ->firstOrFail();

        $beritaTerkait = \App\Models\Berita::query()
            ->whereIn('status', ['published', 'dipublikasikan'])
            ->where('id', '!=', $berita->id)
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('public.berita.show', compact('berita', 'beritaTerkait'));
    }

    public function layanan()
    {
        return view('public.layanan');
    }

    public function kontak()
    {
        return view('public.kontak');
    }

    private function getPublishedBeritas($limit = 3, $paginate = false)
    {
        if (! class_exists(\App\Models\Berita::class)) {
            return collect();
        }

        $query = \App\Models\Berita::query()
            ->whereIn('status', ['published', 'dipublikasikan'])
            ->latest('published_at');

        return $paginate ? $query->paginate($limit) : $query->limit($limit)->get();
    }

    private function getPublishedRumahIbadahs($limit = 6)
    {
        if (! class_exists(\App\Models\RumahIbadah::class)) {
            return collect();
        }

        return \App\Models\RumahIbadah::query()
            ->with(['agama', 'kecamatan'])
            ->where('status_data', 'dipublikasikan')
            ->latest()
            ->limit($limit)
            ->get();
    }
}