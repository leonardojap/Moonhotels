<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Http\Controllers\HotelController;
use App\Providers\ProveedorService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HotelControllerTest extends TestCase
{
    use WithFaker, RefreshDatabase;
    protected $app;

    public function testSearch()
    {
        $proveedorServiceMock = $this->createMock(ProveedorService::class);
        $proveedorServiceMock->method('obtenerProveedores')->willReturn([
            'HotelLegs' => [],
            'TravelDoorX' => [],
            'Speedia' => [],
            'HotelBeds' => []
        ]);

        $proveedorServiceMock->method('buscarEnHotelLegs')->willReturn([
            'results' => [
                [
                    'room' => 1,
                    'meal' => 1,
                    'canCancel' => false,
                    'price' => 123.48
                ],
                [
                    'room' => 1,
                    'meal' => 1,
                    'canCancel' => true,
                    'price' => 150.00
                ]
            ]
        ]);

        // Utilizar el contenedor de servicios de Laravel para crear una instancia del controlador
        $this->app->instance(ProveedorService::class, $proveedorServiceMock);
        $controller = $this->app->make(HotelController::class);

        $request = new Request([
            'destination' => 'test',
            'checkIn' => '2023-10-01',
            'checkOut' => '2023-10-10',
            'guests' => 2
        ]);

        $response = $controller->search($request);
        $responseData = $response->getData(true);

        $this->assertArrayHasKey('rooms', $responseData);
        $this->assertCount(1, $responseData['rooms']);
        $this->assertEquals(1, $responseData['rooms'][0]['roomId']);
        $this->assertCount(2, $responseData['rooms'][0]['rates']);
    }
}
