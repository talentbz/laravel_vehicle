<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB, Validator, Exception, Image;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Company;
use App\Models\Vehicle;
use App\Models\VehicleFee;
use App\Models\VehicleMedia;
use App\Models\VehicleEquipment;
use App\Models\Bulletin;

class dashboardController extends Controller
{
    public function index(Request $request){
        
        $vehicles = Vehicle::leftJoin('vehicle_fee', 'vehicle.id', '=', 'vehicle_fee.vehicle_id')
                            ->leftJoin('vehicle_media', 'vehicle.id', '=', 'vehicle_media.vehicle_id')
                            ->leftJoin('company_details', 'company_details.id', '=', 'vehicle.company_id')
                            ->leftJoin('users', 'company_details.user_id', '=', 'users.id')
                            ->groupBy('vehicle.id')
                            ->select('vehicle.*', 'vehicle_media.car_path', 'vehicle_fee.taxExc_price', 'vehicle_fee.taxInc_price', 'company_details.member', 'users.company_name')
                            ->orderBy('vehicle.created_at', 'desc')
                            ->get();    
              
        $bulletins = Bulletin::orderBy('created_at', 'DESC')->get();           
        
        return view('admin.pages.dashboard', [
            'vehicles' => $vehicles,
            'bulletins'  => $bulletins,
        ]);
    }

}
