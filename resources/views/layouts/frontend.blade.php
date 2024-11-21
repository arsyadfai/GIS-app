<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEB-GIS-IKU-PROV-JATENG</title>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        #map {
            height: 500px;
            margin-top: 20px;
        }

        .navbar {
            display: flex;
            background-color: #333;
            justify-content: space-between;
            padding: 14px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar a {
            color: white;
            padding: 14px 20px;
            text-decoration: none;
            text-align: center;
        }

        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }

        body {
            padding-top: 60px;
            font-family: Arial, sans-serif;
        }

        .info {
            padding: 6px 8px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .legend {
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <div class="navbar">
        <div class="logo"><a href="#">GIS IKU PROV JATENG</a></div>
        <div class="menu">
            <a href="/">Home</a>
            <a href="dashboard">Dashboard</a>
            <a href="#">Daerah</a>
            <a href="tahun">Tahun</a>
        </div>
        <div class="login"><a href="{{ route('login') }}">Login</a></div>
    </div>

    <!-- Map container -->
    <div id="map"></div>

    <!-- Leaflet map initialization -->
    <script>
        const map = L.map('map').setView([-7.0247226, 110.3346619], 8);

        const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 40,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Simpan posisi awal dan zoom awal
        const initialView = map.getCenter();
        const initialZoom = map.getZoom();

        // Fungsi untuk mengatur ulang tampilan peta
        function resetMapView() {
            map.setView(initialView, initialZoom);
        }

        // Custom Info Control
        var info = L.control();

        info.onAdd = function (map) {
            this._div = L.DomUtil.create('div', 'info');
            this.update();
            return this._div;
        };

        info.update = function (props) {
            if (props) {
                this._div.innerHTML = `
                    <h4>Informasi Daerah</h4>
                    <table style="width: 100%; border-collapse: collapse;">
                        <tr><td colspan="2" style="text-align: center;"><b>${props.name}</b></td></tr>
                                                <tr><td><b>Kepadatan</b></td><td>: ${props.density || 'N/A'} orang / km<sup>2</sup></td></tr>
                        <tr><td><b>IPM</b></td><td>: ${props.ipm || 'N/A'}</td></tr>
                        <tr><td><b>Pertumbuhan Ekonomi</b></td><td>: ${props.pertumbuhan_ekonomi || 'N/A'}</td></tr>
                        <tr><td><b>Inflasi</b></td><td>: ${props.inflasi || 'N/A'}</td></tr>
                        <tr><td><b>Indeks Gizi</b></td><td>: ${props.indeks_gizi || 'N/A'}</td></tr>
                        <tr><td><b>PDRB</b></td><td>: ${props.pdrb || 'N/A'}</td></tr>
                        <tr><td><b>Tingkat Pengangguran Terbuka</b></td><td>: ${props.tingkat_pengangguran_terbuka || 'N/A'}</td></tr>
                        <tr><td><b>Nilai Tukar Petani</b></td><td>: ${props.nilai_tukar_petani || 'N/A'}</td></tr>
                        <tr><td><b>Kemiskinan</b></td><td>: ${props.angka_kemiskinan || 'N/A'}</td></tr>
                        <tr><td><b>Indeks Pembangunan Gender</b></td><td>: ${props.indeks_pembangunan_gender || 'N/A'}</td></tr>
                    </table>
                    <br />
                    <button id="btn-kembali">Kembali</button>
                `;

                // Menambahkan event listener untuk tombol "Kembali"
                const kembaliButton = document.getElementById('btn-kembali');
                if (kembaliButton) {
                    kembaliButton.addEventListener('click', resetMapView);
                }
            } else {
                this._div.innerHTML = 'Klik pada wilayah untuk melihat informasi';
            }
        };

        info.addTo(map);

        // Fungsi untuk memilih warna berdasarkan density
        function getColor(d) {
            return d > 1000 ? '#800026' :
                d > 500 ? '#BD0026' :
                    d > 200 ? '#E31A1C' :
                        d > 100 ? '#FC4E2A' :
                            d > 50 ? '#FD8D3C' :
                                d > 20 ? '#FEB24C' :
                                    d > 10 ? '#FED976' :
                                        '#FFEDA0';
        }

        // Fungsi untuk memberi style pada setiap wilayah
        function style(feature) {
            return {
                fillColor: getColor(feature.properties.density || 0),
                weight: 2,
                opacity: 1,
                color: 'white',
                dashArray: '3',
                fillOpacity: 0.7
            };
        }

        // Variabel untuk menyimpan wilayah yang di-highlight
        let highlightedLayer = null;

        // Tampilkan informasi saat wilayah diklik
        function displayFeatureInfo(e) {
            if (highlightedLayer) {
                geojson.resetStyle(highlightedLayer);
            }

            var layer = e.target;
            layer.setStyle({
                weight: 5,
                color: '#666',
                dashArray: '',
                fillOpacity: 0.7
            });

            const props = layer.feature.properties;
            info.update({
                name: props.WADMKK,
                density: props.LUASWH,
                ipm: props.ipm,
                pertumbuhan_ekonomi: props.pertumbuhan_ekonomi,
                inflasi: props.inflasi,
                indeks_gizi: props.indeks_gizi,
                pdrb: props.pdrb,
                tingkat_pengangguran_terbuka: props.tingkat_pengangguran_terbuka,
                nilai_tukar_petani: props.nilai_tukar_petani,
                angka_kemiskinan: props.angka_kemiskinan,
                indeks_pembangunan_gender: props.indeks_pembangunan_gender
            });
            highlightedLayer = layer;
            layer.bringToFront();
        }

        function onEachFeature(feature, layer) {
            layer.on({
                click: function (e) {
                    displayFeatureInfo(e);
                    zoomToFeature(e);
                }
            });
        }

        function zoomToFeature(e) {
            map.fitBounds(e.target.getBounds());
        }

        // Memuat data GeoJSON dan IKU dari database
                const wilayahData = @json($wilayah);
        const ikuData = @json($iku);

        wilayahData.forEach(item => {
            const json = JSON.parse(item.data);
            const matchedIku = ikuData.find(i => i.wilayah_id === item.id);
            if (matchedIku) {
                json.features.forEach(feature => {
                    feature.properties.ipm = matchedIku.ipm;
                    feature.properties.pertumbuhan_ekonomi = matchedIku.pertumbuhan_ekonomi;
                    feature.properties.inflasi = matchedIku.inflasi;
                    feature.properties.indeks_gizi = matchedIku.indeks_gizi;
                    feature.properties.pdrb = matchedIku.pdrb;
                    feature.properties.tingkat_pengangguran_terbuka = matchedIku.tingkat_pengangguran_terbuka;
                    feature.properties.nilai_tukar_petani = matchedIku.nilai_tukar_petani;
                    feature.properties.angka_kemiskinan = matchedIku.angka_kemiskinan;
                    feature.properties.indeks_pembangunan_gender = matchedIku.indeks_pembangunan_gender;
                });
            }
            L.geoJson(json, {
                style: style,
                onEachFeature: onEachFeature
            }).addTo(map);
        });

        // Tambahkan legenda
        var legend = L.control({ position: 'bottomright' });

        legend.onAdd = function (map) {
            var div = L.DomUtil.create('div', 'info legend'),
                grades = [0, 10, 20, 50, 100, 200, 500, 1000],
                labels = [];

            for (var i = 0; i < grades.length; i++) {
                div.innerHTML +=
                    '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                    grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
            }
            return div;
        };

        legend.addTo(map);

    </script>
</body>
</html>