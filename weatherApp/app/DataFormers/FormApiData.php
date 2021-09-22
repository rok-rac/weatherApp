<?php

namespace App\DataFormers;

use App\Http\Resources\ProductsResource;
use App\Models\Condition;

class FormApiData
{
    public function formData($city,$forecastArray)
    {
        $data = [
            'city' => $city,
            'recommendations' => []
        ];
        $recommendations = [];
        foreach ($forecastArray as $weather) {
            $recommendations = [
                'weather_forecast' => $weather[1],
                'date' => $weather[0],
                'products' => ProductsResource::collection(Condition::byName($weather[1])->first()->products->random(2))
            ];
            array_push($data["recommendations"], $recommendations);
        }
        return $data;
    }
}
