<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Company;
use App\Models\CompanyMedia;
use App\Models\Vehicle;
use App\Models\VehicleFee;
use App\Models\VehicleMedia;
use App\Models\VehicleEquipment;

class companyIntro extends Controller
{
    public function index(Request $request){
        $company_infos = User::select('users.*', 'company_details.*','company_details.id as cd_id', 'company_media.*')
                             ->leftJoin('company_details', 'company_details.user_id', '=', 'users.id')
                             ->leftJoin('company_media', 'company_media.company_id', '=', 'company_details.id')
                             ->groupBy('company_details.id')
                             ->where('users.role', '=', 2)
                             ->get();
                             
        return view('frontend.pages.company.index', [
            'company_infos' => $company_infos,
        ]);
    }

    public function details(Request $request, $id){
        $company_infos = Company::leftJoin('users', 'company_details.user_id', '=', 'users.id')
                                ->leftJoin('company_media', 'company_media.company_id', '=', 'company_details.id')
                                ->groupBy('company_details.id')
                                ->where('company_details.id', '=', $id)
                                ->first();

        $vehicle_infos = Vehicle::where('vehicle.company_id', '=', $id)
                                ->leftJoin('vehicle_equipment', 'vehicle.id', '=', 'vehicle_equipment.vehicle_id')
                                ->leftJoin('vehicle_media', 'vehicle.id', '=', 'vehicle_media.vehicle_id')
                                ->leftJoin('vehicle_fee', 'vehicle.id', '=', 'vehicle_fee.vehicle_id')
                                //get string date to int
                                ->leftjoin(DB::raw('(SELECT vehicle.id As vhid, CONVERT(SUBSTR(start_year,-6,4), SIGNED) AS year FROM vehicle) AS date_c '), 'date_c.vhid', '=', 'vehicle.id' )
                                ->groupBy('vehicle.id');

        $filter = $request->query('filter');
        if (!empty($filter)) {
            if($filter == 'row_price') {
                $vehicle_infos = $vehicle_infos->orderby('vehicle_fee.taxExc_price', 'asc'); 
            } elseif ($filter == 'high_price'){
                $vehicle_infos = $vehicle_infos->orderby('vehicle_fee.taxExc_price', 'desc');
            } elseif ($filter == 'old_model_date') {
                $vehicle_infos = $vehicle_infos->orderby('vehicle.start_year', 'asc');
            } elseif ($filter == 'new_model_date') {
                $vehicle_infos = $vehicle_infos->orderby('vehicle.start_year', 'desc');
            } elseif ($filter == 'short_mileage') {
                $vehicle_infos = $vehicle_infos->orderby('vehicle.mileage', 'asc');
            } else {
                $vehicle_infos = $vehicle_infos->orderby('vehicle.mileage', 'desc');
            }
            $vehicle_infos = $vehicle_infos->paginate(8);
            
            if ($request->ajax()) {
                return view('frontend.pages.company.carlist', [
                    'vehicle_infos' => $vehicle_infos,
                ]); 
            }
        } else {
            $vehicle_infos  = $vehicle_infos->orderby('vehicle.id', 'desc')->paginate(8);
            if ($request->ajax()) {
                return view('frontend.pages.company.carlist', [
                    'vehicle_infos' => $vehicle_infos,
                ]); 
            }
        }  
        return view('frontend.pages.company.details', [
             'company_infos' => $company_infos,
             'vehicle_infos' => $vehicle_infos,
             'filter' => $filter,
        ]);
    }
}
