@extends('layouts.app')
    <div class="badge bg-primary text-wrap" style="width: 6rem;">
        News
    </div>
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">

                @can('update', $news)
                    <form method="get" action="{{route('news.edit', $news)}}">
                        <button  class="text-gray-700"><i class="fas fa-pen"></i></button>
                    </form>
                @endcan
                @if($news->image_path)
                    @can('update', $news)
                        <form action="{{route('news.removeImage',$news)}}" method="post">
                            @csrf @method('put')
                            <button><i class="fas fa-photo-video text-red-700"></i></button>
                        </form>
                    @endcan
                @endif
                @can('delete', $news)
                    <form action="{{route('news.destroy', $news)}}" method="post">
                        @csrf @method('delete')
                        <button ><i class="fas fa-times text-red-700"></i></button>
                    </form>
                @endcan

            </div>

        </div>
        <div class="card-body">
            <p class="text-gray-500 text-muted">{{date("d M H:i", strtotime($news->created_at))}}</p>
            <h5 class="card-title">{{$news->title}}</h5>
            <p class="card-text mt-2">{{$news->text_content}}</p>
            @if($news->image_path)
                <img height="500px" class="card-img-top img-fluid img-thumbnail"  src="{{ Storage::url($news->image_path) }}" alt="Фото потерено" >
            @endif

            <p class="card-text"><small class="text-muted">Last updated: {{date("d M H:i", strtotime($news->updated_at))}}</small></p>
        </div>
    </div>
