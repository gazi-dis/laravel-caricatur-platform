@extends('frontend.bolumler.theme')
@section('baslik','Anasayfa')
@section('content')
<!-- POrtfolio start -->
<section class="portfolio ">
    <div class="container">
        <div class="row mb-5">

        </div>
        <div class="row shuffle-wrapper portfolio-gallery">
            @foreach ($posts as $post)
            <div class="col-lg-4 col-6 mb-4 shuffle-item" data-groups="[&quot;design&quot;,&quot;illustration&quot;]">
                <div class="position-relative inner-box">
                    <div class="image position-relative ">
                        <img src="{{ $post->featured }}" alt="{{ $post->title }}" class="img-fluid w-100 d-block">
                        <a href="{{ $post->featured }}" data-lightbox="posts" data-title="{{ $post->title }}">
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="overlay-content">
                                        <h5 class="mb-0">{{ $post->title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
            
        </div>
    </div>
</section>
<section id="load-data"></section>
@if (count($posts)>0)
<div id="remove-row" class="text-center mb-5">
    <button id="btn-more"  onclick="loadmoredata({{ $post->id }})" class="btn btn-info">Daha Fazla Yükle</button>
</div>
@else
<div id="remove-row" class="text-center mb-5">
    <span>Görüntülenebilecek içerik yok</span>
</div>
@endif

<!-- Portfolio End -->
@endsection