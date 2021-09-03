<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\VehicleFee;
use App\Models\VehicleMedia;
use App\Models\VehicleEquipment;

class carListController extends Controller
{
    public function detail(Request $request, $id){

        $vehilce_details = Vehicle::where('id', $id)->first();
        $vehilce_fee = VehicleFee::where('vehicle_id', $id)->first();
        $vehicle_equipment = VehicleEquipment::where('vehicle_id', $id)->first();
        $vehicle_medias = VehicleMedia::where('vehicle_id', $id)->orderBy('car_path', 'ASC')->get();
        //dd($vehilce_details);
        return view('frontend.pages.car.detail', [
           'vehilce_details'   => $vehilce_details,
           'vehilce_fee'       => $vehilce_fee,
           'vehicle_equipment' => $vehicle_equipment,
           'vehicle_medias'     => $vehicle_medias,
        ]);
    }
}
