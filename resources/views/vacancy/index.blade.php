@extends('layouts.app')

@if($vacancies->isEmpty())
    <h2>No vacancies...</h2>
    <a class="btn btn-primary" href="{{route("vacancy.create")}}" role="button">Добавить вакансию</a>

@else

    <ol>
        @foreach($vacancies as $vacancy)
            <li value="{{$vacancy->id}}" class="mt-3">
                <div class="card" >
                    <div class="card-body">
                        <h6 class="card-title">{{$vacancy->title}}</h6>
                        <p class="card-text" style="font-size: smaller">{{substr($vacancy->text_content, 0, 200)}}</p>
                        <a href="{{route('vacancy.show', $vacancy)}}" class="card-link">Узнать больше</a>
                    </div>
                </div>

            </li>
        @endforeach
    </ol>

    <a class="btn btn-primary" href="{{route("vacancy.create")}}" role="button">Добавить вакансию</a>

    <p>
        {{$vacancies->withQueryString()->links()}}
    </p>
@endif

