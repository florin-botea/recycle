<html>
	<body>
		<h1>Ati primit un mesaj de la {{ $msg['name'] }}</h1>
		<div>
			{{ $msg['text'] }}
		</div>
		<br>
		<p>
			Telefon: {{ $msg['phone'] }}
		</p>
	</body>
</html>