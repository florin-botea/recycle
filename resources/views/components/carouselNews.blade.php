@php
	function _cni($news_)
	{
		if ( count($news_) <= 1 ){
			return  'd-none';
		} elseif( count($news_) <= 3 ){
			return 'd-md-none d-md-initial';
		} else {
			return '';
		}
	}
	$news = $news->toArray();
	$chunked = array_chunk($news, 3);
@endphp
<div class="col-md">
	@admin
	<a class="d-block w-100 py-0 btn btn-light border border-secondary rounded" href="{{ route('news.create') }}" style="top:0;right:0">
		Editeaza <i class="fas fa-edit"></i>
	</a>
	@endadmin
	
	<div id="carouselNews" class="carousel slide d-none d-lg-block" data-ride="carousel" data-interval="3500">
		<div class="carousel-inner mb-5">
			@foreach($chunked as $chunk)
			<div class="carousel-item {{$loop->first ? 'active' : ''}}">
				<div class="row">
					@foreach($chunk as $news_item)
					<div class="col-4">
						<div class="article position-relative p-2 shadow overflow-hidden text-justify bg-white" style="height:270px;">
							<img class="d-inline-block float-left mr-2" style="height:70px; width:auto;" src="{{ asset('storage/'.$news_item['photo']) }}">
								<strong>{{$news_item['title']}}</strong>
								<br>
								{{$news_item['text']}}
							<div class="bg-white position-absolute text-center p-2" style="box-sizing:border-box; bottom:0px; left:0; right:0;">
								<a class="d-inline-block bg-success px-2 rounded text-white cursor-pointer" href="{{$news_item['url']}}" onclick="return confirm('Sunteti pe cale de a accesa o sursa externa actualei pagini. Sunteti sigur(a)?')">
									Citeste mai mult...
								</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			@endforeach
		</div>
		<a class="carousel-control-prev {{ _cni($news) }}" href="#carouselNews" role="button" data-slide="prev" style="width:20px;">
			<span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next {{ _cni($news) }}" href="#carouselNews" role="button" data-slide="next" style="width:20px;">
			<span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	
	<div id="carouselNewsMobile" class="carousel slide d-lg-none" data-ride="carousel" data-interval="3500">
		<div class="carousel-inner mb-5">
			@foreach($news as $news_item)
			<div class="carousel-item {{$loop->first ? 'active' : ''}}">
				<div class="row">
					<div class="col">
						<div class="article position-relative p-2 shadow overflow-hidden text-justify bg-white" style="height:270px;">
							<img class="d-inline-block float-left mr-2" style="height:70px; width:auto;" src="{{ asset('storage/'.$news_item['photo']) }}">
								<strong>{{$news_item['title']}}</strong>
								<br>
								{{$news_item['text']}}
							<div class="bg-white position-absolute text-center p-2" style="box-sizing:border-box; bottom:0px; left:0; right:0;">
								<a class="d-inline-block bg-success px-2 rounded text-white cursor-pointer" href="{{$news_item['url']}}" onclick="return confirm('Sunteti pe cale de a accesa o sursa externa actualei pagini. Sunteti sigur(a)?')">
									Citeste mai mult...
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<a class="carousel-control-prev {{ _cni($news) }}" href="#carouselNewsMobile" role="button" data-slide="prev" style="width:20px;">
			<span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next {{ _cni($news) }}" href="#carouselNewsMobile" role="button" data-slide="next" style="width:20px;">
			<span class="carousel-control-next-icon bg-dark" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>