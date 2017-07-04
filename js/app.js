jQuery(document).foundation()

jQuery(function() {

	jQuery('iframe').wrap('<div class="responsive-embed"></div>');

	var room = jQuery('#planit').attr('data-room'),
		panoIt = jQuery('#tour').attr('data-room');

	switch(room) {
		case 'Artists Room Planner':
			var roomName = 'artists-room';
			jQuery('#tour').hide();
			jQuery('#planner').attr('data-room', roomName);
			roomPlanner(roomName);
		break;
		case 'Balcony Room Planner':
			var roomName = 'balcony';
			jQuery('#tour').hide();
			jQuery('#planner').attr('data-room', roomName);
			roomPlanner(roomName);
		break;
		case 'Bertrand Russell Room Planner':
			var roomName = 'bertrand-russell-room';
			jQuery('#tour').hide();
			jQuery('#planner').attr('data-room', roomName);
			roomPlanner(roomName);
		break;
		case 'Brockway Room Planner':
			var roomName = 'brockway-room';
			jQuery('#tour').hide();
			jQuery('#planner').attr('data-room', roomName);
			roomPlanner(roomName);
		break;
		case 'Club Room Planner':
			var roomName = 'club-room';
			jQuery('#tour').hide();
			jQuery('#planner').attr('data-room', roomName);
			roomPlanner(roomName);
		break;
		case 'Foyer Room Planner':
			var roomName = 'foyer';
			jQuery('#tour').hide();
			jQuery('#planner').attr('data-room', roomName);
			roomPlanner(roomName);
		break;
		case 'Main Hall Room Planner':
			var roomName = 'main-hall';
			jQuery('#tour').hide();
			jQuery('#planner').attr('data-room', roomName);
			roomPlanner(roomName);
		break;
	}

	switch(panoIt) {
		case 'Artists Room 360 Degree Tour':
			var roomName = 'artists-room';
			runTour(roomName);
		break;
		case 'Bertrand Russell Room 360 Degree Tour':
			var roomName = 'bertrand-russell-room';
			runTour(roomName);
		break;
		case 'Brockway Room 360 Degree Tour':
			var roomName = 'brockway-room';
			runTour(roomName);
		break;
		case 'Club Room 360 Degree Tour':
			var roomName = 'club-room';
			runTour(roomName);
		break;
		case 'Foyer 360 Degree Tour':
			var roomName = 'foyer';
			runTour(roomName);
		break;
		case 'Foyer (Open Doors) 360 Degree Tour':
			var roomName = 'foyer';
			runTour(roomName);
		break;
		case 'Main Hall 360 Degree Tour':
			var roomName = 'main-hall';
			runTour(roomName);
		break;
		case 'Library 360 Degree Tour':
			var roomName = 'library';
			runTour(roomName);
		break;
	}

	jQuery('#other').on('click', '.pano', function() {
		var roomName = jQuery(this).attr('data-room');
		jQuery('#controls').hide().html('');
		jQuery('#planit').hide();
		runTour(roomName);
		jQuery('#planner').addClass('planner').removeClass('pano').html('<i class="ch-object-group"></i> Room Planner');
	});

	jQuery('#other').on('click', '.planner', function() {
		var roomName = jQuery(this).attr('data-room');
		jQuery('#tour').hide();
		roomPlanner(roomName);
		jQuery('#planner').addClass('pano').removeClass('planner').html('<i class="ch-loop2"></i> 360&deg; View');
	});

	jQuery('#planit').append('<div id="base"><img src="/wp-content/themes/conway-hall/planit/'+roomName+'/floorplans/base.jpg" alt="base" width="881" height="600"></div>');

	var url = '/wp-content/themes/conway-hall/planit/'+roomName+'/'+roomName+'.js';

	if (element_exists('#holbornStation')){
		holBorn();
	}
	if (element_exists('#chanceryStationC')){
		chanceryL();
	}
	if (element_exists('#russellSquareP')){
		russellS();
	}
	if (element_exists('#bikestation')){
		bikes();
	}
	if (element_exists('#busStops')){
		bus();
	}

	jQuery('.metaData a[href*="#"]:not([href="#"])').click(function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = jQuery(this.hash);
			target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
			if (target.length) {
				jQuery('html, body').animate({
					scrollTop: target.offset().top
				}, 1500);
				return false;
			}
		}
	});

});

