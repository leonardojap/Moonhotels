<?php

namespace App\Providers;


class ProveedorService
{

    public function obtenerProveedores()
    {
        //Generate provedores con estos nombre HotelLegs, TravelDoorX, Speedia, HotelBeds
        $proveedores = [
            'HotelLegs' => [
                'url' => 'https://api.hotels.com/v1/booking',
                'key' => '1234567890'
            ],
            'TravelDoorX' => [
                'url' => 'https://api.traveldoorx.com/v1/booking',
                'key' => '1234567890'
            ],
            'Speedia' => [
                'url' => 'https://api.speedia.com/v1/booking',
                'key' => '1234567890'
            ],
            'HotelBeds' => [
                'url' => 'https://api.hotelbeds.com/v1/booking',
                'key' => '1234567890'
            ]
        ];

        return $proveedores;

    }

    public function buscarEnHotelLegs($params)
    {
        return [
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
                ],
                [
                    'room' => 2,
                    'meal' => 1,
                    'canCancel' => false,
                    'price' => 148.25
                ],
                [
                    'room' => 2,
                    'meal' => 2,
                    'canCancel' => false,
                    'price' => 165.38
                ]
            ]
        ];
    }

    public function buscarEnTravelDoorX($params)
    {
        return [
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
                ],
                [
                    'room' => 2,
                    'meal' => 1,
                    'canCancel' => false,
                    'price' => 148.25
                ],
                [
                    'room' => 2,
                    'meal' => 2,
                    'canCancel' => false,
                    'price' => 165.38
                ]
            ]
        ];
    }

    public function buscarEnSpeedia($params)
    {
        return [
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
                ],
                [
                    'room' => 2,
                    'meal' => 1,
                    'canCancel' => false,
                    'price' => 148.25
                ],
                [
                    'room' => 2,
                    'meal' => 2,
                    'canCancel' => false,
                    'price' => 165.38
                ]
            ]
        ];
    }

    public function buscarEnHotelBeds($params)
    {
        return [
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
                ],
                [
                    'room' => 2,
                    'meal' => 1,
                    'canCancel' => false,
                    'price' => 148.25
                ],
                [
                    'room' => 2,
                    'meal' => 2,
                    'canCancel' => false,
                    'price' => 165.38
                ]
            ]
        ];
    }

    
}
