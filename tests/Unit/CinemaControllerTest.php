<?php

namespace Tests\Unit;

use App\Http\Controllers\CinemaController;
use App\Http\Services\CinemaService;
use App\Models\Cinema;
use Illuminate\View\View;
use Tests\TestCase;
use Mockery;

class CinemaControllerTest extends TestCase
{
    public function test_list_of_cinemas_returns_view_with_data()
    {
        // Создаем фейковые данные
        $cinemas = [
            new Cinema(['name' => 'Test Cinema 1']),
            new Cinema(['name' => 'Test Cinema 2']),
        ];

        // Создаем мок CinemaService
        $cinemaServiceMock = Mockery::mock(CinemaService::class);
        $cinemaServiceMock->shouldReceive('findAll')
            ->once()
            ->andReturn($cinemas);

        // Создаем контроллер с подменённым сервисом
        $controller = new CinemaController($cinemaServiceMock);

        // Вызываем метод
        $response = $controller->listOfCinemas();

        // Проверяем, что возвращается view
        $this->assertInstanceOf(View::class, $response);
        $this->assertEquals('cinema.listOfCinemas', $response->name());
        $this->assertArrayHasKey('cinemaList', $response->getData());
    }
}
