@extends('layout.template')

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">

    <!-- Leaflet Search CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-search/dist/leaflet-search.min.css" />

    <!-- Leaflet Search JS -->
    <script src="https://unpkg.com/leaflet-control-search/dist/leaflet-search.min.js"></script>

    <style>
        #map {
            width: 100%;
            height: calc(100vh - 56px);
        }
    </style>

    <style>
        .rating-stars {
            direction: rtl;
            font-size: 1.5rem;
            display: inline-flex;
        }

        .rating-stars input {
            display: none;
        }

        .rating-stars label {
            color: #ddd;
            cursor: pointer;
        }

        .rating-stars input:checked~label,
        .rating-stars label:hover,
        .rating-stars label:hover~label {
            color: gold;
        }
    </style>
@endsection


@section('content')
    <div id="map"></div>

    <!-- SEARCH BOX UNTUK POINT DENGAN IKON -->
    <div class="position-absolute" style="top: 250px; left: 10px; z-index: 1000; width: 260px;">
        <div class="input-group shadow-sm rounded-3">
            <span class="input-group-text bg-white border-end-0">
                <i class="fas fa-search text-muted"></i>
            </span>
            <input id="searchPoint" type="text" class="form-control border-start-0" placeholder="Cari RSUD..." />
        </div>
        <ul id="searchResults" class="list-group mt-1" style="display: none; max-height: 180px; overflow-y: auto;"></ul>
    </div>



    <!-- Modal Create Point-->
    <div class="modal fade" id="createpointModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Point</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('points.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="fill point name" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_point" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_point" name="geom_point" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class= "form-control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="preview-image-point" class="img-thumbnail"
                                width="400">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>



            </div>
        </div>
    </div>

    <!-- Modal Create Polyline-->
    <div class="modal fade" id="createpolylineModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polyline</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('polylines.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="fill polyline name">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_polyline" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polyline" name="geom_polyline" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class= "form-control" id="image_polyline" name="image"
                                onchange="document.getElementById('preview-image-polyline').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="preview-image-polyline" class="img-thumbnail"
                                width="400">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Create Polygon-->
    <div class="modal fade" id="createpolygonModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Polygon</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('polygons.store') }}" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="fill point name">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="geom_polygon" class="form-label">Geometry</label>
                            <textarea class="form-control" id="geom_polygon" name="geom_polygon" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Photo</label>
                            <input type="file" class= "form-control" id="image_polygon" name="image"
                                onchange="document.getElementById('preview-image-polygon').src = window.URL.createObjectURL(this.files[0])">
                            <img src="" alt="" id="preview-image-polygon" class="img-thumbnail"
                                width="400">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://unpkg.com/@terraformer/wkt"></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.0.0/dist/geosearch.css" />


    <script>
        var map = L.map('map', {
            center: [-7.267098, 112.737742],
            zoom: 12
        });


        // Tambahkan basemap
        var osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        var esriWorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/' +
            'World_Imagery/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles © Esri'
            });

        var esriTopographic = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/' +
            'World_Topo_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles © Esri'
            });

        // Layer WMS: batas desa
        var batasDesaLayer = L.tileLayer.wms("http://localhost:8080/geoserver/poligon_sby/wms", {
            layers: 'poligon_sby:ADMINISTRASIDESA_AR_25K',
            styles: '',
            format: 'image/png',
            transparent: true,
            attribution: '© Admin Desa Surabaya',
            opacity: 0.5
        }).addTo(map);

        // Base dan overlay maps
        var baseMaps = {
            "OpenStreetMap": osm,
            "Esri Imagery": esriWorldImagery,
            "Esri Topographic": esriTopographic
        };

        var overlayMaps = {
            "Batas Desa Surabaya": batasDesaLayer
        };

        // Tampilkan kontrol layer
        L.control.layers(baseMaps, overlayMaps, {
            collapsed: false, // kalau ingin layer control selalu terbuka
            position: 'bottomright' // default, bisa diubah ke 'topleft', 'bottomleft', dll.
        }).addTo(map);


        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: true,
                polygon: true,
                rectangle: false,
                circle: false,
                marker: true,
                circlemarker: false
            },
            edit: false
        });

        map.addControl(drawControl);

        map.on('draw:created', function(e) {
            var type = e.layerType,
                layer = e.layer;

            console.log(type);

            var drawnJSONObject = layer.toGeoJSON();
            var objectGeometry = Terraformer.geojsonToWKT(drawnJSONObject.geometry);

            // data yang dihasilkan strukturnya berupa GeoJSOn
            console.log(drawnJSONObject);
            // console.log(objectGeometry);

            // berupa permisalan : jika,
            if (type === 'polyline') {
                console.log("Create " + type);

                $('#geom_polyline').val(objectGeometry)

                //Memunculkan modal untuk create polyline
                $('#createpolylineModal').modal('show');


            } else if (type === 'polygon' || type === 'rectangle') {
                console.log("Create " + type);

                $('#geom_polygon').val(objectGeometry)

                //Memunculkan modal untuk create polygon
                $('#createpolygonModal').modal('show');

            } else if (type === 'marker') {
                console.log("Create " + type);

                $('#geom_point').val(objectGeometry)

                //Memunculkan modal untuk create marker
                $('#createpointModal').modal('show');

            } else {
                console.log('undefined');
            }

            drawnItems.addLayer(layer);
        });



        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                var popupContent = "Kabupaten/Kota: " + feature.properties.kab_kota + "<br>" +
                    "Provinsi: " + feature.properties.provinsi;
                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.kab_kota);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });


        // GeoJSON Points
        var pointLayers = [];

        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {
                // Popup sama seperti sebelumnya
                var routedelete = "{{ route('points.destroy', ':id') }}".replace(':id', feature.properties.id);
                var routeedit = "{{ route('points.edit', ':id') }}".replace(':id', feature.properties.id);
                var currentRating = feature.properties.rating || 0;

                var stars = "<div class='rating' data-id='" + feature.properties.id + "'>";
                for (var i = 1; i <= 5; i++) {
                    if (i <= Math.floor(currentRating)) {
                        stars += "<i class='fa fa-star' data-value='" + i +
                            "' style='color:gold; cursor:pointer;'></i>";
                    } else if (i - currentRating < 1) {
                        stars += "<i class='fa fa-star-half-stroke' data-value='" + i +
                            "' style='color:gold; cursor:pointer;'></i>";
                    } else {
                        stars += "<i class='fa fa-star' data-value='" + i +
                            "' style='color:#ccc; cursor:pointer;'></i>";
                    }
                }
                stars += "</div>";

                var popupContent = `
            <div style='background-color:#f9f9f9;padding:12px;border-radius:10px;width:280px;box-shadow:0 2px 6px rgba(0,0,0,0.15);'>
                <strong>Nama:</strong> ${feature.properties.name}<br>
                <strong>Alamat:</strong> ${feature.properties.address}<br><br>
                <img src='{{ asset('storage/images/') }}/${feature.properties.image}' style='width:100%;border-radius:6px;margin-bottom:8px;' alt=''>
                <strong>Deskripsi:</strong>
                <p style='text-align:justify;font-size:13px;'>${feature.properties.description}</p>
                <strong>Dibuat:</strong> ${feature.properties.created_at}<br>
                <strong>Rating:</strong><br>${stars}<br><br>
                <div class='row text-center'>
                    <div class='col-6'>
                        <a href='${routeedit}' class='btn btn-warning btn-sm w-100'>
                            <i class='fa-solid fa-pen-to-square'></i>
                        </a>
                    </div>
                    <div class='col-6'>
                        <form method='POST' action='${routedelete}'>
                            @csrf @method('DELETE')
                            <button type='submit' class='btn btn-sm btn-danger w-100' onclick='return confirm("Yakin akan dihapus?")'>
                                <i class='fa-solid fa-trash-can'></i>
                            </button>
                        </form>
                    </div>
                </div>
                <br><span style='font-size:12px;color:#777;'>Dibuat Oleh: ${feature.properties.user_created}</span>
            </div>`;

                layer.bindPopup(popupContent);
                layer.bindTooltip(feature.properties.name);
                pointLayers.push(layer);
            }
        });

        $.getJSON("{{ route('api.points') }}", function(data) {
            point.addData(data);
            map.addLayer(point);
        });


        // GeoJSON Polyline
        var polyline = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                var routedelete = "{{ route('polylines.destroy', ':id') }}";
                routedelete = routedelete.replace(':id', feature.properties.id);

                var routeedit = "{{ route('polylines.edit', ':id') }}";
                routeedit = routeedit.replace(':id', feature.properties.id);

                var popupContent =
                    "<div style='background-color:#f9f9f9;padding:12px;border-radius:10px;width:280px;box-shadow:0 2px 6px rgba(0,0,0,0.15);'>" +
                    "<strong>Nama:</strong> " + feature.properties.name + "<br>" +
                    "<strong>Panjang:</strong> " + feature.properties.length_km + " km<br>" +
                    "<strong>Dibuat:</strong> " + feature.properties.created_at + "<br><br>" +

                    "<img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "' style='width:100%;border-radius:6px;margin-bottom:12px;' alt=''>" +

                    "<strong>Deskripsi:</strong> <p style='text-align:justify;font-size:13px;margin-bottom:8px;'>" +
                    feature.properties.description + "</p>" +

                    "<div class='row text-center mb-2'>" +
                    "<div class='col-6'>" +
                    "<a href='" + routeedit + "' class='btn btn-warning btn-sm w-100'>" +
                    "<i class='fa-solid fa-pen-to-square'></i>" +
                    "</a>" +
                    "</div>" +
                    "<div class='col-6'>" +
                    "<form method='POST' action='" + routedelete + "'>" +
                    '@csrf' + '@method('DELETE')' +
                    "<button type='submit' class='btn btn-sm btn-danger w-100' onclick='return confirm(`Yakin akan dihapus?`)'>" +
                    "<i class='fa-solid fa-trash-can'></i>" +
                    "</button>" +
                    "</form>" +
                    "</div>" +
                    "</div>" +

                    "<span style='font-size:12px;color:#777;'>Dibuat Oleh: " + feature.properties.user_created +
                    "</span>" +
                    "</div>";


                layer.on({
                    click: function(e) {
                        polyline.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        polyline.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.polylines') }}", function(data) {
            polyline.addData(data);
            map.addLayer(polyline);
        });

            // GeoJSON polygon
            var polygon = L.geoJson(null, {
                onEachFeature: function(feature, layer) {
                    var routedelete = "{{ route('polygons.destroy', ':id') }}";
                    routedelete = routedelete.replace(':id', feature.properties.id);

                    var routeedit = "{{ route('polygons.edit', ':id') }}";
                    routeedit = routeedit.replace(':id', feature.properties.id);

                    var popupContent = "Nama: " + feature.properties.name + "<br>" +
                        "Deskripsi: " + feature.properties.description + "<br>" +
                        "Luas: " + feature.properties.luas_hektar.toFixed(2) + " hektar" + "<br>" +
                        "Dibuat: " + feature.properties.created_at + "<br>" +
                        "<img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                        "' width='250' alt=''>" + "<br>" +
                        "<div class='row mt-4'>" +
                        "<div class='col-6 text-end'>" +
                        "<a href='" + routeedit +
                        "' class='btn btn-warning btn-sm'><i class='fa-solid fa-pen-to-square'></i></a>" +
                        "</div>" +
                        "<div class='col-6'>" +
                        "<form method='POST' action='" + routedelete + "'>" +
                        '@csrf' + '@method('DELETE')' +
                        "<button type='submit' class='btn btn-sm btn-danger' onclick='return confirm(`Yakin akan dihapus?`)'><i class='fa-solid fa-trash-can'></i></button>" +
                        "</form>" +
                        "</div>" +
                        "</div>" + "<br>" + "<p>Dibuat Oleh: " + feature.properties.user_created + "</p>";

                    layer.on({
                        click: function(e) {
                            polygon.bindPopup(popupContent);
                        },
                        mouseover: function(e) {
                            polygon.bindTooltip(feature.properties.name);
                        },
                    });
                },
            });
            $.getJSON("{{ route('api.polygons') }}", function(data) {
                polygon.addData(data);
                map.addLayer(polygon);
            });

    </script>
    <script>
        $(document).on('click', '.rating i', function() {
            var value = $(this).data('value');
            var container = $(this).closest('.rating');
            var id = container.data('id');

            // Ubah warna bintang yang diklik
            container.find('i').each(function() {
                if ($(this).data('value') <= value) {
                    $(this).css('color', 'gold');
                } else {
                    $(this).css('color', '#ccc');
                }
            });

            // Kirim rating ke server
            $.ajax({
                url: '/rating',
                type: 'POST',
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    rating: value
                },
                success: function(response) {
                    console.log('Rating berhasil dikirim:', response);
                },
                error: function(err) {
                    console.error('Gagal mengirim rating:', err);
                }
            });
        });
    </script>
    <script>
        const searchInput = document.getElementById('searchPoint');
        const searchResults = document.getElementById('searchResults');

        searchInput.addEventListener('input', function() {
            const keyword = this.value.toLowerCase().trim();
            searchResults.innerHTML = '';

            if (keyword.length === 0) {
                searchResults.style.display = 'none';
                return;
            }

            const matches = pointLayers.filter(layer => {
                return layer.feature.properties.name.toLowerCase().includes(keyword);
            });

            if (matches.length > 0) {
                matches.forEach(layer => {
                    const li = document.createElement('li');
                    li.className = 'list-group-item list-group-item-action';
                    li.textContent = layer.feature.properties.name;
                    li.addEventListener('click', () => {
                        map.setView(layer.getLatLng(), 17);
                        layer.openPopup();
                        searchResults.style.display = 'none';
                        searchInput.value = '';
                    });
                    searchResults.appendChild(li);
                });
                searchResults.style.display = 'block';
            } else {
                const li = document.createElement('li');
                li.className = 'list-group-item text-muted';
                li.textContent = 'Tidak ditemukan';
                searchResults.appendChild(li);
                searchResults.style.display = 'block';
            }
        });
    </script>
@endsection