function chanceryL() {
	var line = 'central',
		station = '940GZZLUCHL';
	lineStation(line, station);
	jQuery('#map')
		.gmap3({
			center: [51.5196682, -0.12053935],
			zoom: 13,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		})
		.route({
			origin: "Conway Hall, 25 Red Lion Square, London, WC1R 4RL",
			destination: "Chancery Lane Station",
			travelMode: google.maps.DirectionsTravelMode.WALKING
		})
		.directionsrenderer(function (results) {
			if (results) {
				return {
					panel: "#box",
					directions: results
				}
			}
	});
	jQuery('h3').on('click', 'a', function(){
		var line = jQuery(this).data('line'),
			station = '940GZZLUHBN';
		jQuery('h3 a').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('#tube').html('<div class="loading"><img src="/wp-content/themes/conway-hall/images/ripple.svg"></div>');
		lineStation(line, station);
	});
}

function holBorn() {
	var line = 'central',
		station = '940GZZLUHBN';
	lineStation(line, station);
	jQuery('#map')
		.gmap3({
			center: [51.5196682, -0.12053935],
			zoom: 13,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		})
		.route({
			origin: "Conway Hall, 25 Red Lion Square, London, WC1R 4RL",
			destination: "Holborn Station",
			travelMode: google.maps.DirectionsTravelMode.WALKING
		})
		.directionsrenderer(function (results) {
			if (results) {
				return {
					panel: "#box",
					directions: results
				}
			}
	});
	jQuery('h3').on('click', 'a', function(){
		var line = jQuery(this).data('line'),
			station = '940GZZLUHBN';
		jQuery('h3 a').removeClass('active');
		jQuery(this).addClass('active');
		jQuery('#tube').html('<div class="loading"><img src="/wp-content/themes/conway-hall/images/ripple.svg"></div>');
		lineStation(line, station);
	});
}

function russellS() {
	var line = 'piccadilly',
		station = '940GZZLURSQ';
	lineStation(line, station)
	jQuery('#map')
		.gmap3({
			center: [51.5196682, -0.12053935],
			zoom: 13,
			mapTypeId : google.maps.MapTypeId.ROADMAP
		})
		.route({
			origin: "Conway Hall, 25 Red Lion Square, London, WC1R 4RL",
			destination: "Russell Square Station",
			travelMode: google.maps.DirectionsTravelMode.WALKING
		})
		.directionsrenderer(function (results) {
			if (results) {
				return {
					panel: "#box",
					directions: results
				}
			}
	});
}

function bikes() {
	var url = 'https://api.tfl.gov.uk/BikePoint/BikePoints_23?app_id=50f340a3&app_key=134e1070a9fcd049dc9eac599fff811a';
	jQuery.getJSON(url, function(data){
		jQuery('#name').html('<h4 class="label BikePoint">'+data.commonName+'</h4>');
		jQuery('#available').html(data.additionalProperties[6].value),
		jQuery('#empty').html(data.additionalProperties[7].value);
		jQuery('#total').html(data.additionalProperties[8].value);
		var d = new Date(data.additionalProperties[8].modified),
			dformat = [ '<h6>Santander Cycles data supplied at ' + (d.getMonth()+1).padLeft(),
			d.getDate().padLeft(),
			d.getFullYear()].join('/')+
			' at ' +
			[ d.getHours().padLeft(),
			d.getMinutes().padLeft() + ' by Transport for London</h6>'].join(':');
		jQuery('#date').html(dformat);
		jQuery('#map')
			.gmap3({
				center: [51.5194354,-0.1191233],
				zoom: 13,
				mapTypeId : google.maps.MapTypeId.ROADMAP
			})
			.route({
				origin: "Conway Hall, 25 Red Lion Square, London, WC1R 4RL",
				destination: [51.5194354,-0.1191233],
				travelMode: google.maps.DirectionsTravelMode.WALKING
			})
			.directionsrenderer(function (results) {
				if (results) {
					return {
						panel: "#box",
						directions: results
					}
				}
		});
	});
}

