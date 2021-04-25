@extends('layouts.app')
<br>
@if($news->isEmpty())
    <h2>No news...</h2>
@else
    <ol>
        @foreach($news as $item)
            <li value="{{$item->id}}" class="mt-3">
                <div class="card mb-3" >
                    <div class="row g-0">
                        <div class="col-md-4">
                            @if($item->image_path)
                                <img src="{{ Storage::url($item->image_path) }}" >
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

    <p>
        {{$news->withQueryString()->links()}}
    </p>
@endif
