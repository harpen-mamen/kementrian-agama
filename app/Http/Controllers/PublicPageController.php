<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as EmptyPaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Throwable;

class PublicPageController extends Controller
{
    public function profil()
    {
        return view('public.profil');
    }

    public function rumahIbadah(Request $request)
    {
        $agamas = $this->options(\App\Models\Agama::class, 'agamas');
        $kecamatans = $this->options(\App\Models\Kecamatan::class, 'kecamatans');
        $jenisRumahIbadah = $this->distinctOptions(\App\Models\RumahIbadah::class, 'rumah_ibadah', 'jenis');
        $rumahIbadahs = $this->emptyPaginator();

        if (class_exists(\App\Models\RumahIbadah::class) && $this->hasTable('rumah_ibadah')) {
            $query = \App\Models\RumahIbadah::query()
                ->with($this->availableRelations(\App\Models\RumahIbadah::class, ['agama', 'kecamatan', 'fotoRumahIbadah']));

            $this->onlyPublicRows($query, 'rumah_ibadah', 'status_data');
            $this->applySearch($query, 'rumah_ibadah', $request->string('search')->toString());
            $this->applyFilter($query, 'rumah_ibadah', 'agama_id', $request->input('agama'));
            $this->applyFilter($query, 'rumah_ibadah', 'kecamatan_id', $request->input('kecamatan'));
            $this->applyFilter($query, 'rumah_ibadah', 'jenis', $request->input('jenis'));

            $rumahIbadahs = $query->latest('id')->paginate(12)->withQueryString();
        }

        return view('public.rumah-ibadah.index', compact('rumahIbadahs', 'agamas', 'kecamatans', 'jenisRumahIbadah'));
    }

    public function detailRumahIbadah($id)
    {
        abort_unless(class_exists(\App\Models\RumahIbadah::class) && $this->hasTable('rumah_ibadah'), 404);

        $query = \App\Models\RumahIbadah::query()
            ->with($this->availableRelations(\App\Models\RumahIbadah::class, ['agama', 'kecamatan', 'desa', 'fotoRumahIbadah']));

        $this->onlyPublicRows($query, 'rumah_ibadah', 'status_data');

        return view('public.rumah-ibadah.show', ['rumahIbadah' => $query->findOrFail($id)]);
    }

    public function sekolahKeagamaan(Request $request)
    {
        $agamas = $this->options(\App\Models\Agama::class, 'agamas');
        $kecamatans = $this->options(\App\Models\Kecamatan::class, 'kecamatans');
        $sekolahs = $this->emptyPaginator();

        if (class_exists(\App\Models\SekolahKeagamaan::class) && $this->hasTable('sekolah_keagamaan')) {
            $query = \App\Models\SekolahKeagamaan::query()
                ->with($this->availableRelations(\App\Models\SekolahKeagamaan::class, ['agama', 'kecamatan', 'desa']));

            $this->onlyPublicRows($query, 'sekolah_keagamaan', 'status_data');
            $this->applySearch($query, 'sekolah_keagamaan', $request->string('search')->toString());
            $this->applyFilter($query, 'sekolah_keagamaan', 'agama_id', $request->input('agama'));
            $this->applyFilter($query, 'sekolah_keagamaan', 'kecamatan_id', $request->input('kecamatan'));

            $sekolahs = $query->latest('id')->paginate(12)->withQueryString();
        }

        return view('public.sekolah-keagamaan.index', compact('sekolahs', 'agamas', 'kecamatans'));
    }

    public function detailSekolahKeagamaan($id)
    {
        abort_unless(class_exists(\App\Models\SekolahKeagamaan::class) && $this->hasTable('sekolah_keagamaan'), 404);

        $query = \App\Models\SekolahKeagamaan::query()
            ->with($this->availableRelations(\App\Models\SekolahKeagamaan::class, ['agama', 'kecamatan', 'desa']));

        $this->onlyPublicRows($query, 'sekolah_keagamaan', 'status_data');

        return view('public.sekolah-keagamaan.show', ['sekolah' => $query->findOrFail($id)]);
    }

    public function berita(Request $request)
    {
        $kategoris = $this->options(\App\Models\KategoriBerita::class, 'kategori_berita');
        $beritas = $this->emptyPaginator();
        $featuredBerita = null;

        if (class_exists(\App\Models\Berita::class) && $this->hasTable('berita')) {
            $query = \App\Models\Berita::query()
                ->with($this->availableRelations(\App\Models\Berita::class, ['kategoriBerita']));

            $this->onlyPublishedNews($query);
            $this->applySearch($query, 'berita', $request->string('search')->toString(), 'judul');
            $this->applyFilter($query, 'berita', 'kategori_berita_id', $request->input('kategori'));

            $featuredBerita = (clone $query)->latest('published_at')->latest('id')->first();
            $beritas = $query->latest('published_at')->latest('id')->paginate(9)->withQueryString();
        }

        return view('public.berita.index', compact('beritas', 'featuredBerita', 'kategoris'));
    }