function bus() {
	var center = [51.5196682, -0.1183506];
	jQuery('#map')
		.gmap3({
			center: center,
			zoom: 16,
		})
		.circle({
			center: center,
			radius : 330,
			strokeColor : '#136972',
			fillColor: '#fff'
		})
		.marker({
			position: center,
		});
	var bus = 'https://api.tfl.gov.uk/Stoppoint?lat=51.5196682&lon=-0.1183506&stoptypes=NaptanPublicBusCoachTram&radius=300&app_id=50f340a3&app_key=134e1070a9fcd049dc9eac599fff811a';
	jQuery.getJSON(bus, function(data){
		var stop = '';
		jQuery.each(data.stopPoints, function(i,a) {
			jQuery('#map').gmap3().marker([
				{
					position:[a.lat, a.lon],
					icon: 'http://maps.google.com/mapfiles/marker_green.png',
					naptan: a.naptanId
				},
			])
			.on('click', function(marker){
				var stopID = a.stationNaptan,
					stopName = a.indicator,
					commonName = a.commonName,
					naptanId = a.naptanId,
					stop = 'https://api.tfl.gov.uk/StopPoint/'+stopID+'?app_id=50f340a3&app_key=134e1070a9fcd049dc9eac599fff811a';
				jQuery.getJSON(stop, function(data) {
					var line = '<div class="row"><div class="small-12 columns"><h3 class="label Central Line">' + commonName + ' ' + stopName + '</h3></div></div>';
					jQuery.each(data.lines, function(i,a) {
						line += '<div class="row"><div class="small-12 columns"><a data-arrivals="'+a.name+'" data-stop="'+naptanId+'" class="getBus"><i class="ch-bus"></i> '+a.name+'</a></div></div>';
					});
					jQuery('#lines').html(line);
					jQuery('.getBus').on('click', function(){
						jQuery('.getBus').removeClass('active');
						jQuery(this).addClass('active');
						var line = jQuery(this).data('arrivals'),
							station = jQuery(this).data('stop');
						busStop(line, station);
						jQuery('#tube').html('<div class="loading"><img src="/wp-content/themes/conway-hall/images/ripple.svg"></div>')
					});
				});
				marker.setIcon('http://maps.google.com/mapfiles/marker_grey.png');
			});
		});
	});
}

function lineStation(line, station) {
	jQuery.connection.hub.url = "https://push-api.tfl.gov.uk/signalr/hubs/signalr";
	var hub = jQuery.connection.predictionsRoomHub;
	hub.client.showPredictions = updateBoard;
	jQuery.connection.hub.start()
		.done(function() {
	console.log("tfl.predictions: connection started");
	var lineRooms = [{ "LineId": line, "NaptanId": station }];
	hub.server.addLineRooms(lineRooms)
		.done(function () {
			return;
		})
		.fail(function (error) {
			return;
		});
	});
	function updateBoard(data) {
		jQuery('#tube').empty();
		jQuery('#tube').append('<div class="row"><div class="small-9 medium-9 large-9 columns"><h5>Information automatically updates</h5></div></div>');
		data.sort(sortByTts);
		jQuery.each(data, function( index, prediction ) {
			var mins = Math.floor(prediction.TimeToStation/60);
			var due = mins === 0 ? "Due" : mins + "m";
			jQuery('#tube').append('<div class="row"><div class="small-9 medium-4 large-4 columns">' + prediction.Towards + '</div><div class="small-3 medium-2 large-2 columns">' + due + '</div><div class="small-12 medium-3 large-3 columns show-for-medium">' + prediction.CurrentLocation + '</div><div class="small-12 medium-3 large-3 columns show-for-medium">' + prediction.PlatformName + '</div></div>');
		});
		return true;
	};
	function sortByTts(a, b) {
		return ((a.TimeToStation < b.TimeToStation) ? -1 : ((a.TimeToStation > b.TimeToStation) ? 1 : 0));
	};
}

function busStop(line, station) {
	jQuery.connection.hub.url = "https://push-api.tfl.gov.uk/signalr/hubs/signalr";
	var hub = jQuery.connection.predictionsRoomHub;
	hub.client.showPredictions = updateBoard;
	jQuery.connection.hub.start()
		.done(function() {
	console.log("tfl.predictions: connection started");
	var lineRooms = [{ "LineId": line, "NaptanId": station }];
	hub.server.addLineRooms(lineRooms)
		.done(function () {
			return;
		})
		.fail(function (error) {
			return;
		});
	});
	function updateBoard(data) {
		jQuery('#tube').empty();
		jQuery('#tube').append('<div class="row"><div class="small-9 medium-9 large-9 columns"><h5>Information automatically updates</h5></div></div>');
		data.sort(sortByTts);
		jQuery.each(data, function( index, prediction ) {
			var mins = Math.floor(prediction.TimeToStation/60);
			var due = mins === 0 ? "Due" : mins + "m";
			jQuery('#tube').append('<div class="row"><div class="small-9 medium-9 large-9 columns">' + prediction.Towards + '</div><div class="small-3 medium-3 large-3 columns show-for-medium">' + due + '</div></div>');
		});
		return true;
	};
	function sortByTts(a, b) {
		return ((a.TimeToStation < b.TimeToStation) ? -1 : ((a.TimeToStation > b.TimeToStation) ? 1 : 0));
	};
}


