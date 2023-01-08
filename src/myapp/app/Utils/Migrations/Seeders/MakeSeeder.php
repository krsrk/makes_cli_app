<?php

namespace App\Utils\Migrations\Seeders;

use App\Models\MakeModel;
use App\Models\MakeModelVehicleType;
use App\Models\Makes;
use App\Models\MakeVehicleType;
use App\Models\ModelV;
use App\Models\VehicleType;
use App\Utils\Http\HttpClient;

class MakeSeeder
{
    public function run()
    {
        $http = new HttpClient();
        $request = $http->request('https://vpic.nhtsa.dot.gov/api/vehicles/getmodelsformakeyear/make/mercedes/modelyear/2022/vehicleType/truck?format=json')
            ->responseToArray();
        $makesResult = $request['Results'];
        $make = new Makes();
        $make->make_id = $makesResult[0]['Make_ID'];
        $make->make_name = $makesResult[0]['Make_Name'];
        $make->make_slug = 'mercedes';
        $make->created_at = date('Y-m-d H:i:s');
        $make->save();

        $vehicleType = new VehicleType();
        $vehicleType->vehicle_type_id = $makesResult[0]['VehicleTypeId'];
        $vehicleType->vehicle_type_name = $makesResult[0]['VehicleTypeName'];
        $vehicleType->vehicle_type_slug = 'truck';
        $vehicleType->created_at = date('Y-m-d H:i:s');
        $vehicleType->save();

        MakeVehicleType::insert([
            'make_id' => $make->id,
            'vehicle_type_id' => $vehicleType->id,
        ]);

        foreach ($makesResult as $mk) {
            $model = new ModelV();
            $model->model_id = $mk['Model_ID'];
            $model->model_name = $mk['Model_Name'];
            $model->model_year = '2022';
            $model->save();

            MakeModel::insert([
                'make_id' => $make->id,
                'model_id' => $model->id,
            ]);

            MakeModelVehicleType::insert([
                'make_id' => $make->id,
                'model_id' => $model->id,
                'vehicle_type_id' => $vehicleType->id,
            ]);
        }
    }
}