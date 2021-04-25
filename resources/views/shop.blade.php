@extends('layouts.app')

<?php
$vacancies=$vacancies??null;
?>

@section('contentRight')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if(session()->get('locale')=='ru')
                    {{(App::setLocale('ru'))}}
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{__('Home ')}}</li>
                <li class="breadcrumb-item active"> <a href="{{route("category.list")}}">{{__('Categories')}}</a></li>
                <li class="breadcrumb-item active"> <a href="{{route("brand.list")}}">{{__('Brands')}}</a></li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>{{__("Products In Our Store")}}</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($products as $pro)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="/images/{{ $pro->image_path }}"
                                     class="card-img-top mx-auto"
                                     style="height: 150px; width: 150px;display: block;"
                                     alt="{{ $pro->image_path }}"
                                >
                                <div class="card-body">
                                    <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                                    <p>${{ $pro->price }}</p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                            <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> {{__("add to cart")}}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('contentMid')
<<<<<<< Updated upstream
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if(session()->get('locale')=='ru')
                    {{(App::setLocale('ru'))}}
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{__('Home ')}}</li>
                <li class="breadcrumb-item active"> <a href="{{route("category.list")}}">{{__('Categories')}}</a></li>
                <li class="breadcrumb-item active"> <a href="{{route("brand.list")}}">{{__('Brands')}}</a></li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>{{__("Products In Our Store")}}</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($products as $pro)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="/images/{{ $pro->image_path }}"
                                     class="card-img-top mx-auto"
                                     style="height: 150px; width: 150px;display: block;"
                                     alt="{{ $pro->image_path }}"
                                >
                                <div class="card-body">
                                    <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                                    <p>${{ $pro->price }}</p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                            <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> {{__("add to cart")}}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
=======

    <div class="card">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach($banners as $key=> $banner)
                    @if($key==0)
                        <div class="carousel-item active">
                            <img src="{{ Storage::url($banner->image_path) }}"  class="d-block w-100" alt="{{$banner->name}}">
                        </div>
                    @else
                        <div class="carousel-item">
                            <img src="{{ Storage::url($banner->image_path) }}"  class="d-block w-100" alt="{{$banner->name}}">
                        </div>
                    @endif

                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <h5 class="card-title mt-3 text-center">Halyk карьера</h5>
                        <ol>
                            @foreach($vacancies as $vacancy)
                                <li value="{{$vacancy->id}}" class="mt-3">
                                    <div class="card" style="width: 15rem;">
                                        <div class="card-body">
                                            <h6 class="card-title">{{$vacancy->title}}</h6>
                                            <p class="card-text" style="font-size: smaller">{{substr($vacancy->text_content, 0, 100)}}</p>
                                            <a href="{{route('vacancy.show', $vacancy)}}" class="card-link">Узнать больше</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ol>
                </div>
            </div>
            <div class="col">
                <ol>
                    @foreach($news as $item)
                        <li value="{{$item->id}}" class="mt-3">
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col">
                                        @if($item->image_path)
                                            <img src="{{ Storage::url($item->image_path) }}">
                                        @endif
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$item->title}}</h5>
                                            <p class="card-text">{{substr($item->text_content, 0, 100)}}</p>
                                            <a class="text-blue-600 hover:text-blue-800" href="{{route('news.show', $item)}}"><small>Читать далее -></small></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </div>

>>>>>>> Stashed changes
@endsection
@section('contentLeft')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                @if(session()->get('locale')=='ru')
                    {{(App::setLocale('ru'))}}
                @endif
                    <li class="breadcrumb-item active" aria-current="page">{{__('Home ')}}</li>
                    <li class="breadcrumb-item active"> <a href="{{route("category.list")}}">{{__('Categories')}}</a></li>
                    <li class="breadcrumb-item active"> <a href="{{route("brand.list")}}">{{__('Brands')}}</a></li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>{{__("Products In Our Store")}}</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($products as $pro)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="/images/{{ $pro->image_path }}"
                                     class="card-img-top mx-auto"
                                     style="height: 150px; width: 150px;display: block;"
                                     alt="{{ $pro->image_path }}"
                                >
                                <div class="card-body">
                                    <a href=""><h6 class="card-title">{{ $pro->name }}</h6></a>
                                    <p>${{ $pro->price }}</p>
                                    <form action="{{ route('cart.store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $pro->id }}" id="id" name="id">
                                        <input type="hidden" value="{{ $pro->name }}" id="name" name="name">
                                        <input type="hidden" value="{{ $pro->price }}" id="price" name="price">
                                        <input type="hidden" value="{{ $pro->image_path }}" id="img" name="img">
                                        <input type="hidden" value="{{ $pro->slug }}" id="slug" name="slug">
                                        <input type="hidden" value="1" id="quantity" name="quantity">
                                        <div class="card-footer" style="background-color: white;">
                                            <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> {{__("add to cart")}}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
