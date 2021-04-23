@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            @if(session()->get('locale')=='ru')
                {{(App::setLocale('ru'))}}
            @endif
            <li class="breadcrumb-item active" aria-current="page"><a href="/">{{__('Home ')}}</a></li>
            <li class="breadcrumb-item active"aria-current="page">{{__('Categories')}}</li>
            <li class="breadcrumb-item active"> <a href="{{route("brand.list")}}">{{__('Brands')}}</a></li>
        </ol>
    </nav>
        <div class="row justify-content-center">
    <div class="col-lg-12">
    <div class="row">
        @foreach($categories as $pro)
            <div class="col-lg-3">
                <div class="card" style="margin-bottom: 20px; height: auto;">
                    <div class="card-body">
                        <h2 class="card-title">{{ $pro->name }}</h2>
                        <a href="{{route('category.chosed',['id'=>$pro->id])}}">{{__('watch')}}</a>


                    </div>
                </div>
            </div>
        @endforeach
    </div>
    </div>
    </div>
    </div>
@endsection
