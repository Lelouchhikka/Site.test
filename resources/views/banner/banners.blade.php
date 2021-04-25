@extends('layouts.app')
<br>
@if($banners->isEmpty())
    <h2>No banners...</h2>
@else
    <ol>
        @foreach($banners as $banner)
            <li value="{{$banner->id}}" class="mt-3">
                <div class="card mb-3" >
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if($banner->image_path)
                                <img src="{{ Storage::url($banner->image_path) }}" >
                            @endif
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{$banner->name}}</h5>
                                <form action="{{route('banner.destroy', $banner)}}" method="post">
                                    @csrf @method('delete')
                                    <button class="btn btn-danger">Удалить баннер</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ol>
@endif
<a class="btn btn-success" href="{{route("banner.create")}}" role="button">Добавить баннер</a>
