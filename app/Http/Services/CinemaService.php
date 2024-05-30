<?php

namespace App\Http\Services;
use App\Http\Requests\ValidateRequest;
use App\Models\Genre;
use Brick\Math\BigInteger;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Cinema;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class CinemaService
{
    public function findAll()
    {
        return Cinema::paginate(20);
    }

    public function findAllGenres(): Collection
    {
        return Genre::all();
    }
    public function create(Request $request)
    {
        $request->validate((new ValidateRequest)->rules());
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('public/'); // Сохраняем изображение и получаем путь к нему
        }

        $cinema = new Cinema();

        $cinema->name = $request->input('name');
        $cinema->year = $request->input('year');
        $cinema->producer = $request->input('producer');
        $cinema->description = $request->input('description');
        $cinema->genre_id = $request->input('genre');
        $cinema->country = $request->input('country');
        $cinema->photo = $photoPath;
        $cinema->save();

        return $cinema;
    }

    public function storeUpdated(Request $request, $id)
    {
        $request->validate((new ValidateRequest)->rules());

        $cinema = Cinema::findOrFail($id);
        $cinema->name = $request->input('name');
        $cinema->producer = $request->input('producer');
        $cinema->year = $request->input('year');
        $cinema->genre_id = $request->input('genre');
        $cinema->country = $request->input('country');
        $cinema->description = $request->input('description');

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images', 'public');
            $fileName = str_replace('public//', '', $path);
            $fileName = str_replace('images/', '', $path);
            $cinema->photo = $fileName;
        }

        $cinema->save();
        return $cinema;
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

