@extends ('backend.layouts.app')

@section ('title', __('labels.backend.access.services.management') . ' | ' . __('labels.backend.access.services.edit'))

@section('content')
{{ html()->modelForm($service, 'PATCH', route('admin.auth.donation.service.update', $service))->class('form-horizontal')->open() }}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-5">
                    <h4 class="card-title mb-0">
                        {{ __('labels.backend.access.services.management') }}
                        <small class="text-muted">{{ __('labels.backend.access.services.edit') }}</small>
                    </h4>
                </div><!--col-->
            </div><!--row-->
            <!--row-->

            <hr />

             <div class="row mt-4 mb-4">
                    <div class="col">
                        <div class="form-group row">
                            <div class="col-md-4">
                                {{ html()->label(__('validation.attributes.backend.access.services.category'))->class('col-md-12 form-control-label')->for('category') }}

                                <select name="category" id="category" class="js-example-responsive " required="required">
                                     <option value="Servicio">Servicio</option>      
                                </select>
                            </div><!--col-->
                             <div class="col-md-4">
                                {{ html()->label(__('validation.attributes.backend.access.babies.status'))->class('col-md-12 form-control-label')->for('status') }}

                                <select name="status" id="status" class="js-example-responsive " >
                                     <option value="En espera">En espera</option>
                                    @if ($logged_in_user->isAdmin())
                                        <option value="Aceptada">Aceptada</option>
                                        
                                    @endif

                                </select>
                            </div><!--col-->
                        </div><!--col-->
                        <div class="form-group row">
                           
                            <div class="col-md-4">
                                {{ html()->label(__('validation.attributes.backend.access.services.name'))->class('col-md-12 form-control-label')->for('name') }}

                                {{ html()->text('name')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.services.name_input'))
                                    ->attribute('maxlength', 191)
                                    ->required()
                                    ->autofocus() }}
                            </div><!--col-->

                            <div class="col-md-8">
                                {{ html()->label(__('validation.attributes.backend.access.services.description'))->class('col-md-12 form-control-label')->for('description') }}

                                {{ html()->text('description')
                                    ->class('form-control')
                                    ->placeholder(__('validation.attributes.backend.access.services.description_input'))
                                    ->attribute('maxlength', 191)
                                    ->required() }}
                            </div><!--col-->

                        </div><!--form-group-->

                
                        <div class="form-group row">

                            <div class="col-md-8">
                                <div class="form-group row">
                                    <div class="col-md-6">
                                         {{ html()->label(__('validation.attributes.backend.access.services.personas'))->class('col-md-12 form-control-label')->for('stock') }}


                                        {{ html()->text('persons')
                                            ->class('form-control')
                                            ->placeholder(__('validation.attributes.backend.access.services.personas'))
                                            ->attribute('maxlength', 191)
                                            ->required() }}
                                    </div><!--col-->
                                    <div class="col-md-6">
                                         {{ html()->label(__('validation.attributes.backend.access.services.material'))->class('col-md-12 form-control-label')->for('material') }}


                                        {{ html()->text('material')
                                            ->class('form-control')
                                            ->placeholder(__('validation.attributes.backend.access.services.material'))
                                            ->attribute('maxlength', 191)
                                            ->required() }}
                                    </div><!--col-->
                                    <div class="col-md-12">
                                         {{ html()->label(__('validation.attributes.backend.access.services.service'))->class('col-md-12 form-control-label')->for('material') }}


                                        {{ html()->text('service')
                                            ->class('form-control')
                                            ->placeholder(__('validation.attributes.backend.access.services.service'))
                                            ->attribute('maxlength', 191)
                                            ->required() }}
                                    </div><!--col-->
                                    @if ($logged_in_user->isAdmin())
                                        <div class="col-md-2">
                                            {{ html()->label(__('validation.attributes.backend.access.services.active'))->class('col-md-12 form-control-label')->for('active') }}

                                            <label class="switch switch-3d switch-primary">
                                                {{ html()->checkbox('active', true, '1')->class('switch-input') }}
                                                <span class="switch-label"></span>
                                                <span class="switch-handle"></span>
                                            </label>
                                        </div><!--col-->
                                    @endif
                                </div><!--col-->
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        {{ html()->label(__('validation.attributes.backend.access.services.date'))->class('col-md-12 form-control-label')->for('date') }}

                                        {{ html()->text('fecha')
                                            ->class('form-control')
                                            ->attribute('maxlength', 191)
                                            ->required() }}
                                    </div><!--col-->
                                     <div class="col-md-6">
                                        {{ html()->label(__('validation.attributes.backend.access.services.hour'))->class('col-md-12 form-control-label')->for('hour') }}

                                        {{ html()->text('hora')
                                            ->class('form-control')
                                            ->attribute('maxlength', 191)
                                            ->required() }}
                                    </div><!--col-->
                                </div><!--col-->
                               
                                <div class="form-group row">
                                    <div class="col-md-12">
                                    {{ html()->label(__('validation.attributes.backend.access.services.direccion'))->class('col-md-12 form-control-label')->for('direccion') }}

                                    {{ html()->text('direccion')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.backend.access.services.direccion_input'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                    </div><!--col-->
                                </div><!--col-->
                               <div class="form-group row">
                                    <div class="col-md-6">
                                        {{ html()->label(__('validation.attributes.backend.access.services.lat'))->class('col-md-12 form-control-label')->for('lat') }}

                                        {{ html()->text('lat')
                                            ->class('form-control')
                                            ->attribute('maxlength', 191)
                                            ->required() }}
                                    </div><!--col-->
                                    <div class="col-md-6">
                                        {{ html()->label(__('validation.attributes.backend.access.services.lng'))->class('col-md-12 form-control-label')->for('lng') }}

                                        {{ html()->text('lng')
                                            ->class('form-control')
                                            ->attribute('maxlength', 191)
                                            ->required() }}
                                    </div><!--col-->
                                </div><!--col-->
                               
                            </div><!--col-->
                            
                            <div class="col-xs-12 col-sm-12 col-md-4 form-group"> 
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                     <!-- div donde se dibuja el mapa-->
                                    <div id="map_canvas" style="width:220px;height:320px;">
                                        <div id="crosshair"></div>
                                    </div>
                                </div>
                             </div>
                            
                        </div><!--form-group-->

                    </div><!--col-->
                </div><!--row-->
        </div><!--card-body-->

        <div class="card-footer">
            <div class="row">
                <div class="col">
                    {{ form_cancel(route('admin.auth.product.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
{{ html()->closeModelForm() }}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

<script type="text/javascript">
    var lat;
    var lng;
    var latlng;
    var direccion;
    var autocomplete;
    var markers = [];
    var map;
    var geocoder;
    var centerChangedLast;
    var reverseGeocodedLast;
    var currentReverseGeocodeResponse;

    $(document).ready(function(){
        //Inicializamos la función de google maps una vez el DOM este cargado
        initialize();
    });

    function initialize(){
        geocoder = new google.maps.Geocoder();

        map_lat   = typeof map_lat !== 'undefined' ? map_lat : '23.634501';
        map_lon   = typeof map_lon !== 'undefined' ? map_lon : '-102.5527839999999';
        map_zoom  = typeof map_zoom !== 'undefined' ? map_zoom : 3;

        latlng = new google.maps.LatLng(map_lat, map_lon);

        var myOptions = {
            zoom: map_zoom,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

        direccion = (document.getElementById('direccion'));

        autocomplete = new google.maps.places.Autocomplete(direccion);
        autocomplete.bindTo('bounds', map);
        
        
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {          
          
          addMarkerAtCenter(autocomplete);

        });

        setupEvents();
        centerChanged();
        var opt = { minZoom: 3 };
        map.setOptions(opt);
    }
    
    //callback al hacer clic en el marcador lo que hace es quitar y poner la animacion BOUNCE
    function toggleBounce() {
        openInfoWindow(marker);
        if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
        } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
        }
    }
 
    //funcion que simplemente actualiza los campos del formulario
    function updatePosition(latLng){     
        jQuery('#lat').val(latLng.lat());
        jQuery('#lng').val(latLng.lng());
    }
    
    function setupEvents() {

        reverseGeocodedLast = new Date();
        centerChangedLast = new Date();

        setInterval(function() {
            if((new Date()).getSeconds() - centerChangedLast.getSeconds() > 1) {
                if(reverseGeocodedLast.getTime() < centerChangedLast.getTime())
                    reverseGeocode();
                }
            }, 1000);

        google.maps.event.addListener(map, 'center_changed', centerChanged);
        google.maps.event.addDomListener(document.getElementById('crosshair'),'dblclick', function() {
            map.setZoom(map.getZoom() + 1);
        });
    }

    function getCenterLatLngText() {
        return '(' + map.getCenter().lat() +', '+ map.getCenter().lng() +')';
    }

    //Centra la ubucacion
    function centerChanged() {
        centerChangedLast = new Date();
        var latlng = getCenterLatLngText();
        var lat = map.getCenter().lat();
        var lng = map.getCenter().lng();
        document.getElementById('lat').value = lat;
        document.getElementById('lng').value = lng;
        reverseGeocode();
    }

    function reverseGeocode() {
        reverseGeocodedLast = new Date();
        geocoder.geocode({latLng:map.getCenter()},reverseGeocodeResult);
    }

    //obtiene la ubicacion por nombre
    function reverseGeocodeResult(results, status) {
        currentReverseGeocodeResponse = results;

        if(status == 'OK') {
            if(results.length == 0) {
                document.getElementById('formatedAddress').innerHTML = 'Desconocido';          
            } else {
                document.getElementById('formatedAddress').innerHTML = results[0].formatted_address;
                jQuery('#direccion').val(results[0].formatted_address);
            }
        } else {
            document.getElementById('formatedAddress').innerHTML = 'Desconocido';        
        }
    }

    //funcion para obtener la ubucacion del texto
    function geocode() {
        var address = document.getElementById("direccion").value;
        geocoder.geocode({
            'address': address,
            'partialmatch': true
        }, geocodeResult);
    }

    //funcion para obtener la ubicacion y poner un marcador al centro
    function geocodeResult(results, status) {
        if (status == 'OK' && results.length > 0) {
            map.fitBounds(results[0].geometry.viewport);
        } else {
            alert("Geocode was not successful for the following reason: " + status);
        }
        addMarker();
    }

    //funcion para agregar un nuevo marcador
    function addMarkerAtCenter(autocomplete) {
        var infowindow = new google.maps.InfoWindow();
        deleteMarkers();
        infowindow.close();
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No hay informacion sobre este lugar: '" + place.name + "'");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
        }
        var image = "{{asset('frontend/icon/Home.png')}}";
        
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            icon: image,
            animation: google.maps.Animation.DROP,
            draggable: true //que el marcador se pueda arrastrar
        });

        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
        marker.addListener( 'dragend', function (event)
        {
            //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
            
            jQuery('#lat').val(this.getPosition().lat());
            jQuery('#lng').val(this.getPosition().lng());
        });

        markers.push(marker);
    }

    //funcion para agregar un nuevo marcador
    function addMarker() {
        
        deleteMarkers();
        var image = "{{asset('frontend/icon/Home.png')}}";
        
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map,
            icon: image,
            animation: google.maps.Animation.DROP,
            draggable: true //que el marcador se pueda arrastrar
        });

        var text = 'Lat/Lng: ' + getCenterLatLngText();

        if(currentReverseGeocodeResponse) {
            var addr = '';
            if(currentReverseGeocodeResponse.size == 0) {
                addr = 'None';
            } else {
                addr = currentReverseGeocodeResponse[0].formatted_address;
            }
            text = text + '<br>' + 'Dirección: <br><strong>' + addr+ '</strong>';
        }

        var infowindow = new google.maps.InfoWindow({ content: text });

        google.maps.event.addListener(marker, 'click', function() {
            infowindow.open(map,marker);
        });


        marker.addListener('click', toggleBounce);
        
      
        marker.addListener( 'dragend', function (event)
        {
            //escribimos las coordenadas de la posicion actual del marcador dentro del input #coords
            
            jQuery('#lat').val(this.getPosition().lat());
            jQuery('#lng').val(this.getPosition().lng());
        });
        markers.push(marker);

    }

    //funcion para poner todos los marcadores limpios
    function setMapOnAll(map) {
        for (var i = 0; i < markers.length; i++) {
            markers[i].setMap(map);
        }
    }

    //Funcion para limpiar un marcador
    function clearMarkers() {
        setMapOnAll(null);
    }

    //funcion paraeliminar un marcador
    function deleteMarkers() {
        clearMarkers();
        markers = [];
    }
    function funcion_primera(){
        
        geocode();   
    }

    function lanzadera(){
        funcion_primera();
        
    }
    
    window.onload = lanzadera;

</script>
@endsection
