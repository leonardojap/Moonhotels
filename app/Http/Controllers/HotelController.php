<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\ProveedorService;


class HotelController extends Controller
{

    protected $proveedorService;

    public function __construct(ProveedorService $proveedorService)
    {
        $this->proveedorService = $proveedorService;
    }
    
    public function search(Request $request)
    {
        $params = $request->all();
        $proveedores = $this->proveedorService->obtenerProveedores();

        $respuestas = [];
        foreach ($proveedores as $proveedor => $datos) {
            switch ($proveedor) {
                case 'HotelLegs':
                    $respuestas[$proveedor] = $this->proveedorService->buscarEnHotelLegs($params);
                    break;
                case 'TravelDoorX':
                    $respuestas[$proveedor] = $this->proveedorService->buscarEnTravelDoorX($params);
                    break;
                case 'Speedia':
                    $respuestas[$proveedor] = $this->proveedorService->buscarEnSpeedia($params);
                    break;
                case 'HotelBeds':
                    $respuestas[$proveedor] = $this->proveedorService->buscarEnHotelBeds($params);
                    break;
            }
        }

        
        // Consolidar las respuestas
        $respuestaConsolidada = [
            'rooms' => [],
        ];
        foreach ($respuestas as $respuesta) {
            if (isset($respuesta['results']) && is_array($respuesta['results'])) {
                foreach ($respuesta['results'] as $result) {
                    $roomId = $result['room'];
                    $rate = [
                        'mealPlanId' => $result['meal'],
                        'isCancellable' => $result['canCancel'],
                        'price' => $result['price']
                    ];

                    // Buscar si la habitación ya existe en la respuesta consolidada
                    $roomIndex = array_search($roomId, array_column($respuestaConsolidada['rooms'], 'roomId'));

                    if ($roomIndex !== false) {
                        // Si la habitación ya existe, añadir la tarifa a la lista de tarifas
                        $respuestaConsolidada['rooms'][$roomIndex]['rates'][] = $rate;
                    } else {
                        // Si la habitación no existe, crear una nueva entrada
                        $respuestaConsolidada['rooms'][] = [
                            'roomId' => $roomId,
                            'rates' => [$rate]
                        ];
                    }
                }
            }
        }

        return response()->json($respuestaConsolidada);
    }
        
}
