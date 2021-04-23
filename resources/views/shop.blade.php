@extends('layouts.app')
@section('contentRight')
    <div class="container" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-lg-10 " >

                <div class="row border">
                    @foreach($opinions as $opinion)

                        <div class="col w-75 h-75 border-bottom " align="center">

                                <h6 class="card-title">{{ $opinion->articleName }}</h6>
                                <div class="card-body">
                                <img src="/images/{{DB::table('users')->where('id', $opinion->userId)->first()->image_path}}"
                                     class="card-img w-25 h-25 rounded-circle"
                                     style="height: 150px; width: 150px;display: block;"
                                     alt="{{ DB::table('users')->where('id', $opinion->userId)->first()->image_path }}"
                                >


                                    <p>{{ $opinion->description }}</p>
                                    <p>by {{ DB::table('users')->where('id', $opinion->userId)->first()->name }}</p>
                                     <p>   {{$opinion->date}}</p>

                                </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('contentMid')
@endsection
@section('contentLeft')
@endsection
