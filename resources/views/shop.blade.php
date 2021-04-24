@extends('layouts.app')
@section('contentRight')
    <div class="container" style="margin-top: 80px">
        <div class="row justify-content-center">
            <div class="col-lg-9 " >

                <div class="row border w-100 p-2">
                    @foreach($opinions as $opinion)

                        <div class="col border-bottom " >
                            <div class="d-flex flex-row mg-0 p-0">
                            <img src="/images/{{DB::table('users')->where('id', $opinion->userId)->first()->image_path}}"
                                 class="card-img w-25 h-25 rounded-circle"
                                 style="height: 150px; width: 150px;display: block;"
                                 alt="{{ DB::table('users')->where('id', $opinion->userId)->first()->image_path }}"
                            >
                                <h5>{{DB::table('users')->where('id', $opinion->userId)->first()->name}}</h5>

                            </div>
                            <h6 >{{ $opinion->articleName }}</h6>
                                <div class=" d-flex flex-column ">
                                    <p>{{ $opinion->description }}</p>
                                     <p class="text-muted">   {{$opinion->date}}</p>

                                </div>
                        </div>
                    @endforeach
                </div>
                <div class="row border">
                @foreach($BDUsers as $user)
                    <div class="col  border-bottom " >
                        <h5>Дни рождения</h5>
                        <div class="d-flex flex-row justify-content-between">
                        <h6>{{ $user->name }}         </h6>

                            <p class="text-muted">{{ $user->BirthDay}}
                            </p>
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
