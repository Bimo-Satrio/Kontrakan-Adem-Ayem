<div class="container">


    <form wire:submit.prevent="store">

        <div class="card">
            <div class="card-body">
                <div class="mt-4">
                    <div class="form-group">
                        <label>Unit Kontrakan</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" wire:model="kontrakan" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('kontrakan') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>

                </div>


                <div class="mt-4">
                    <div class="form-group">
                        <label for="utama">Foto</label>
                        <input type="file" multiple wire:model="images" id="utama" class="form-control">
                        @error('images') <span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                </div>

                <div class="mt-4">
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" wire:model="deskripsi" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>

                        </div>
                    </div>
                </div>


                <!-- <div class="form-group">
                    <label for="longtitude">Longtitude</label>
                    <input wire:model="long" type="text" class="form-control" id="longtitude">
                </div>

                <div class="form-group">
                    <label for="lattitude">Latitude</label>
                    <input wire:model="lat" type="text" class="form-control" id="lattitude">

                </div> -->

                <!-- 
                <div class="form-group">
                    <label for="map">Lokasi</label>
                    <div wire:ignore id='map' style='width: 100%; height:600px;'></div>
                </div> -->

                <div class="mt-4">
                    <div class="form-group">
                        <label>Lokasi</label>
                        <div class="form-group position-relative has-icon-left">

                            <input type="text" class="form-control" wire:model="lokasi" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('lokasi') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="mt-4">
                    <div class="form-group">
                        <label>Harga</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" wire:model="harga" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>



                <div class="mt-4">
                    <div class="form-group">
                        <label>Stok</label>
                        <div class="form-group position-relative has-icon-left">
                            <input type="text" class="form-control" wire:model="stok" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>



                <div class="mt-4">
                    <div wire:ignore>
                        <label for="summernote">Deskripsi</label>
                        <textarea name="description" id="summernote" class="form-control" wire:model="deskripsi"></textarea>
                        @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>


                <div class="mt-4">
                    <button class="btn btn-primary">Tambah</button>
                </div>
            </div>
        </div>
    </form>
</div>



<!-- <script>
    document.addEventListener('livewire:load', () => {
        const defaultlocation = [106.8630247916447, -6.2913422964058725]

        mapboxgl.accessToken = '{{env("MAPBOX_KEY")}}';
        var map = new mapboxgl.Map({
            container: 'map',
            center: defaultlocation,
            zoom: 11.15,

        });

        const geoJson = {
            "type": "FeatureCollection",
            "features": [{
                    "type": "Feature",
                    "geometry": {
                        "coordinates": [
                            "106.73830754205",
                            "-6.2922403995615"
                        ],
                        "type": "Point"
                    },
                    "properties": {
                        "message": "Mantap",
                        "iconSize": [
                            50,
                            50
                        ],
                        "locationId": 30,
                        "title": "Hello new",
                        "image": "1a1eb1e4106fff0cc3467873f0f39cab.jpeg",
                        "description": "Mantap"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "coordinates": [
                            "106.68681595869",
                            "-6.3292244652013"
                        ],
                        "type": "Point"
                    },
                    "properties": {
                        "message": "oke mantap Edit",
                        "iconSize": [
                            50,
                            50
                        ],
                        "locationId": 29,
                        "title": "Rumah saya Edit",
                        "image": "0ea59991df2cb96b4df6e32307ea20ff.png",
                        "description": "oke mantap Edit"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "coordinates": [
                            "106.62490035406",
                            "-6.3266855038639"
                        ],
                        "type": "Point"
                    },
                    "properties": {
                        "message": "Update Baru",
                        "iconSize": [
                            50,
                            50
                        ],
                        "locationId": 22,
                        "title": "Update Baru Gambar",
                        "image": "d09444b68d8b72daa324f97c999c2301.jpeg",
                        "description": "Update Baru"
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "coordinates": [
                            "106.72391468711",
                            "-6.3934163494543"
                        ],
                        "type": "Point"
                    },
                    "properties": {
                        "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                        "iconSize": [
                            50,
                            50
                        ],
                        "locationId": 19,
                        "title": "awdwad",
                        "image": "f0b88ffd980a764b9fca60d853b300ff.png",
                        "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "coordinates": [
                            "106.67224158205",
                            "-6.3884963990263"
                        ],
                        "type": "Point"
                    },
                    "properties": {
                        "message": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.",
                        "iconSize": [
                            50,
                            50
                        ],
                        "locationId": 18,
                        "title": "adwawd",
                        "image": "4c35cb1b76af09e6205f94024e093fe6.jpeg",
                        "description": "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum."
                    }
                },
                {
                    "type": "Feature",
                    "geometry": {
                        "coordinates": [
                            "106.74495523289",
                            "-6.3642034511073"
                        ],
                        "type": "Point"
                    },
                    "properties": {
                        "message": "awdwad",
                        "iconSize": [
                            50,
                            50
                        ],
                        "locationId": 12,
                        "title": "adawd",
                        "image": "7c8c949fd0499eb50cb33787d680778c.jpeg",
                        "description": "awdwad"
                    }
                }
            ]
        }

        const loadLocations = (geoJson) => {
            geoJson.features.forEach((location) => {
                const {
                    geometry,
                    properties
                } = location
                const {
                    iconSize,
                    locationId,
                    title,
                    image,
                    description
                } = properties

                console.log(
                    location
                );
                let markerElement = document.createElement('div')
                markerElement.className = 'marker' + locationId
                markerElement.id = locationId
                markerElement.style.backgroundImage = 'url({{asset("image/car.png")}})'
                markerElement.style.backgroundSize = 'cover'
                markerElement.style.width = '50px'
                markerElement.style.height = '50px'


                new mapboxgl.Marker(markerElement)
                    .setLngLat(geometry.coordinates)
                    .addTo(map)
            })
        }
        loadLocations(geoJson)




        const style = "streets-v11"
        map.setStyle(`mapbox://styles/mapbox/${style}`)

        map.addControl(new mapboxgl.NavigationControl())

        map.on('click', (e) => {
            const longtitude = e.lngLat.lng
            const latitude = e.lngLat.lat

            @this.long = longtitude
            @this.lat = latitude
        })
    })
</script> -->