    public function detailBerita(string $slug)
    {
        abort_unless(class_exists(\App\Models\Berita::class) && $this->hasTable('berita'), 404);

        $query = \App\Models\Berita::query()
            ->with($this->availableRelations(\App\Models\Berita::class, ['kategoriBerita']));

        $this->onlyPublishedNews($query);

        $berita = $query->where('slug', $slug)->firstOrFail();
        $relatedQuery = \App\Models\Berita::query()
            ->with($this->availableRelations(\App\Models\Berita::class, ['kategoriBerita']))
            ->whereKeyNot($berita->getKey())
            ->when($this->hasColumn('berita', 'kategori_berita_id') && $berita->kategori_berita_id, fn ($q) => $q->where('kategori_berita_id', $berita->kategori_berita_id));

        $this->onlyPublishedNews($relatedQuery);

        $related = $relatedQuery->latest('published_at')->limit(3)->get();

        return view('public.berita.show', compact('berita', 'related'));
    }

    public function petaDigital()
    {
        $agamas = $this->options(\App\Models\Agama::class, 'agamas');
        $kecamatans = $this->options(\App\Models\Kecamatan::class, 'kecamatans');
        $jenisRumahIbadah = $this->distinctOptions(\App\Models\RumahIbadah::class, 'rumah_ibadah', 'jenis');
        $mapRumahIbadahs = collect();

        if (class_exists(\App\Models\RumahIbadah::class) && $this->hasTable('rumah_ibadah')) {
            $query = \App\Models\RumahIbadah::query()
                ->with($this->availableRelations(\App\Models\RumahIbadah::class, ['agama', 'kecamatan']))
                ->whereNotNull('latitude')
                ->whereNotNull('longitude');

            $this->onlyPublicRows($query, 'rumah_ibadah', 'status_data');

            $mapRumahIbadahs = $query->get()->map(fn ($item) => [
                'id' => $item->id,
                'nama' => $item->nama,
                'jenis' => $item->jenis,
                'agama' => data_get($item, 'agama.nama'),
                'kecamatan' => data_get($item, 'kecamatan.nama'),
                'latitude' => (float) $item->latitude,
                'longitude' => (float) $item->longitude,
                'detail_url' => route('public.rumah-ibadah.show', $item),
            ])->values();
        }

        return view('public.peta-digital', compact('mapRumahIbadahs', 'agamas', 'kecamatans', 'jenisRumahIbadah'));
    }

    public function statistik()
    {
        $stats = [
            'totalRumahIbadah' => $this->countRows(\App\Models\RumahIbadah::class, 'rumah_ibadah', 'status_data'),
            'totalAgama' => $this->countRows(\App\Models\Agama::class, 'agamas'),
            'totalSekolah' => $this->countRows(\App\Models\SekolahKeagamaan::class, 'sekolah_keagamaan', 'status_data'),
            'totalKecamatan' => $this->countRows(\App\Models\Kecamatan::class, 'kecamatans'),
            'totalBerita' => $this->countPublishedNews(),
        ];

        $charts = [
            'rumahIbadahPerAgama' => $this->groupByRelationName(\App\Models\RumahIbadah::class, 'rumah_ibadah', \App\Models\Agama::class, 'agamas', 'agama_id', 'status_data'),
            'rumahIbadahPerKecamatan' => $this->groupByRelationName(\App\Models\RumahIbadah::class, 'rumah_ibadah', \App\Models\Kecamatan::class, 'kecamatans', 'kecamatan_id', 'status_data'),
            'sekolahPerAgama' => $this->groupByRelationName(\App\Models\SekolahKeagamaan::class, 'sekolah_keagamaan', \App\Models\Agama::class, 'agamas', 'agama_id', 'status_data'),
        ];

        return view('public.statistik', compact('stats', 'charts'));
    }

    public function layanan()
    {
        return view('public.layanan');
    }

    public function kontak()
    {
        return view('public.kontak');
    }

    private function options(string $modelClass, string $table): Collection
    {
        if (! class_exists($modelClass) || ! $this->hasTable($table)) {
            return collect();
        }

        return $modelClass::query()->orderBy('nama')->get(['id', 'nama']);
    }

    private function distinctOptions(string $modelClass, string $table, string $column): Collection
    {
        if (! class_exists($modelClass) || ! $this->hasTable($table) || ! $this->hasColumn($table, $column)) {
            return collect();
        }

        return $modelClass::query()->whereNotNull($column)->distinct()->orderBy($column)->pluck($column)->filter()->values();
    }

    private function availableRelations(string $modelClass, array $relations): array
    {
        if (! class_exists($modelClass)) {
            return [];
        }

        $model = new $modelClass;

        return collect($relations)->filter(fn ($relation) => method_exists($model, $relation))->values()->all();
    }

