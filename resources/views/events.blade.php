@extends('layouts.app')

@section('content')
    <div class="container d-flex flex-wrap">
        @foreach ($events as $event)
            <div class="flex card m-2" style="width: 18rem;">
                <img src="{{asset('storage'. $event->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-text">{{$event->description}}</p>
                    <a href="/event/{{$event->id}}" class="btn btn-primary">Ziureti</a>
                </div>
            </div>
        @endforeach
    </div>  
@endsection