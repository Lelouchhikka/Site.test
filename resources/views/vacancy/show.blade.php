@extends('layouts.app')
<div class="badge bg-primary text-wrap" style="width: 6rem;">
    Vacancies
</div>
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">

            @can('delete', $vacancy)
                <form action="{{route('$vacancy.destroy', $vacancy)}}" method="post">
                    @csrf @method('delete')
                    <button ><i class="fas fa-times text-red-700"></i></button>
                </form>
            @endcan

        </div>

    </div>
    <div class="card-body">
        <p class="text-gray-500 text-muted">{{date("d M H:i", strtotime($vacancy->created_at))}}</p>
        <h5 class="card-title">{{$vacancy->title}}</h5>
        <p class="card-text mt-2">{{$vacancy->text_content}}</p>
    </div>
</div>
