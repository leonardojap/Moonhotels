<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Providers\ProveedorService;

class ProveedorServiceTest extends TestCase
{
    public function testBuscarEnHotelLegs()
    {
        $service = new ProveedorService();

        $params = [
            'destination' => 'test',
            'checkIn' => '2023-10-01',
            'checkOut' => '2023-10-10',
            'guests' => 2
        ];

        $response = $service->buscarEnHotelLegs($params);

        $this->assertArrayHasKey('results', $response);
        $this->assertCount(4, $response['results']);
        $this->assertEquals(1, $response['results'][0]['room']);
        $this->assertEquals(1, $response['results'][0]['meal']);
        $this->assertFalse($response['results'][0]['canCancel']);
        $this->assertEquals(123.48, $response['results'][0]['price']);
    }
}
