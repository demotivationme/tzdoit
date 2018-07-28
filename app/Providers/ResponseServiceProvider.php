<?php
/**
 * Created by PhpStorm.
 * User: Alexandr Odarych
 */
namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Response::macro('success', function ($data) {
            return Response::json([
                'error'  => [
                    'status' => false,
                    'message' => ''
                ],
                'data' => $data,
            ]);
        });

        Response::macro('error', function ($message, $status = 400) {
            return Response::json([
                'error'  => [
                    'status' => true,
                    'message' => $message
                ]
            ], $status);
        });
    }
}
