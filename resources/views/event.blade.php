@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex flex-warp card m-3 mx-auto" style="width: fit-content; height: max-content;">
            <img src="{{ asset('storage'. $event->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-text">Pradžia: {{$event->start_date}}</p>
                <p class="card-text">{{$event->description}}</p>
            </div>
        </div>

        <div class="container">
            <form action="/registerevent" method="POST">
                @csrf
                <input type="hidden" id="events_id" name="events_id" value="{{$event->id}}">
                <div class="form-group">
                    <label for="name">Vardas</label>
                    <input name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone">Telefonas</label>
                    <input type="text" id="phone" name="phone" class="form-control" required>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary mt-3" type="submit">Siusti</button>
                </div>
            </form>
        </div>

        @if ($can)
            <div class="mt-3 d-flex flex-wrap">
                <table class="table table-dark">
                    <thead>
                        <tr class="table-dark w-100">
                            <th class="table-dark" scope="col">#</th>
                            <th class="table-dark" scope="col">Vardas</th>
                            <th class="table-dark" scope="col">Email</th>
                            <th class="table-dark" scope="col">Telefonas</th>
                        </tr class="table-dark">
                    </thead>
                    <tbody>
                        @foreach ($event->eventUsers as $user)
                            <tr class="table-dark">
                                <th class="table-dark" scope="row">{{$user->id}}</th>
                                <td class="table-dark">{{$user->name}}</td>
                                <td class="table-dark">{{$user->email}}</td>                                    
                                <td class="table-dark">{{$user->phone}}</td>
                                <td class="table-dark"><a href="/accept/event/{{$user->id}}/Priimtas" class="btn btn-primary">Patvirtinti</a></td>
                                <td class="table-dark"><a href="/accept/event/{{$user->id}}/Nepriimtas" class="btn btn-danger">Atmesti</a></td>
                            </tr class="table-dark">
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="w-100 flex">
                <a href="/update/{{$event->id}}" class="btn btn-primary mt-5">Atnaujinti</a>
            </div>
        @endif
    </div>
@endsection