<x-layouts.public title="Peta Digital - Peta Harmoni Sangihe">
    <x-public.page-hero eyebrow="Peta Digital" title="Sebaran Rumah Ibadah" subtitle="Peta interaktif rumah ibadah publik di Kabupaten Kepulauan Sangihe dengan filter agama, jenis, dan kecamatan." />

    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
        <style>
            #map { min-height: 680px; }
            .leaflet-popup-content-wrapper { border-radius: 18px; }
        </style>
    @endpush

    <section class="section-padding bg-slate-50">
        <div class="container-public">
            <div class="card-premium-static mb-6 grid gap-4 p-5 md:grid-cols-4">
                <select id="filterAgama" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f]">
                    <option value="">Semua agama</option>
                    @foreach ($agamas as $agama)
                        <option value="{{ $agama->nama }}">{{ $agama->nama }}</option>
                    @endforeach
                </select>
                <select id="filterJenis" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f]">
                    <option value="">Semua jenis</option>
                    @foreach ($jenisRumahIbadah as $jenis)
                        <option value="{{ $jenis }}">{{ $jenis }}</option>
                    @endforeach
                </select>
                <select id="filterKecamatan" class="rounded-2xl border-slate-200 text-sm focus:border-[#2f6b3f] focus:ring-[#2f6b3f]">
                    <option value="">Semua kecamatan</option>
                    @foreach ($kecamatans as $kecamatan)
                        <option value="{{ $kecamatan->nama }}">{{ $kecamatan->nama }}</option>
                    @endforeach
                </select>
                <button id="resetMapFilter" type="button" class="btn-outline">Reset Filter</button>
            </div>

            <div class="grid gap-6 lg:grid-cols-12">
                <div class="lg:col-span-9">
                    <div class="card-premium-static overflow-hidden p-3">
                        <div id="map" class="h-[680px] rounded-[1.5rem] bg-slate-200"></div>
                    </div>
                </div>
                <aside class="lg:col-span-3">
                    <div class="card-premium-static p-6">
                        <h3 class="text-lg font-extrabold text-slate-900">Legenda</h3>
                        <div class="mt-5 grid gap-4 text-sm text-slate-600">
                            <div class="flex items-center gap-3"><span class="h-4 w-4 rounded-full bg-[#2f6b3f]"></span>Marker rumah ibadah</div>
                            <div class="flex items-center gap-3"><span class="h-4 w-4 rounded border-2 border-[#2f6b3f] bg-[#2f6b3f]/10"></span>Batas wilayah GeoJSON</div>
                            <p class="leading-7">Jika file <span class="font-bold text-slate-900">public/geojson/batas-sangihe.geojson</span> tersedia, batas wilayah akan tampil otomatis.</p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>

    @push('scripts')
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <script>
            const worshipPlaces = @json($mapRumahIbadahs);
            const defaultCenter = [3.600, 125.500];
            const map = L.map('map', { scrollWheelZoom: true }).setView(defaultCenter, 10);

            const osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            const satellite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 19,
                attribution: 'Tiles &copy; Esri'
            });

            const markerLayer = L.layerGroup().addTo(map);
            const boundaryLayer = L.layerGroup().addTo(map);

            L.control.layers({ 'Peta Standar': osm, 'Satelit': satellite }, { 'Rumah Ibadah': markerLayer, 'Batas Wilayah': boundaryLayer }).addTo(map);

            function popupContent(place) {
                return `
                    <div style="min-width:210px">
                        <strong>${place.nama || 'Rumah Ibadah'}</strong>
                        <div style="margin-top:8px;color:#475569;font-size:13px;line-height:1.6">
                            ${place.jenis || '-'}<br>
                            ${place.agama || '-'}<br>
                            ${place.kecamatan || '-'}
                        </div>
                        <a href="${place.detail_url}" style="display:inline-block;margin-top:10px;color:#2f6b3f;font-weight:800">Lihat detail</a>
                    </div>
                `;
            }

            function renderMarkers() {
                markerLayer.clearLayers();
                const agama = document.getElementById('filterAgama').value;
                const jenis = document.getElementById('filterJenis').value;
                const kecamatan = document.getElementById('filterKecamatan').value;

                const filtered = worshipPlaces.filter((place) => {
                    return (!agama || place.agama === agama)
                        && (!jenis || place.jenis === jenis)
                        && (!kecamatan || place.kecamatan === kecamatan)
                        && Number.isFinite(Number(place.latitude))
                        && Number.isFinite(Number(place.longitude));
                });

                filtered.forEach((place) => {
                    L.marker([Number(place.latitude), Number(place.longitude)]).bindPopup(popupContent(place)).addTo(markerLayer);
                });

                if (filtered.length) {
                    const bounds = L.latLngBounds(filtered.map((place) => [Number(place.latitude), Number(place.longitude)]));
                    map.fitBounds(bounds.pad(0.2), { maxZoom: 13 });
                } else {
                    map.setView(defaultCenter, 10);
                }
            }

            ['filterAgama', 'filterJenis', 'filterKecamatan'].forEach((id) => {
                document.getElementById(id).addEventListener('change', renderMarkers);
            });

            document.getElementById('resetMapFilter').addEventListener('click', () => {
                ['filterAgama', 'filterJenis', 'filterKecamatan'].forEach((id) => document.getElementById(id).value = '');
                renderMarkers();
            });

            fetch('/geojson/batas-sangihe.geojson')
                .then((response) => {
                    if (!response.ok) throw new Error('GeoJSON batas wilayah belum tersedia');
                    return response.json();
                })
                .then((geojson) => {
                    L.geoJSON(geojson, {
                        style: { color: '#2f6b3f', weight: 2, fillColor: '#2f6b3f', fillOpacity: 0.08 },
                        onEachFeature: (feature, layer) => {
                            const props = feature.properties || {};
                            const name = props.nama || props.NAMOBJ || props.WADMKC || props.name || 'Batas Wilayah';
                            layer.bindPopup(name);
                        }
                    }).addTo(boundaryLayer);
                })
                .catch(() => console.warn('GeoJSON batas wilayah belum tersedia'));

            renderMarkers();
            setTimeout(() => map.invalidateSize(), 250);
        </script>
    @endpush
</x-layouts.public>