    private function onlyPublicRows(Builder $query, string $table, string $statusColumn = 'status_data'): void
    {
        $hasStatus = $this->hasColumn($table, $statusColumn);
        $hasPublishedAt = $this->hasColumn($table, 'published_at');

        if (! $hasStatus && ! $hasPublishedAt) {
            return;
        }

        $query->where(function (Builder $inner) use ($table, $statusColumn, $hasStatus, $hasPublishedAt) {
            if ($hasStatus) {
                $inner->whereIn($statusColumn, ['published', 'dipublikasikan', 'publik', 'terverifikasi', 'verified']);
            }

            if ($hasPublishedAt) {
                $method = $hasStatus ? 'orWhereNotNull' : 'whereNotNull';
                $inner->{$method}('published_at');
            }
        });
    }

    private function onlyPublishedNews(Builder $query): void
    {
        $query->where(function (Builder $inner) {
            if ($this->hasColumn('berita', 'status')) {
                $inner->whereIn('status', ['published', 'dipublikasikan', 'publik']);
            }

            if ($this->hasColumn('berita', 'published_at')) {
                $method = $this->hasColumn('berita', 'status') ? 'orWhereNotNull' : 'whereNotNull';
                $inner->{$method}('published_at');
            }
        });
    }

    private function applySearch(Builder $query, string $table, ?string $search, string $column = 'nama'): void
    {
        if ($search && $this->hasColumn($table, $column)) {
            $query->where($column, 'like', "%{$search}%");
        }
    }

    private function applyFilter(Builder $query, string $table, string $column, mixed $value): void
    {
        if (filled($value) && $this->hasColumn($table, $column)) {
            $query->where($column, $value);
        }
    }

    private function countRows(string $modelClass, string $table, ?string $statusColumn = null): int
    {
        if (! class_exists($modelClass) || ! $this->hasTable($table)) {
            return 0;
        }

        $query = $modelClass::query();

        if ($statusColumn) {
            $this->onlyPublicRows($query, $table, $statusColumn);
        }

        return $query->count();
    }

    private function countPublishedNews(): int
    {
        if (! class_exists(\App\Models\Berita::class) || ! $this->hasTable('berita')) {
            return 0;
        }

        $query = \App\Models\Berita::query();
        $this->onlyPublishedNews($query);

        return $query->count();
    }

    private function groupByRelationName(string $modelClass, string $table, string $labelModel, string $labelTable, string $foreignKey, ?string $statusColumn = null): array
    {
        if (! class_exists($modelClass) || ! class_exists($labelModel) || ! $this->hasTable($table) || ! $this->hasTable($labelTable) || ! $this->hasColumn($table, $foreignKey)) {
            return ['labels' => [], 'values' => []];
        }

        $query = $modelClass::query()->selectRaw("{$foreignKey}, COUNT(*) as total")->groupBy($foreignKey);

        if ($statusColumn) {
            $this->onlyPublicRows($query, $table, $statusColumn);
        }

        $counts = $query->pluck('total', $foreignKey);
        $labels = $labelModel::query()->whereIn('id', $counts->keys())->pluck('nama', 'id');

        return [
            'labels' => $labels->values()->all(),
            'values' => $labels->keys()->map(fn ($id) => (int) $counts->get($id, 0))->all(),
        ];
    }

    private function emptyPaginator(): LengthAwarePaginator
    {
        return new EmptyPaginator([], 0, 12);
    }

    private function databaseReady(): bool
    {
        static $ready = null;

        if ($ready !== null) {
            return $ready;
        }

        try {
            DB::connection()->getPdo();

            return $ready = true;
        } catch (Throwable) {
            return $ready = false;
        }
    }

    private function hasTable(string $table): bool
    {
        try {
            return $this->databaseReady() && Schema::hasTable($table);
        } catch (Throwable) {
            return false;
        }
    }

    private function hasColumn(string $table, string $column): bool
    {
        try {
            return $this->databaseReady() && Schema::hasColumn($table, $column);
        } catch (Throwable) {
            return false;
        }
    }

    public static function publicImage(?string $path, string $fallback): string
    {
        $fallbackPath = public_path($fallback);
        $fallbackUrl = asset(file_exists($fallbackPath) ? $fallback : 'images/hero-sangihe.jpg');

        if (! $path) {
            return $fallbackUrl;
        }

        $cleanPath = Str::of($path)->replace('\\', '/')->ltrim('/')->toString();

        if (Str::startsWith($cleanPath, ['http://', 'https://'])) {
            return $cleanPath;
        }

        if (file_exists(public_path($cleanPath))) {
            return asset($cleanPath);
        }

        if (file_exists(storage_path('app/public/'.$cleanPath))) {
            return asset('storage/'.$cleanPath);
        }

        return $fallbackUrl;
    }

    public static function worshipImage(Model $item): string
    {
        $path = data_get($item, 'fotoRumahIbadah.0.file_path')
            ?? data_get($item, 'fotoRumahIbadah.*.file_path.0')
            ?? data_get($item, 'foto')
            ?? data_get($item, 'gambar');

        return self::publicImage($path, 'images/placeholder-rumah-ibadah.jpg');
    }
}
