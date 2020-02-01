@php
	$nav_items = [
		['name' => 'DESPRE NOI', 'url' => route('company.index')],
		['name' => 'SERVICII', 'url' => route('services.index')],
		['name' => 'LEGISLATIE', 'url' => route('legislation.index')],
		['name' => 'RECICLEAZA', 'url' => route('orders.create')],
		['name' => 'CONTACT', 'url' => route('contact-us.index')],
	];
	function isActiveNavItem($url){
		return (Request::url() === $url ? 'active' : '');
	}
@endphp

<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content=""/>
		<link rel="stylesheet" href='/css/app.css'>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
		<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
			integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
			crossorigin=""/>
		<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
			integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
			crossorigin=""></script>
		<title> Reciclare DEEE </title>
		<style>

		</style>
	</head>
	
	<body>
		<div class="app-wrapper d-flex flex-column" style="min-height:100%; background-image: url('/bg_app.png')">
			@component('components.navbar', ['company'=>$company, 'navItems'=>$nav_items])
			@endcomponent
			
			@component('components.breadcrumb', ['page' => $page ?? null])
			@endcomponent
			
			@yield('content')

			@component('components.footer', ['news'=>$news ?? [], 'company'=>$company, 'navItems'=>$nav_items])
			@endcomponent
			
			<div>
				<img id="image" src="">
			</div>
		</div>
		
		<script src="/js/app.js"></script>
		<script>
			$(document).ready(function(){
				let mapDiv = $('#mapAPI');
				if (mapDiv && mapDiv[0]){
					var x, y;
					x = mapDiv[0].dataset.x;
					y = mapDiv[0].dataset.y;
					console.log({x,y})
					var map = L.map('mapAPI').setView([x, y], 15);
					L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
						attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
					}).addTo(map);				
					L.marker([x, y]).addTo(map)
						.bindPopup('Sediul nostru')
						.openPopup();
				}
			})
			
			$('#myCarousel').on('slide.bs.carousel', function () {
				$('#recycleButton').fadeOut(100)
				$('#recycleText').fadeOut(100)
				$('#recycleButton').fadeIn(1500, function(){
					$('#recycleText').fadeIn(1000)
				})
			})
			
			$('.prevent-multi-submit').submit(function(e)
			{
				$(e.target).find('.btn-with-spinner').prop('disabled', true);
			});
		</script>
	</body>
</html>