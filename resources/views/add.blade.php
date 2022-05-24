@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/add" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Pavadinimas</label>
            <input type="text" id="title" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Aprasymas</label>
            <textarea name="description" id="description" cols="20" rows="6" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="date">Pradzia</label>
            <input type="date" id="date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Nuotrauka</label>
            <input type="file" id="image" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <button class="btn btn-success mt-2" type="submit">Prideti</button>
        </div>
    </form>
</div>

@endsection