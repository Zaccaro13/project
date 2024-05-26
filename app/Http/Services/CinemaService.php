<?php

namespace App\Http\Services;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Cinema;

class CinemaService
{
    public function findAll(): Collection
    {
        return Cinema::all();
    }

    public function findAllGenres(): Collection
    {
        return Genre::all();
    }

    public function create(Cinema $cinema): Cinema {
        return Cinema::create($cinema);
    }

    public function update(Cinema $cinema): Cinema {
        $updatedCinema = Cinema::find($cinema->id);
        return $updatedCinema->update($cinema);
    }

    public function findById(string $id) : ?Cinema
    {
        return Cinema::where('id', $id)->first();
    }
    public function delete(int $id)
    {
        $deletedCinema = Cinema::find($id);
        $deletedCinema->delete();
    }

    public function restore(int $id){
        $deletedCinema = Cinema::withTrashed()->find($id);
        $deletedCinema->restore();
    }
}

