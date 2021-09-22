<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityRequest;
use App\Http\Resources\ProductsResource;
use App\Http\Resources\ResponseResource;
use App\Models\Condition;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Services\Api;
use Facade\FlareClient\Http\Response;
use App\Caches\ApiCache;
use Illuminate\Support\Facades\Validator;

class RecommendationsController extends Controller
{
    public function __construct(ApiCache $apiCache)
    {
        $this->apiCache = $apiCache;
    }

    public function getRecommendations(Request $request)
    {
        return response()->json($this->apiCache->responseHandler($request->city),200);
    }
}
