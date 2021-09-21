<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductsResource;
use App\Http\Resources\ResponseResource;
use App\Models\Condition;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Services\Api;
use Facade\FlareClient\Http\Response;

class RecommendationsController extends Controller
{
    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    public function getRecommendations($city) { 
        return response()->json($this->api->responseHandler($city));
    }

}
