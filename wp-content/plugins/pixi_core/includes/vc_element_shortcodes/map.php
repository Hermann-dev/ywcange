<?php
vc_map(array(
    "name" => 'Google Maps',
    "base" => "maps",
    "category" => esc_html__('Extra Elements', 'pixi'),
    "icon" => "tb-icon-for-vc fa fa-map-marker",
    "description" => esc_html__('Google Maps API', 'pixi'),
    "params" => array(
	    array(
			"type" => "dropdown",
			"class" => "",
			"heading" => esc_html__("Template", 'pixi'),
			"param_name" => "tpl",
			"value" => array(
				"full_map" => "full_map",
				"fancybox_map" => "fancybox_map",
			),
			"description" => esc_html__('Select template of maps display in this element.', 'pixi')
		),
		array(
			"type" => "textfield",
			"heading" => esc_html__("fancybox map button", 'pixi'),
			"param_name" => "fancybox_map_btn",
			"value" => "GO TO OUR MAP",
			"dependency" => array(
					"element"=>"tpl",
					"value"=> "fancybox_map"
				),
			"description" => esc_html__( "Enter fancybox map button display in this element.", 'pixi' )
		),
					
        array(
            "type" => "textfield",
            "heading" => esc_html__('API Key', 'pixi'),
            "param_name" => "api",
            "value" => '',
            "description" => esc_html__('Enter you api key of map, get key from (https://console.developers.google.com)', 'pixi')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Address', 'pixi'),
            "param_name" => "address",
            "value" => 'New York, United States',
            "description" => esc_html__('Enter address of Map', 'pixi')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Coordinate', 'pixi'),
            "param_name" => "coordinate",
            "value" => '',
            "description" => esc_html__('Enter coordinate of Map, format input (latitude, longitude)', 'pixi')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Click Show Info window', 'pixi'),
            "param_name" => "infoclick",
            "value" => array(
                esc_html__("Yes, please", 'pixi') => true
            ),
            "group" => esc_html__("Marker", 'pixi'),
            "description" => esc_html__('Click a marker and show info window (Default Show).', 'pixi')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Marker Coordinate', 'pixi'),
            "param_name" => "markercoordinate",
            "value" => '',
            "group" => esc_html__("Marker", 'pixi'),
            "description" => esc_html__('Enter marker coordinate of Map, format input (latitude, longitude)', 'pixi')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Marker Title', 'pixi'),
            "param_name" => "markertitle",
            "value" => '',
            "group" => esc_html__("Marker", 'pixi'),
            "description" => esc_html__('Enter Title Info windows for marker', 'pixi')
        ),
        array(
            "type" => "textarea",
            "heading" => esc_html__('Marker Description', 'pixi'),
            "param_name" => "markerdesc",
            "value" => '',
            "group" => esc_html__("Marker", 'pixi'),
            "description" => esc_html__('Enter Description Info windows for marker', 'pixi')
        ),
        array(
            "type" => "attach_image",
            "heading" => esc_html__('Marker Icon', 'pixi'),
            "param_name" => "markericon",
            "value" => '',
            "group" => esc_html__("Marker", 'pixi'),
            "description" => esc_html__('Select image icon for marker', 'pixi')
        ),
        array(
            "type" => "textarea_raw_html",
            "heading" => esc_html__('Marker List', 'pixi'),
            "param_name" => "markerlist",
            "value" => '',
            "group" => esc_html__("Multiple Marker", 'pixi'),
            "description" => esc_html__('[{"coordinate":"41.058846,-73.539423","icon":"","title":"title demo 1","desc":"desc demo 1"},{"coordinate":"40.975699,-73.717636","icon":"","title":"title demo 2","desc":"desc demo 2"},{"coordinate":"41.082606,-73.469718","icon":"","title":"title demo 3","desc":"desc demo 3"}]', 'pixi')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Info Window Max Width', 'pixi'),
            "param_name" => "infowidth",
            "value" => '200',
            "group" => esc_html__("Marker", 'pixi'),
            "description" => esc_html__('Set max width for info window', 'pixi')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Map Type", 'pixi'),
            "param_name" => "type",
            "value" => array(
                "ROADMAP" => "ROADMAP",
                "HYBRID" => "HYBRID",
                "SATELLITE" => "SATELLITE",
                "TERRAIN" => "TERRAIN"
            ),
            "description" => esc_html__('Select the map type.', 'pixi')
        ),
        array(
            "type" => "dropdown",
            "heading" => esc_html__("Style Template", 'pixi'),
            "param_name" => "style",
            "value" => array(
                "Default" => "",
                "Subtle Grayscale" => "Subtle-Grayscale",
                "Shades of Grey" => "Shades-of-Grey",
                "Blue water" => "Blue-water",
                "Pale Dawn" => "Pale-Dawn",
                "Blue Essence" => "Blue-Essence",
                "Apple Maps-esque" => "Apple-Maps-esque",
            ),
            "group" => esc_html__("Map Style", 'pixi'),
            "description" => 'Select your heading size for title.'
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Zoom', 'pixi'),
            "param_name" => "zoom",
            "value" => '13',
            "description" => esc_html__('zoom level of map, default is 13', 'pixi')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Width', 'pixi'),
            "param_name" => "width",
            "value" => 'auto',
            "description" => esc_html__('Width of map without pixel, default is auto', 'pixi')
        ),
        array(
            "type" => "textfield",
            "heading" => esc_html__('Height', 'pixi'),
            "param_name" => "height",
            "value" => '350px',
            "description" => esc_html__('Height of map without pixel, default is 350px', 'pixi')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Scroll Wheel', 'pixi'),
            "param_name" => "scrollwheel",
            "value" => array(
                esc_html__("Yes, please", 'pixi') => true
            ),
            "group" => esc_html__("Controls", 'pixi'),
            "description" => esc_html__('If false, disables scrollwheel zooming on the map. The scrollwheel is disable by default.', 'pixi')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Pan Control', 'pixi'),
            "param_name" => "pancontrol",
            "value" => array(
                esc_html__("Yes, please", 'pixi') => true
            ),
            "group" => esc_html__("Controls", 'pixi'),
            "description" => esc_html__('Show or hide Pan control.', 'pixi')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Zoom Control', 'pixi'),
            "param_name" => "zoomcontrol",
            "value" => array(
                esc_html__("Yes, please", 'pixi') => true
            ),
            "group" => esc_html__("Controls", 'pixi'),
            "description" => esc_html__('Show or hide Zoom Control.', 'pixi')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Scale Control', 'pixi'),
            "param_name" => "scalecontrol",
            "value" => array(
                esc_html__("Yes, please", 'pixi') => true
            ),
            "group" => esc_html__("Controls", 'pixi'),
            "description" => esc_html__('Show or hide Scale Control.', 'pixi')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Map Type Control', 'pixi'),
            "param_name" => "maptypecontrol",
            "value" => array(
                esc_html__("Yes, please", 'pixi') => true
            ),
            "group" => esc_html__("Controls", 'pixi'),
            "description" => esc_html__('Show or hide Map Type Control.', 'pixi')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Street View Control', 'pixi'),
            "param_name" => "streetviewcontrol",
            "value" => array(
                esc_html__("Yes, please", 'pixi') => true
            ),
            "group" => esc_html__("Controls", 'pixi'),
            "description" => esc_html__('Show or hide Street View Control.', 'pixi')
        ),
        array(
            "type" => "checkbox",
            "heading" => esc_html__('Over View Map Control', 'pixi'),
            "param_name" => "overviewmapcontrol",
            "value" => array(
                esc_html__("Yes, please", 'pixi') => true
            ),
            "group" => esc_html__("Controls", 'pixi'),
            "description" => esc_html__('Show or hide Over View Map Control.', 'pixi')
        )
    )
));