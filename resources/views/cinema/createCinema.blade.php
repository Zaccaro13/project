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
<form action="{{ route('cinema.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Назва фільму:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="producer">Режисер:</label>
        <input type="text" class="form-control" id="producer" name="producer" value="{{ old('producer') }}">
        @error('producer')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="year">Рік виходу:</label>
        <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}">
        @error('year')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="genre">Жанр:</label>
        <select class="form-control" id="genre" name="genre">
            @foreach($genreList as $genre)
                <option {{ old('genre') == $genre->id ? ' selected' : '' }}
                    value="{{ $genre->id }}"> {{ $genre->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="country">Країна</label>
        <input type="text" class="form-control" id="country" name="country" value="{{ old('country') }}">
        @error('country')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="image">Фото:</label>
        <input type="file" class="form-control-file" id="image" name="photo">
    </div>
    <div class="form-group">
        <label for="description">Опис:</label>
        <textarea class="form-control" id="description" name="description" rows="3" {{ old('description') }}></textarea>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Створити</button>
</form>
</div>
</body>
</html>
