# Peta Digital

Halaman `/peta-digital` akan membaca batas wilayah dari:

```text
public/geojson/batas-sangihe.geojson
```

Cara menyiapkan file batas wilayah:

1. Download SHP batas wilayah Kabupaten Kepulauan Sangihe dari sumber resmi seperti BIG, BPS, GADM, atau Ina-Geoportal jika tersedia.
2. Convert SHP ke GeoJSON menggunakan GDAL:

```bash
ogr2ogr -f GeoJSON public/geojson/batas-sangihe.geojson batas_sangihe.shp
```

3. Pastikan CRS file GeoJSON adalah WGS84 EPSG:4326.
4. Refresh halaman `/peta-digital`.

Alternatif jika GDAL atau `ogr2ogr` belum tersedia:

1. Buka file SHP di QGIS.
2. Klik kanan layer batas wilayah, pilih Export, lalu Save Features As.
3. Pilih format GeoJSON.
4. Pilih CRS EPSG:4326.
5. Simpan sebagai `public/geojson/batas-sangihe.geojson`.