function roomPlanner(roomName) {

	jQuery('#controls').show();
	jQuery('#planit').show();

	var json = '/wp-content/themes/conway-hall/planit/'+roomName+'/'+roomName+'.js';

	jQuery.getJSON(json, function(data){

		jQuery('.page-title').html(data.name+' Room Planner');

		var layout = '<ul class="menu vertical" id="layouts">';
		layout += '<li class="menu-text">Layouts & Capacities</li>';

		jQuery.each(data.rooms, function(i,a) {
			layout += '<li><a data-overlay="'+a.overlay+'"><i class="ch-object-group"></i> '+a.name+' ('+a.capacity+')</a></li>';
		});

		layout += '<li class="active"><a id="clearIt"><i class="ch-ban"></i> Clear</a></li>';
		layout += '</ul>';

		var options = '<br /><ul class="menu vertical" id="options">';
		options += '<li class="menu-text">Options</li>';

		jQuery.each(data.options, function(i,a) {
			options += '<li class="inactive"><a data-overlay="'+a.overlay+'"><i class="'+a.icon+'"></i> '+a.name+'</a></li>';
		});

		options += '<li class="active"><a id="clearIt"><i class="ch-ban"></i> Clear</a></li>';
		options += '</ul>';

		jQuery('#controls').append(layout+options);

		jQuery('#layouts').on('click', 'a', function(e){
			e.preventDefault();
			jQuery('#layouts li').removeClass('active');
			jQuery(this).parent().addClass('active');
			if(jQuery(this).attr('id') == 'clearIt') {
				jQuery('#overlay').remove();
			} else {
				jQuery('#overlay').remove();
				var overlay = jQuery(this).attr('data-overlay');
				jQuery('#planit').append('<div id="overlay"><img src="/wp-content/themes/conway-hall/planit/'+roomName+'/floorplans/'+overlay+'.svg"></div>');
			}
		});

		jQuery('#options').on('click', '.inactive a', function(e){
			e.preventDefault();
			jQuery(this).parent().addClass('active').removeClass('inactive');
			if(jQuery(this).attr('id') == 'clearIt') {
				jQuery('.overlay').remove();
				jQuery('#options li').removeClass('active').addClass('inactive');
			} else {
				var overlay = jQuery(this).attr('data-overlay');
				jQuery('#planit').append('<div class="overlay '+overlay+'"><img src="/wp-content/themes/conway-hall/planit/'+roomName+'/floorplans/'+overlay+'.svg"></div>');
			}
		});

		jQuery('#options').on('click', '.active a', function(e){
			e.preventDefault();
			if(jQuery(this).attr('id') == 'clearIt') {
				jQuery('.overlay').remove();
				jQuery('#options li').removeClass('active').addClass('inactive');
			} else {
				var overlayRemove = jQuery(this).attr('data-overlay');
				jQuery(this).parent().removeClass('active').addClass('inactive');
				jQuery('.overlay.'+overlayRemove).remove();
			}
		});
	});
}

function runTour(roomName) {
	jQuery('#tour').show();
	jQuery('#planner').addClass('planner').removeClass('pano');
	embedpano({
		swf: '/wp-content/themes/conway-hall/planit/global/js/tour.swf',
		xml: '/wp-content/themes/conway-hall/planit/'+roomName+'/tour/tour.xml',
		target: "tour",
		html5: "prefer",
		passQueryParameters: true
	});
}

function exists(data) {
	if(!data || data==null || data=='undefined' || typeof(data)=='undefined') return false;
	else return true;
}

function element_exists(id){
	if(jQuery(id).length > 0){
		return true;
	}
	return false;
}

Number.prototype.padLeft = function(base,chr){
	var  len = (String(base || 10).length - String(this).length)+1;
	return len > 0? new Array(len).join(chr || '0')+this : this;
}