<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class ExportRoutesToPostman extends Command
{
    protected $signature = 'export:routes-to-postman';
    protected $description = 'Export routes to a Postman collection JSON file';

    public function handle()
    {
        $routes = collect(Route::getRoutes())->map(function ($route) {
            return [
                'method' => $route->methods()[0],
                'uri' => $route->uri(),
                'action' => $route->getActionName(),
            ];
        });

        $postmanCollection = [
            'info' => [
                'name' => 'PermisAPI-v2',
                'schema' => 'https://schema.getpostman.com/json/collection/v2.1.0/collection.json'
            ],
            'item' => $routes->map(function ($route) {
                return [
                    'name' => $route['uri'],
                    'request' => [
                        'method' => $route['method'],
                        'header' => [],
                        'body' => [],
                        'url' => [
                            'raw' => '127.0.0.1:8000' . $route['uri'],
                            'host' => ['127.0.0.1:8000'],
                            'path' => explode('/', $route['uri'])
                        ],
                    ],
                ];
            })->toArray()
        ];

        file_put_contents('postman_collection.json', json_encode($postmanCollection, JSON_PRETTY_PRINT));

        $this->info('Routes have been exported to postman_collection.json');
    }
}
