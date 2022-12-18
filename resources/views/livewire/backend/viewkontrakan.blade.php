<div class="container">



    <div class="card">
        <div class="card-body">
            <div class="mt-4">
                <div class="form-group">
                    <h6>Unit Kontrakan</h6>
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
                    <h6>Deskripsi</h6>
                    <div class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control" wire:model="deskripsi" />
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>


            <div class="form-group">
                <label for="longtitude">Longtitude</label>
                <input wire:model="long" type="text" class="form-control" id="longtitude">
            </div>

            <div class="form-group">
                <label for="lattitude">Latitude</label>
                <input wire:model="lat" type="text" class="form-control" id="lattitude">

            </div>


            <div class="mt-4">
                <div class="form-group">
                    <h6>Harga</h6>
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
                    <h6>Stok</h6>
                    <div class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control" wire:model="stok" />
                        <div class="form-control-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

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

        // const geoJson = {
        //     "type": "FeatureCollection",
        //     "features": [{
        //             "type": "Feature",
        //             "geometry": {
        //                 "coordinates": [
        //                     "106.73830754205",
        //                     "-6.2922403995615"
        //                 ],
        //                 "type": "Point"
        //             },
        //             "properties": {

        //                 "id_kontrakan": 30,
        //                 "kontrakan": "Hello new",


        //             }
        //         },
        //         {
        //             "type": "Feature",
        //             "geometry": {
        //                 "coordinates": [
        //                     "106.74495523289",
        //                     "-6.3642034511073"
        //                 ],
        //                 "type": "Point"
        //             },
        //             "properties": {

        //                 "id_kontrakan": 12,
        //                 "kontrakan": "adawd",


        //             }
        //         }
        //     ]
        // }

        const loadLocations = (geoJson) => {
            geoJson.features.forEach((location) => {
                const {
                    geometry,
                    properties
                } = location

                const {
                    id_kontrakan,
                    kontrakan
                } = properties
                console.log(properties)

                let markerElement = document.createElement('div')
                markerElement.className = 'marker' + id_kontrakan
                markerElement.id = id_kontrakan
                markerElement.style.backgroundImage = 'url({{asset("image/car.png")}})'
                markerElement.style.backgroundSize = 'cover'
                markerElement.style.width = '50px'
                markerElement.style.height = '50px'



                const popUp = new mapboxgl.Popup({
                    offset: 25
                }).setHTML(kontrakan).setMaxWidth("400px")

                new mapboxgl.Marker(markerElement)
                    .setLngLat(geometry.coordinates)
                    .setPopup(popUp)
                    .addTo(map)
            })
        }
        loadLocations({
            {}
        })




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