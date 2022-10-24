<?php

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Routing\Controller;

class ApiMainServiceController extends Controller
{
    public function buses() 
    {
        return response()->json([
            'bus1' => [
                'name' => 'Hundaý New Super Aero Citi',
                'seats' => 27,
                'price' => 130,
                'byujet_price' => 80,
            ],
            'bus2' => [
                'name' => 'Iran-Hodro 0-457',
                'seats' => 34,
                'price' => 110,
                'byujet_price' => 70,
            ],
            'bus3' => [
                'name' => 'PAZ-32054',
                'seats' => 23,
                'price' => 85,
                'byujet_price' => 50,
            ],
        ]);
    }

    public function trucks() 
    {
        return response()->json([
            'truck1' => [
                'name' => 'KAMAZ-6520',
                'capacity' => 20,
                'price' => 130,
            ],
            'truck2' => [
                'name' => 'KAMAZ-65115',
                'capacity' => 15,
                'price' => 105,
            ],
            'truck3' => [
                'name' => 'KAMAZ-65117',
                'capacity' => 14,
                'price' => 115,
            ],
            'truck3' => [
                'name' => 'Mersedes Bens',
                'capacity' => 27,
                'price' => 160,
            ],
        ]);
    }

    public function order_truck(Request $request)
    {
        $validator = Validator::validate($request->all(),
        [
            // 'payment_type_id'=>'required|exists:payment_types,id',
            // 'amount'=>'required|regex:/^\d+(\.\d{1,2})?$/',
            // 'amount_used'=>'regex:/^\d+(\.\d{1,2})?$/',
            // // 'paying_way'=>'required|exists:paying_ways,id',
            // 'return_url' => 'required|url',
        ]);
         return $request->all();die;
       
    }



}
