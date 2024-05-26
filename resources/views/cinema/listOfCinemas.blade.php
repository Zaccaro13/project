<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Main Page</title>
    <link href="{{ asset('css\listPage.css') }} " rel="stylesheet" />
</head>
<body>
@include('layouts.header')
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
                <img src="movie1.jpg" alt="{{ $cinema->name }}">
                <div class="movie-info">
                    <h3> {{ $cinema->name }}</h3>
                    <p>  {{ $cinema->year }}</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>

