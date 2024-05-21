<?php

namespace App\Http\Controllers;

use App\Http\Services\CinemaService;
use function PHPUnit\Framework\isEmpty;

class CinemaController
{
    public function __construct(private CinemaService $cinemaService)
    {

    }
    public function listOfCinemas()
    {
        dd($this->cinemaService->findAll());
    }

    public function cinemaInfo($name)
    {
        $cinema = $this->cinemaService->findByName($name);

        if (!$cinema) {
            return response()->json(['error' => 'Cinema not found'], 404);
        }

        return response()->json($cinema);
    }



    public function createCinema($cinema) //POST MAPPING
    {
        $this->cinemaService->create($cinema);
        return view('createCinema');
    }

    public function editCinema($cinema)
    {
        $this->cinemaService->update($cinema);
        return view('editCinema');
    }

    public function deleteCinema($id)
    {
        $this->cinemaService->delete($id);
        dd('deleted');
    }

    public function restoreCinema($id)
    {
        $this->cinemaService->restore($id);
        dd('restored successfully');
    }

}
