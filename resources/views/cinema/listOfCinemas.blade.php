<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/listPage.css') }}">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" />
</head>
<body>
@include('layouts.header')
<div style="margin-bottom: 20px; text-align: center; margin-top:20px;">
    <a href="{{ route('cinema.createCinema') }}" class="btn btn-primary">Додати фільм</a>
</div>
<div class="content-container">

    @foreach($cinemaList as $cinema)
        <div class="movie-item">
            <div class="movie-rating">
                Фільм {{ $cinema->rating !== null ? $cinema->rating : '0.0' }}
                <a href="{{ route('edit.cinema', ['id' => $cinema->id]) }}">
                    <img src="/images/gear_icon.png" alt="Edit" style="max-width: 25px; max-height: 25px;">
                </a>
                <a href="{{ route('delete.cinema', ['id' => $cinema->id]) }}">
                    <img src="/images/trashcan.png" alt="Edit" style="max-width: 25px; max-height: 25px;">
                </a>
            </div>
            <img src="{{ asset('storage/images/' . $cinema->photo) }}" alt="Cinema Image" style="max-width: 200px; margin-top: 10px;">
            <div class="movie-info">
                <h3> {{ $cinema->name }}</h3>
                <p>  {{ $cinema->year }}</p>
            </div>
        </div>
    @endforeach
        <div class="pagination">
            {{ $cinemaList->links() }}
        </div>
</div>

</body>
</html>
