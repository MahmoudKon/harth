<?php

namespace App\Http\Services;

use Exception;
use App\Models\Service;

class ServiceService
{
    public function handle($request, $id = null)
    {
        try {
            return Service::updateOrCreate(['id' => $id], $request);
        } catch (Exception $e) {
            return $e;
        }
    }
}
