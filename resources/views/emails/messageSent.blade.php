<html>
	<body>
		<head>
			<style>
				.text-muted { color: #777; }
				.article {
					position: relative;
					padding: 5px;
					text-align: justify;
					background-color: white;
				}
				.article-image {
					height: 70px;
					width: auto;
					display: inline-block;
					float: left;
					padding: 0px 10px;
				}
			</style>
		</head>
		
		<div>
			<strong>Mesajul dvs. va fi procesat in cel mai scurt timp posibil. Va multumim pentru rabdare.</strong>
			<br>
			<br>
			Pana la procesarea mesajului, va invitam sa aruncati o privire peste ultimele stiri din domeniul reciclarii.
			<br>
			<br>	
			@foreach($news as $news_item)
				<div class="article">
					<!-- <img class="article-image" src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/news/'.$news_item['id'].'.jpg'))) }}"> -->
					<strong>{{ $news_item['title'] }}</strong>
					<br>
					<div style="word-wrap: break-word;">
						{{ substr($news_item['text'], 0, 300) }}...
					</div>
					<div style="background-color: white; box-sizing:border-box; bottom:0px; left:0; right:0; padding: 5px; text-align: center;">
						<a style="display: inline-block; background-color: green; padding: 5px; border-radius: 3px; color: white; cursor: pointer;" href="{{ $news_item['url'] }}">
							Citeste mai mult...
						</a>
					</div>
				</div>
			@endforeach
			<br>
			<br>
			<p>Va multumim ca apelati serviciile {{ $company->name }}.</p>
			<p class="text-muted">{{ $company->email }}</p>
			<p class="text-muted">{{ $company->phone }}</p>
			<p class="text-muted">{{ $company->adress }}</p>
		</div>
	</body>
</html>