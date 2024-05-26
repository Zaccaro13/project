<?php

namespace App\Http\Controllers;

use App\Http\Services\CinemaService;
use App\Models\Cinema;
use http\Env\Request;
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

    public function storeCinema(Request $request) //POST MAPPING
    {
        $cinema = $request->all();
        $this->cinemaService->create($cinema);
        return redirect()->route('/cinema/listOfCinemas');
    }

    public function editCinema($cinema)
    {
        $this->cinemaService->update($cinema);
        return view('cinema.editCinema');
    }

    public function deleteCinema($id)
    {
        $this->cinemaService->delete($id);
        return view('cinema.listOfCinemas');
    }

    public function restoreCinema($id)
    {
        $this->cinemaService->restore($id);
        dd('restored successfully');
    }

}
