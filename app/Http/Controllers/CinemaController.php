<?php

namespace App\Http\Controllers;

use App\Http\Services\CinemaService;
use App\Models\Cinema;
use App\Models\Genre;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;

class CinemaController
{
    public function __construct(private CinemaService $cinemaService)
    {

    }
    public function listOfCinemas()
    {
        $cinemaList = $this->cinemaService->findAll();
        if (!$cinemaList) {
            abort(404, 'Cinemas not found');
        }
        return view('cinema.listOfCinemas', compact('cinemaList'));
    }

    public function cinemaInfo($id)
    {
        $cinema = $this->cinemaService->findById($id);

        if (!$cinema) {
            abort(404, 'Cinema not found');
        }

        return view('cinemaInfo', compact('cinema'));
    }



    public function createCinema() //GET MAPPING
    {
        $genreList = $this->cinemaService->findAllGenres();
        return view('cinema.createCinema', compact('genreList'));
    }

    public function storeCinema(Request $request)
    {
        $cinema = new Cinema();
        // Теперь передаем массив атрибутов в метод create
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images', 'public');
            $fileName = str_replace('public//', '', $path);
            $cinema->photo = $fileName;  // Сохранение пути к изображению в базу данных
        }
        $this->cinemaService->create($request);
        return redirect()->route('cinema.listOfCinemas');
    }

    public function editCinema(string $id) //GET MAPPING
    {
        $cinema = $this->cinemaService->findById($id);
        if (!$cinema) {
            return redirect()->back()->with('error', 'Cinema not found');
        }
        $genreList = $this->cinemaService->findAllGenres();
        return view('cinema.editCinema', compact('cinema', 'genreList'));
    }

    public function storeEditedCinema(Request $request, $id) //POST MAPPING
    {
        $this->cinemaService->storeUpdated($request, $id);
        return redirect()->route('cinema.listOfCinemas')->with('success', 'Cinema updated successfully');
    }

    public function deleteCinema($id)
    {
        $this->cinemaService->delete($id);
        return redirect()->route('cinema.listOfCinemas');
    }

    public function findAllCinemasByGenre($id)
    {
        $genre = Genre::find($id);
        $listOfCinemas = $genre->cinemas;
    }

    public function restoreCinema($id)
    {
        $this->cinemaService->restore($id);
        dd('restored successfully');
    }

}
