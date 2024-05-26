<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="{{ asset('css\mainPage.css') }} " rel="stylesheet" />
    <link href="{{ asset('css\bootstrap.css') }} " rel="stylesheet" />
</head>
<body>
@include('layouts.header')
<div class="content-container">
<form action="{{ route('cinema.store') }}" method="post">
    @csrf
    <div class="form-group">
        <label for="name">Назва фільму:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="year">Рік виходу:</label>
        <input type="number" class="form-control" id="year" name="year">
    </div>
    <div class="form-group">
        <label for="genre">Жанр:</label>
        <select class="form-control" id="genre" name="genre">
            @foreach($genreList as $genre)
                <option> {{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="country">Країна</label>
        <input type="text" class="form-control" id="country" name="country">
    </div>
    <div class="form-group">
        <label for="image">Example file input</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <div class="form-group">
        <label for="description">Example textarea</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Створити</button>
</form>
</div>
</body>
</html>
