<html>
	<body>
		<h1>Ati primit o noua comanda de la {{ $order['company'] }}, solicitare facuta de {{ $order['name'] }}</h1>
		<p>
			Detalii: {{ $order['details'] }}
		</p>
		<br>
		<p>
			Adresa: {{ $order['adress'] }}
		</p>
		<p>
			Disponibilitate recoltare: {{ $order['time'] }}
		</p>
		<p>
			Telefon: {{ $order['phone'] }}
		</p>
		<p>
			Email: {{ $order['email'] }}
		</p>
	</body>
</html>