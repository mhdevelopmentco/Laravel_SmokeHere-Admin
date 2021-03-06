<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport"
          content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="Bookmark" href="/favicon.ico">
    <link rel="Shortcut Icon" href="/favicon.ico"/>
    <!--[if lt IE 9]>
    <script type="text/javascript" src="<?= asset('lib/html5shiv.js') ?>"></script>
    <script type="text/javascript" src="<?= asset('lib/respond.min.js') ?>"></script>

    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?= asset('static/h-ui/css/H-ui.min.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= asset('static/h-ui.admin/css/H-ui.admin.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= asset('lib/Hui-iconfont/1.0.8/iconfont.css') ?>"/>

    <link rel="stylesheet" type="text/css" href="<?= asset('static/h-ui.admin/skin/default/skin.css') ?>" id="skin"/>
    <link rel="stylesheet" type="text/css" href="<?= asset('static/h-ui.admin/css/style.css') ?>"/>
    <!--[if IE 6]>
    <script type="text/javascript" src="<?= asset('lib/DD_belatedPNG_0.0.8a-min.js') ?>"></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->

    <link href="<?= asset('lib/webuploader/0.1.5/webuploader.css') ?>" rel="stylesheet" type="text/css"/>
</head>
<body>
<div class="page-container" id="edit_venue_page">
    <form action="{{url('/venue')}}/{{$key}}" method="post" class="form form-horizontal" id="form-venue-add">
        {!! csrf_field() !!}
        <input type="hidden" name="key" value="{{$venue['id']}}">
        <input type="hidden" name="images" id="images" value="">
        {{--@if(!empty($photo_urls))--}}
        {{--<input type="hidden" name="old_images" value="{{$photo_urls}}">--}}
        {{--{{$photo_urls}}--}}
        {{--@endif--}}

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Confirm???</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    @if(!empty($venue['confirm']) && $venue['confirm'] == true)
                        <input type="checkbox" id="venue_confirm" name="confirm" checked>
                    @else
                        <input type="checkbox" id="venue_confirm" name="confirm">
                    @endif
                    <label for="checkbox-1">&nbsp;</label>
                </div>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>Name???</label>
            <div class="formControls col-xs-8 col-sm-9">
                @if(empty($venue['name']))
                    <input type="text" class="input-text" value="" placeholder="" id="venue_name" name="name">
                @else
                    <input type="text" class="input-text" placeholder="" id="venue_name" name="name"
                           value="{{$venue['name']}}">
                @endif
            </div>
        </div>
        <input type="hidden" name="type" id="venue_type" value="marijuana">


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Venue Type???</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                <select name="estateType" id="venue_estate_type" class="select">
                    @if(empty($venue['estateType']))
                        <option value="smokingVenue">Smoking Venue</option>
                        <option value="lodgingVenue">Lodging Venue</option>
                    @else
                        @if($venue['estateType'] == 'smokingVenue')
                            <option value="smokingVenue" selected>Smoking Venue</option>
                            <option value="lodgingVenue">Lodging Venue</option>
                        @else
                            <option value="smokingVenue">Smoking Venue</option>
                            <option value="lodgingVenue" selected>Lodging Venue</option>
                        @endif
                    @endif
                </select>
                </span></div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Description???</label>
            <div class="formControls col-xs-8 col-sm-9">
                @if(empty($venue['name']))
                    <input type="text" class="input-text" value="" placeholder="" id="venue_description"
                           name="description">
                @else
                    <input type="text" class="input-text" value="{{$venue['name']}}" placeholder=""
                           id="venue_description" name="description">
                @endif
            </div>
        </div>
        <div class="row cl @if(!empty($venue['estateType']) && $venue['estateType'] != 'smokingVenue') hide @endif"
             id="membership_row">
            <label class="form-label col-xs-4 col-sm-2">Membership Detail???</label>
            <div class="formControls col-xs-8 col-sm-9">
                @if(empty($venue['membershipDetail']))
                    <input type="text" class="input-text" value="" placeholder="" id="venue_membership_detail"
                           name="membershipDetail">
                @else
                    <input type="text" class="input-text" value="{{$venue['membershipDetail']}}" placeholder=""
                           id="venue_membership_detail" name="membershipDetail">
                @endif
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>Address???</label>
            <div class="formControls col-xs-8 col-sm-9">
                @if(empty($venue['address']))
                    <input type="text" class="input-text" value="" placeholder="" id="venue_address" name="address">
                @else
                    <input type="text" class="input-text" value="{{$venue['address']}}" placeholder=""
                           id="venue_address" name="address">
                @endif

                @if(empty($venue['latitude']))
                    <input type="text" class="input-text" name="lat" id="venue_lat" readonly="readonly">
                @else
                    <input type="text" class="input-text" name="lat" id="venue_lat" value="{{$venue['latitude']}}"
                           readonly="readonly">
                @endif

                @if(empty($venue['longitude']))
                    <input type="text" class="input-text" name="lng" id="venue_lng" readonly="readonly">
                @else
                    <input type="text" class="input-text" name="lng" id="venue_lng" value="{{$venue['longitude']}}"
                           readonly="readonly">
                @endif

                <div id="googleMap" style="height: 400px; width: 100%;"></div>

            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Outdoor???</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    @if(!empty($venue['outdoor']) && $venue['outdoor'] == true)
                        <input type="checkbox" id="venue_outdoor" name="outdoor" checked>
                    @else
                        <input type="checkbox" id="venue_outdoor" name="outdoor">
                    @endif
                    <label for="checkbox-1">&nbsp;</label>

                </div>
            </div>
        </div>
        <input type="hidden" name="public" value="0">
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Wifi???</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="check-box">
                    @if(!empty($venue['wifi']) && $venue['wifi'] == true)
                        <input type="checkbox" id="venue_wifi" name="wifi" checked>
                    @else
                        <input type="checkbox" id="venue_wifi" name="wifi">
                    @endif
                    <label for="checkbox-1">&nbsp;</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Number of seats???</label>
            <div class="formControls col-xs-8 col-sm-9"> <span class="select-box">
                    <?php
                    $seats = ['1-10', '10-50', '50-100', '100-500', '500-'];
                    ?>
                    <select name="num_of_seats" class="select">
                    @foreach($seats as $s)
                            @if(!empty($venue['num_of_seats']) && $s == $venue['num_of_seats'])
                                <option value="{{$s}}" selected>{{$s}}</option>
                            @else
                                <option value="{{$s}}">{{$s}}</option>
                            @endif
                        @endforeach
				</select>
				</span></div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Open Hours???</label>
            <div class="formControls col-xs-8 col-sm-9">
                <?php
                $weekdays = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                $hours = ["---", "00:00", "00:30",
                        "01:00", "01:30",
                        "02:00", "02:30",
                        "03:00", "03:30",
                        "04:00", "04:30",
                        "05:00", "05:30",
                        "06:00", "06:30",
                        "07:00", "07:30",
                        "08:00", "08:30",
                        "09:00", "09:30",
                        "10:00", "10:30",
                        "11:00", "11:30",
                        "12:00", "12:30",
                        "13:00", "13:30",
                        "14:00", "14:30",
                        "15:00", "15:30",
                        "16:00", "16:30",
                        "17:00", "17:30",
                        "18:00", "18:30",
                        "19:00", "19:30",
                        "20:00", "20:30",
                        "21:00", "21:30",
                        "22:00", "22:30",
                        "23:00", "23:30"];
                ?>
                @foreach($weekdays as $w)
                    <div class="row cl">
                        <div class="formControls col-xs-2 col-sm-2">
                            {{$w}}:
                        </div>
                        <div class="formControls col-xs-4 col-sm-4">
                            <select name="{{$w}}_open" class="select" style="width:100px">
                                @foreach($hours as $h)
                                    @if(!empty($venue['open_hours']) && !empty($venue['open_hours'][strtolower($w)]) &&
                                    $venue['open_hours'][strtolower($w)] == $h)
                                        <option value="{{$h}}" selected>{{$h}}</option>
                                    @else
                                        <option value="{{$h}}">{{$h}}</option>
                                    @endif
                                @endforeach
                            </select> &nbsp;
                            To
                            <select name="{{$w}}_close" class="select" style="width:100px">
                                @foreach($hours as $h)
                                    @if(!empty($venue['close_hours']) && !empty($venue['close_hours'][strtolower($w)]) &&
                                    $venue['close_hours'][strtolower($w)] == $h)
                                        <option value="{{$h}}" selected>{{$h}}</option>
                                    @else
                                        <option value="{{$h}}">{{$h}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Phone???</label>
            <div class="formControls col-xs-8 col-sm-9">
                @if(empty($venue['phone']))
                    <input type="text" name="phone" id="venue_phone" placeholder="" value="" class="input-text"
                           style="width:90%">
                @else
                    <input type="text" name="phone" id="venue_phone" placeholder="" value="{{$venue['phone']}}"
                           class="input-text"
                           style="width:90%">
                @endif
            </div>
        </div>
        <div class="row cl @if(empty($venue['estateType'])) hide @endif  @if (!empty($venue['estateType']) && $venue['estateType'] == 'smokingVenue') hide @endif"
             id="airbnb_row">
            <label class="form-label col-xs-4 col-sm-2">Airbnb???</label>
            <div class="formControls col-xs-8 col-sm-9">
                @if(empty($venue['airbnb']))
                    <input type="text" name="airbnb" id="venue_airbnb" placeholder="" value="" class="input-text"
                           style="width:90%">
                @else
                    <input type="text" name="airbnb" id="venue_airbnb" placeholder="" value="{{$venue['airbnb']}}"
                           class="input-text"
                           style="width:90%">
                @endif
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Weblink???</label>
            <div class="formControls col-xs-8 col-sm-9">
                @if(empty($venue['weblink']))
                    <input type="text" name="weblink" id="venue_weblink" placeholder="" value="http://"
                           class="input-text"
                           style="width:90%">
                @else
                    <input type="text" name="weblink" id="venue_weblink" placeholder="" value="{{$venue['weblink']}}"
                           class="input-text"
                           style="width:90%">
                @endif
            </div>
        </div>
        @if(!empty($venue['photos']))
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">Thumbnails???</label>
                <div class="formControls col-xs-8 col-sm-9">
                    <div class="uploader-thum-container">
                        <div class="uploader-list">

                            @foreach($venue['photos'] as $name=>$url)
                                <img src="{{$url}}" width="100" height="100">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">New Thumbnails<br/>(replace all old images)???</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="uploader-thum-container">
                    <div id="fileList" class="uploader-list"></div>
                </div>
            </div>
        </div>

        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Photo Upload???</label>
            <div class="formControls col-xs-8 col-sm-9">
                <div class="uploader-list-container">
                    <input type="file" id="venue_files" onchange="getFileName(this)"
                           accept=".png, .jpg, .bmp, .JPEG, .JPG, .svg, .tiff, .gif">
                </div>
            </div>
        </div>


        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-2">Contact Information???</label>
            <div class="formControls col-xs-8 col-sm-9">

                <div class="row" style="padding-top:10px; padding-bottom:10px;">
                    <div class="col-md-6">
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <label for="contact_name"> Name: </label>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-8">
                            @if ( !empty($venue['contact_info']) )
                                @if (!empty ($venue['contact_info']['contact_name']))
                                    <input type="text" name="contact_name" placeholder="" class="input-text"
                                           id="contact_name"
                                           value="{!!  $venue['contact_info']['contact_name'] !!}">
                                @else
                                    <input type="text" name="contact_name" placeholder="" class="input-text"
                                           id="contact_name"
                                           value="">
                                @endif
                            @else
                                <input type="text" name="contact_name" placeholder="" class="input-text"
                                       id="contact_name"
                                       value="">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <label for="contact_title"> Title: </label>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-8">

                            @if ( !empty($venue['contact_info']) )
                                @if (!empty ($venue['contact_info']['contact_title']))
                                    <input type="text" name="contact_title" placeholder="" class="input-text"
                                           id="contact_title"
                                           value="{!!  $venue['contact_info']['contact_title'] !!}">
                                @else
                                    <input type="text" name="contact_title" placeholder="" class="input-text"
                                           id="contact_title"
                                           value="">
                                @endif
                            @else
                                <input type="text" name="contact_title" placeholder="" class="input-text"
                                       id="contact_title"
                                       value="">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row" style="padding-top:10px; padding-bottom:10px;">
                    <div class="col-md-6">
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <label for="contact_email"> Email: </label>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-8">
                            @if ( !empty($venue['contact_info']) )
                                @if (!empty ($venue['contact_info']['contact_email']))
                                    <input type="email" name="contact_email" placeholder="" class="input-text"
                                           id="contact_email"
                                           value="{!!  $venue['contact_info']['contact_email'] !!}">
                                @else
                                    <input type="email" name="contact_email" placeholder="" class="input-text"
                                           id="contact_email"
                                           value="">
                                @endif
                            @else
                                <input type="email" name="contact_email" placeholder="" class="input-text"
                                       id="contact_email"
                                       value="">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <label for="contact_phone"> Phone: </label>
                        </div>
                        <div class="col-md-10 col-sm-9 col-xs-8">

                            @if ( !empty($venue['contact_info']) )
                                @if (!empty ($venue['contact_info']['contact_phone']))
                                    <input type="text" name="contact_phone" placeholder="" class="input-text"
                                           id="contact_phone"
                                           pattern="\(?\d{3})?\s?[\-]?\d{3}[\-]?\d{4}"
                                           title="(ddd) ddd-dddd or ddd-ddd-dddd or 7 digites"
                                           value="{!!  $venue['contact_info']['contact_phone'] !!}">
                                @else
                                    <input type="text" name="contact_phone" placeholder="" class="input-text"
                                           id="contact_phone"
                                           pattern="\(?\d{3})?\s?[\-]?\d{3}[\-]?\d{4}"
                                           title="(ddd) ddd-dddd or ddd-ddd-dddd or 7 digites"
                                           value="">
                                @endif
                            @else
                                <input type="text" name="contact_phone" placeholder="" class="input-text"
                                       id="contact_phone"
                                       pattern="\(?\d{3})?\s?[\-]?\d{3}[\-]?\d{4}"
                                       title="(ddd) ddd-dddd or ddd-ddd-dddd or 7 digites"
                                       value="">
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row cl">
            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i
                            class="Hui-iconfont">&#xe632;</i> Save
                </button>
                <button onClick="layer_close();" class="btn btn-default radius" type="button">
                    &nbsp;&nbsp;Cancel&nbsp;&nbsp;</button>
            </div>
        </div>
    </form>
</div>

<!--_footer ??????????????????????????????-->
<script type="text/javascript" src="<?= asset('lib/jquery/1.9.1/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?= asset('lib/layer/2.4/layer.js') ?>"></script>
<script type="text/javascript" src="<?= asset('static/h-ui/js/H-ui.min.js') ?>"></script>
<!--script type="text/javascript" src="<?= asset('static/h-ui.admin/js/H-ui.admin.js') ?>"></script-->
<!--/_footer ??????????????????????????????-->

<!--?????????????????????????????????????????????-->
<script type="text/javascript" src="<?= asset('lib/My97DatePicker/4.8/WdatePicker.js') ?>"></script>
<script type="text/javascript" src="<?= asset('lib/jquery.validation/1.14.0/jquery.validate.js') ?>"></script>
<script type="text/javascript" src="<?= asset('lib/jquery.validation/1.14.0/validate-methods.js') ?>"></script>
<script type="text/javascript" src="<?= asset('lib/jquery.validation/1.14.0/messages_zh.js') ?>"></script>
<script type="text/javascript" src="<?= asset('lib/webuploader/0.1.5/webuploader.min.js') ?>"></script>
<script type="text/javascript" src="<?= asset('lib/ueditor/1.4.3/ueditor.config.js') ?>"></script>
<script type="text/javascript" src="<?= asset('lib/ueditor/1.4.3/ueditor.all.min.js') ?>"></script>
<script type="text/javascript" src="<?= asset('static/h-ui.admin/js/H-ui.admin.page.js') ?>"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSJff_oQeFbYObvFfMCUPdkzYf79LYkLo&libraries=places&callback=initAutocomplete"
        async defer></script>
<script src="https://www.gstatic.com/firebasejs/4.3.1/firebase.js"></script>
<script>
    // Initialize Firebase
    // TODO: Replace with your project's customized code snippet
    var config = {
        apiKey: "AIzaSyDSfkEQ3U5yK8bHXdPzPXeXxCjZCuGesTg",
        authDomain: "smokehere-e68ae.firebaseapp.com",
        databaseURL: "https://smokehere-e68ae.firebaseio.com",
        storageBucket: "smokehere-e68ae.appspot.com",
        messagingSenderId: "866527911437",
    };
    firebase.initializeApp(config);

    var storage = firebase.storage();

    // Create a storage reference from our storage service
    var storageRef = storage.ref();

</script>

<script type="text/javascript">

    var house_icon = '../image/house_icon.png';
    var leaf_icon = '../image/leaf_icon.png';

    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;
    var componentForm = {
//        street_number: 'short_name',
//        route: 'long_name',
//        locality: 'long_name',
//        administrative_area_level_1: 'short_name',
        country: 'venue_description',
//        postal_code: 'short_name'
    };

    var lng = parseFloat("{!!$venue['longitude']!!}");
    var lat = parseFloat("{!!$venue['latitude']!!}");
    var marker;
    var map;

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
                /** @type {!HTMLInputElement} */(document.getElementById('venue_address')),
                {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);


        var myCenter = new google.maps.LatLng(lat, lng);
        var mapProp = {
            center: myCenter,
            zoom: 14
        };
        map = new google.maps.Map(document.getElementById("googleMap"), mapProp);


        marker = new google.maps.Marker({position: myCenter});

        @if(empty($venue['estateType']) || (!empty($venue['estateType']) && $venue['estateType'] == 'smokingVenue'))
        marker.setIcon(leaf_icon);
        @else
        marker.setIcon(house_icon);
        @endif

        marker.setMap(map);
        google.maps.event.addListener(map, 'click', function (event) {
            marker.position = event.latLng;
            marker.setMap(map);
            var oLng = document.getElementById("venue_lng");
            var oLat = document.getElementById("venue_lat");
            console.log(oLng);
            console.log(oLat);
            oLng.value = event.latLng.lng();
            oLat.value = event.latLng.lat();
        });
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        console.log(place.geometry.location.lat(), place.geometry.location.lng());
        var lat = place.geometry.location.lat();
        var lng = place.geometry.location.lng();
        document.getElementById("venue_lat").value = lat;
        document.getElementById("venue_lng").value = lng;

        marker.position = new google.maps.LatLng(lat, lng);
        console.log("new marker position: " + marker.position);
        marker.setMap(map);
        map.setCenter(marker.position);

        for (var component in componentForm) {

            var comp_obj = document.getElementById(component);
            if (comp_obj) {
                comp_obj.value = '';
                comp_obj.disabled = false;
            }
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }


    var num = 0;
    function getFileName(fileInput) {

        file = fileInput.files[0];
        fileName = file.name;
        var storageRef = firebase.storage().ref("{{$key}}/image" + num);
        uploadTask = storageRef.put(file);

        num = num + 1;

        uploadTask.on(firebase.storage.TaskEvent.STATE_CHANGED, // or 'state_changed'
                function (snapshot) {
                    // Get task progress, including the number of bytes uploaded and the total number of bytes to be uploaded
                    var progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
                    console.log('Firebase Upload is ' + progress + '% done');
                    switch (snapshot.state) {
                        case firebase.storage.TaskState.PAUSED: // or 'paused'
                            console.log('Firebase Upload is paused');
                            break;
                        case firebase.storage.TaskState.RUNNING: // or 'running'
                            console.log('Firebase Upload is running');
                            break;
                    }
                }, function (error) {

                    // A full list of error codes is available at
                    // https://firebase.google.com/docs/storage/web/handle-errors
                    switch (error.code) {
                        case 'storage/unauthorized':
                            // User doesn't have permission to access the object
                            break;

                        case 'storage/canceled':
                            // User canceled the upload
                            break;

                        case 'storage/unknown':
                            // Unknown error occurred, inspect error.serverResponse
                            break;
                    }
                }, function () {
                    // Upload completed successfully, now we can get the download URL
                    var downloadURL = uploadTask.snapshot.downloadURL;
                    console.log("Firebase downloadURL:", downloadURL);

                    var base64url = btoa(downloadURL);
                    console.log("base64:", base64url);

                    $('#fileList').append('<img src="' + downloadURL + '" width="100" height="100"/>');

                    var images = document.getElementById("images");

                    if (images.value == "") {
                        images.value = base64url;
                    } else {
                        images.value = images.value + "," + base64url
                    }

                    console.log(images.value);
                });
    }
</script>

<script type="text/javascript">

    $(function () {
        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-venue-add").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 4,
                    maxlength: 500
                },
                address: {
                    required: true,
                },
            },
            onkeyup: false,
            focusCleanup: true,
            success: "valid",
            submitHandler: function (form) {
                $(form).ajaxSubmit({
                    type: 'post',
                    url: "{{url('/venues')}}/{{$key}}",
                    success: function (data) {
                        console.log(data);

                        layer.msg('Successfully changed!', {icon: 1, time: 1000});
//                        var index = parent.layer.getFrameIndex(window.name);
//                        parent.$('.btn-refresh').click();
//                        parent.layer.close(index);
                        parent.location.reload();
                    },
                    error: function (XmlHttpRequest, textStatus, errorThrown) {
                        layer.msg('error!', {icon: 1, time: 1000});
                    }
                });

            }
        });

        $('#venue_estate_type').change(function () {
            var cur_type = $(this).val();

            if (cur_type == "smokingVenue") {

                //change marker icon
                if (marker) {
                    marker.setIcon(leaf_icon);
                }

                //show/hide membership detail field
                $('#membership_row').show();
                $('#airbnb_row').hide();
            } else {

                if (marker) {
                    marker.setIcon(house_icon);
                }

                //show/hide membership detail field
                $('#membership_row').hide();
                $('#airbnb_row').show();
            }
        });
    });
</script>
</body>
</html>