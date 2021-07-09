<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
use Auth;
use DB, Validator, Exception, Image;
use Illuminate\Support\Facades\URL;
use App\Models\User;
use App\Models\Company;
use App\Models\Vehicle;
use App\Models\VehicleFee;
use App\Models\VehicleMedia;
use App\Models\VehicleEquipment;
use Illuminate\Support\Facades\Storage;

class vehicleController extends Controller
{
    public function index(Request $request){
        $user_id = Auth::user()->id;
        $company = Company::where('user_id', $user_id)->first();
        if($company){
            $vehicle =  Vehicle::where('company_id', $company->id)->first();
            if($vehicle){
                $vehicle_infos = Vehicle::leftJoin('vehicle_fee', 'vehicle.id', '=', 'vehicle_fee.vehicle_id')
                                        ->leftJoin('vehicle_media', 'vehicle.id', '=', 'vehicle_media.vehicle_id')
                                        ->groupBy('vehicle.id')
                                        ->select('vehicle.*', 'vehicle_media.car_path', 'vehicle_fee.taxExc_price', 'vehicle_fee.taxInc_price')
                                        ->orderBy('vehicle.updated_at', 'asc')
                                        ->get();                    
            } else {
                $vehicle_infos =[];
            }
        } else {
            $vehicle_infos =[];
        }
        return view('admin.pages.vehicle.index', [
            'company'  => $company,
            'vehicle_infos' => $vehicle_infos,
        ]);
    }

    public function create(Request $request){
        $years = [
            '昭和50年(1975年)',
            '昭和51年(1976年)',
            '昭和52年(1977年)',
            '昭和53年(1978年)',
            '昭和54年(1979年)',
            '昭和55年(1980年)',
            '昭和56年(1981年)',
            '昭和57年(1982年)',
            '昭和58年(1983年)',
            '昭和59年(1984年)',
            '昭和60年(1985年)',
            '昭和61年(1986年)',
            '昭和62年(1987年)',
            '昭和63年(1988年)',
            '平成1年(1989年)',
            '平成2年(1990年)',
            '平成3年(1991年)',
            '平成4年(1992年)',
            '平成5年(1993年)',
            '平成6年(1994年)',
            '平成7年(1995年)',
            '平成8年(1996年)',
            '平成9年(1997年)',
            '平成10年(1998年)',
            '平成11年(1999年)',
            '平成12年(2000年)',
            '平成13年(2001年)',
            '平成14年(2002年)',    
            '平成15年(2003年)',
            '平成16年(2004年)',
            '平成17年(2005年)',
            '平成18年(2006年)',
            '平成19年(2007年)',
            '平成20年(2008年)',
            '平成21年(2009年)',
            '平成22年(2010年)',
            '平成23年(2011年)',
            '平成24年(2012年)',
            '平成25年(2013年)',
            '平成26年(2014年)',
            '平成27年(2015年)',
            '平成28年(2016年)',
            '平成29年(2017年)',
            '平成30年(2018年)',
            '令和1年(2019年)',
            '令和2年(2020年)',
            '令和3年(2021年)',
            '令和4年(2022年)',

        ];
        $months = [
            '1月',
            '2月',
            '3月',
            '4月',
            '5月',
            '6月',
            '7月',
            '8月',
            '9月',
            '10月',
            '11月',
            '12月',
        ];
        $areas = [
            '北海道',
            '青森県',
            '岩手県',
            '宮城県',
            '秋田県',
            '山形県',
            '福島県',
            '茨城県',
            '栃木県',
            '群馬県',
            '埼玉県',
            '千葉県',
            '東京都',
            '神奈川県',
            '新潟県',
            '富山県',
            '石川県',
            '福井県',
            '山梨県',
            '長野県',
            '岐阜県',
            '静岡県',
            '愛知県',
            '三重県',
            '滋賀県',
            '京都府',
            '大阪府',
            '兵庫県',
            '奈良県',
            '和歌山県',
            '鳥取県',
            '島根県',
            '岡山県',
            '広島県',
            '山口県',
            '徳島県',
            '香川県',
            '愛媛県',
            '高知県',
            '福岡県',
            '佐賀県',
            '長崎県',
            '熊本県',
            '大分県',
            '宮崎県',
            '鹿児島県',
            '沖縄県',
        ];
        $manufactures = [
            [
                'category_name' => '日野',
                'children' => [
                    'デュトロ', 'デュトロハイブリッド', 'レンジャー', 'レンジャー2', 'プロフィア', 'スーパードルフィン','スカニア','リエッセ','セレガ','ブルーリボン','レインボー','メルファ','ポンチョ'
                ],
            ],
            [
                'category_name' => 'いすゞ',
                'children' => [
                    'エルフ', 'フォワードジャストン', 'コモ', 'ファーゴ','フォワード','ギガ','810','ジャーニー','エルガ','ガーラ',
                ], 
            ],
            [
                'category_name' => '三菱ふそう',
                'children' => [
                    'キャンター', 'キャンターハイブリッド', 'キャンターガッツ', 'ファイター','ファイターミニヨンスーパーグレード', 'ザ・グレード', 'ローザ', 'エアロミディ', 'エアロスター', 'エアロクィーン', 'エアロスター',
                ], 
            ],
            [
                'category_name' => 'UDトラックス',
                'children' => [
                    'ガゼット','コンドル','コンドルS','クオン','ビックサム','スペースウィング','スペースアロー','スペースランナー',
                ], 
            ],
            [
                'category_name' => 'トヨタ',
                'children' => [
                    'ダイナ','タウンエース','トヨエース','ハイエース','ライトエース','コースター',
                ], 
            ],
            [
                'category_name' => '日産',
                'children' => [
                    'アトラス','キャラバン','クリッパー','バネット','シビリアン'
                ], 
            ],
            [
                'category_name' => 'ホンダ',
                'children' => [
                    'アクティ',
                ], 
            ],
            [
                'category_name' => '三菱',
                'children' => [
                    'デリカ','ミニキャブ',
                ], 
            ],
            [
                'category_name' => 'マツダ',
                'children' => [
                    'スクラム','タイタン','ボンゴ',
                ],
            ], 
            [
                'category_name' => 'スズキ',
                'children' => [
                    'エブリイ','キャリイ',
                ],
            ], 
            [
                'category_name' => 'スバル',
                'children' => [
                    'サンバー',
                ],
            ], 
            [
                'category_name' => 'ダイハツ',
                'children' => [
                    'デルタ','ハイゼット'
                ],
            ], 
            [
                'category_name' => 'その他',
                'children' => [
                    'その他',
                ],
            ], 
        ];
        $quotas =[
            '2人',
            '3人',
            '4人',
            '5人',
        ];
        $fule_lists = [
            '軽油',
            'ガソリン',
        ];
        $missions = [
            'フロアオートマ(AT)',
            'コラムオートマ(AT)',
            'ダッシュオートマ(AT)',
            '3速オートマ(AT)',
            '4速オートマ(AT)',
            '5速オートマ(AT)',
            '6速オートマ(AT)',
            '7速オートマ(AT)',
            '8速オートマ(AT)',
            '9速オートマ(AT)',
            'オートマ(AT)',
            'MTモード付AT',
            'セミAT',
            '無段階変速(CVT)',
            '無段階変速 6速(CVT)',
            'コラムマニュアル(MT)',
            '4速マニュアル(MT)',
            '5速マニュアル(MT)',
            '6速マニュアル(MT)',
            '7速マニュアル(MT)',
            'マニュアル(MT)',
        ];
        $shapes = [
            'ウィング',
            'バン',
            '冷凍・冷蔵',
            '平ボディ',
            'クレーン車',
            'ダンプ・ミキサー',
            'タンクローリー',
            'トラクタ・トレーラー',
            'キャリアカー',
            'セルフローダー',
            'バス',
            'その他',
        ];
        $classes = [
            '大型',
            '中型',
            '小型',
            'トレーラー',
            'バス',
            'その他',
        ];
        $expiration_years = [
            '令和3年(2021年)',
            '令和4年(2022年)',
            '令和5年(2023年)',
            '令和6年(2024年)',
            '令和7年(2025年)',
        ];

        $userId = Auth::user()->id;
        $companyId = Company::select('id')->where('user_id', $userId)->first()->id;
      
        $vehicel = Vehicle::latest()->first();
        if($vehicel){
            $vehicel_id = $vehicel->id;
            $vehicel_id++;
        } else {
            $vehicel_id = 1;
        }
        
        $car_paths = VehicleMedia::where('vehicle_id', $vehicel_id)->get();
        $path_array = [];
        $id_array = [];
        foreach($car_paths as $car_path){
            $path = $car_path->car_path;
            $id = $car_path->id;
            array_push($path_array, $path);
            array_push($id_array, ["key"=>$id]);
        }
        
        return view('admin.pages.vehicle.create', [
            'years' => $years,
            'months' => $months,
            'areas' => $areas,
            'manufactures' => $manufactures,
            'quotas' =>$quotas,
            'fule_lists' => $fule_lists,
            'missions'=>$missions,
            'shapes'=>$shapes,
            'classes' => $classes,
            'expiration_years' => $expiration_years,
            'car_paths' => $path_array,
            'id_array'   => $id_array,
            'vehicel_id' => $vehicel_id,
        ]);
    }
    public function details(Request $request, $vehicel_id){
        
        $userId = Auth::user()->id;
        $vehilce_details = Vehicle::where('id', $vehicel_id)->first();
        $vehilce_fee = VehicleFee::where('vehicle_id', $vehicel_id)->first();
        $vehicle_equipment = VehicleEquipment::where('vehicle_id', $vehicel_id)->first();
        $vehicle_medias = VehicleMedia::where('vehicle_id', $vehicel_id)->orderBy('car_path', 'ASC')->get();
        //dd($vehilce_details);
        return view('admin.pages.vehicle.details', [
           'vehilce_details'   => $vehilce_details,
           'vehilce_fee'       => $vehilce_fee,
           'vehicle_equipment' => $vehicle_equipment,
           'vehicle_medias'     => $vehicle_medias,
        ]);
    }

    public function edit(Request $request, $vehicel_id){
        $years = [
            '昭和50年(1975年)',
            '昭和51年(1976年)',
            '昭和52年(1977年)',
            '昭和53年(1978年)',
            '昭和54年(1979年)',
            '昭和55年(1980年)',
            '昭和56年(1981年)',
            '昭和57年(1982年)',
            '昭和58年(1983年)',
            '昭和59年(1984年)',
            '昭和60年(1985年)',
            '昭和61年(1986年)',
            '昭和62年(1987年)',
            '昭和63年(1988年)',
            '平成1年(1989年)',
            '平成2年(1990年)',
            '平成3年(1991年)',
            '平成4年(1992年)',
            '平成5年(1993年)',
            '平成6年(1994年)',
            '平成7年(1995年)',
            '平成8年(1996年)',
            '平成9年(1997年)',
            '平成10年(1998年)',
            '平成11年(1999年)',
            '平成12年(2000年)',
            '平成13年(2001年)',
            '平成14年(2002年)',    
            '平成15年(2003年)',
            '平成16年(2004年)',
            '平成17年(2005年)',
            '平成18年(2006年)',
            '平成19年(2007年)',
            '平成20年(2008年)',
            '平成21年(2009年)',
            '平成22年(2010年)',
            '平成23年(2011年)',
            '平成24年(2012年)',
            '平成25年(2013年)',
            '平成26年(2014年)',
            '平成27年(2015年)',
            '平成28年(2016年)',
            '平成29年(2017年)',
            '平成30年(2018年)',
            '令和1年(2019年)',
            '令和2年(2020年)',
            '令和3年(2021年)',
            '令和4年(2022年)',

        ];
        $months = [
            '1月',
            '2月',
            '3月',
            '4月',
            '5月',
            '6月',
            '7月',
            '8月',
            '9月',
            '10月',
            '11月',
            '12月',
        ];
        $areas = [
            '北海道',
            '青森県',
            '岩手県',
            '宮城県',
            '秋田県',
            '山形県',
            '福島県',
            '茨城県',
            '栃木県',
            '群馬県',
            '埼玉県',
            '千葉県',
            '東京都',
            '神奈川県',
            '新潟県',
            '富山県',
            '石川県',
            '福井県',
            '山梨県',
            '長野県',
            '岐阜県',
            '静岡県',
            '愛知県',
            '三重県',
            '滋賀県',
            '京都府',
            '大阪府',
            '兵庫県',
            '奈良県',
            '和歌山県',
            '鳥取県',
            '島根県',
            '岡山県',
            '広島県',
            '山口県',
            '徳島県',
            '香川県',
            '愛媛県',
            '高知県',
            '福岡県',
            '佐賀県',
            '長崎県',
            '熊本県',
            '大分県',
            '宮崎県',
            '鹿児島県',
            '沖縄県',
        ];
        $manufactures = [
            [
                'category_name' => '日野',
                'children' => [
                    'デュトロ', 'デュトロハイブリッド', 'レンジャー', 'レンジャー2', 'プロフィア', 'スーパードルフィン','スカニア','リエッセ','セレガ','ブルーリボン','レインボー','メルファ','ポンチョ'
                ],
            ],
            [
                'category_name' => 'いすゞ',
                'children' => [
                    'エルフ', 'フォワードジャストン', 'コモ', 'ファーゴ','フォワード','ギガ','810','ジャーニー','エルガ','ガーラ',
                ], 
            ],
            [
                'category_name' => '三菱ふそう',
                'children' => [
                    'キャンター', 'キャンターハイブリッド', 'キャンターガッツ', 'ファイター','ファイターミニヨンスーパーグレード', 'ザ・グレード', 'ローザ', 'エアロミディ', 'エアロスター', 'エアロクィーン', 'エアロスター',
                ], 
            ],
            [
                'category_name' => 'UDトラックス',
                'children' => [
                    'ガゼット','コンドル','コンドルS','クオン','ビックサム','スペースウィング','スペースアロー','スペースランナー',
                ], 
            ],
            [
                'category_name' => 'トヨタ',
                'children' => [
                    'ダイナ','タウンエース','トヨエース','ハイエース','ライトエース','コースター',
                ], 
            ],
            [
                'category_name' => '日産',
                'children' => [
                    'アトラス','キャラバン','クリッパー','バネット','シビリアン'
                ], 
            ],
            [
                'category_name' => 'ホンダ',
                'children' => [
                    'アクティ',
                ], 
            ],
            [
                'category_name' => '三菱',
                'children' => [
                    'デリカ','ミニキャブ',
                ], 
            ],
            [
                'category_name' => 'マツダ',
                'children' => [
                    'スクラム','タイタン','ボンゴ',
                ],
            ], 
            [
                'category_name' => 'スズキ',
                'children' => [
                    'エブリイ','キャリイ',
                ],
            ], 
            [
                'category_name' => 'スバル',
                'children' => [
                    'サンバー',
                ],
            ], 
            [
                'category_name' => 'ダイハツ',
                'children' => [
                    'デルタ','ハイゼット'
                ],
            ], 
            [
                'category_name' => 'その他',
                'children' => [
                    'その他',
                ],
            ], 
        ];
        $quotas =[
            '2人',
            '3人',
            '4人',
            '5人',
        ];
        $fule_lists = [
            '軽油',
            'ガソリン',
        ];
        $missions = [
            'フロアオートマ(AT)',
            'コラムオートマ(AT)',
            'ダッシュオートマ(AT)',
            '3速オートマ(AT)',
            '4速オートマ(AT)',
            '5速オートマ(AT)',
            '6速オートマ(AT)',
            '7速オートマ(AT)',
            '8速オートマ(AT)',
            '9速オートマ(AT)',
            'オートマ(AT)',
            'MTモード付AT',
            'セミAT',
            '無段階変速(CVT)',
            '無段階変速 6速(CVT)',
            'コラムマニュアル(MT)',
            '4速マニュアル(MT)',
            '5速マニュアル(MT)',
            '6速マニュアル(MT)',
            '7速マニュアル(MT)',
            'マニュアル(MT)',
        ];
        $shapes = [
            'ウィング',
            'バン',
            '冷凍・冷蔵',
            '平ボディ',
            'クレーン車',
            'ダンプ・ミキサー',
            'タンクローリー',
            'トラクタ・トレーラー',
            'キャリアカー',
            'セルフローダー',
            'バス',
            'その他',
        ];
        $classes = [
            '大型',
            '中型',
            '小型',
            'トレーラー',
            'バス',
            'その他',
        ];
        $expiration_years = [
            '令和3年(2021年)',
            '令和4年(2022年)',
            '令和5年(2023年)',
            '令和6年(2024年)',
            '令和7年(2025年)',
        ];
        
        $userId = Auth::user()->id;
        $companyId = Company::select('id')->where('user_id', $userId)->first()->id;
        $vehicle_exist = Vehicle::where('company_id', $companyId)->count();
        
        if($vehicle_exist>0){
            $vehicel_id;
        } else {
            $vehicel_id = Vehicle::latest('id')->first();
            $vehicel_id ++;
        }
        $car_paths = VehicleMedia::where('vehicle_id', $vehicel_id)->orderBy('car_path', 'ASC')->get();
        $path_array = [];
        $id_array = [];
        foreach($car_paths as $car_path){
            $path = $car_path->car_path;
            $id = $car_path->id;
            array_push($path_array, $path);
            array_push($id_array, ["key"=>$id]);
        }

        $vehilce_details = Vehicle::where('id', $vehicel_id)->first();
        $vehilce_fee = VehicleFee::where('vehicle_id', $vehicel_id)->first();
        $vehicle_equipment = VehicleEquipment::where('vehicle_id', $vehicel_id)->first();

        return view('admin.pages.vehicle.edit', [
           'years' => $years,
           'months' => $months,
           'areas' => $areas,
           'manufactures' => $manufactures,
           'quotas' =>$quotas,
           'fule_lists' => $fule_lists,
           'missions'=>$missions,
           'shapes'=>$shapes,
           'classes' => $classes,
           'expiration_years' => $expiration_years,
           'car_paths' => $path_array,
           'id_array'   => $id_array,
           'vehilce_details'   => $vehilce_details,
           'vehilce_fee'       => $vehilce_fee,
           'vehicle_equipment' => $vehicle_equipment,
        ]);
    }
    public function create_store(Request $request){
        
        //save vehicle details data in vehicel table
        $vehicle = new Vehicle;
        //upload image
        $userId = Auth::user()->id;
        $companyId = Company::select('id')->where('user_id', $userId)->first()->id;
        // $vehicle_exist = Vehicle::where('company_id', $companyId)->count();
        
        // if($vehicle_exist>0){
        //     $vehicleId = Vehicle::select('id')->where('company_id', $companyId)->first()->id;
        // } else {
        //     if(Vehicle::latest('id')->first()){
        //         $vehicleId = Vehicle::latest('id')->first()->id;
        //         $vehicleId ++;
        //     } else {
        //         $vehicleId = 1;
        //     }
        // }
        if ($request->has('file')) { 
            $extension = $request->file->extension();
            $imageName = round(microtime(true) * 1000) . '.' . $extension;
            $request->file->move(public_path('uploads/vehicle/require/'), $imageName);
        }
        $filePath = URL::asset('uploads/vehicle/require/'.$imageName);
        $vehicle->require_path = $filePath; //end upload image

        $vehicle->company_id = $companyId;
        $vehicle->car_category = $request->category_name;
        $vehicle->car_name = $request->vehicle_type;
        $vehicle->area = $request->area;
        $vehicle->model = $request->model;
        $vehicle->mission = $request->mission;
        $vehicle->loading_capacity = $request->loading_capacity;
        $vehicle->mileage = $request->mileage;
        $vehicle->body_number = $request->body_number;
        $vehicle->engine_model = $request->engine_model;
        $vehicle->displacement = $request->displacement;
        $vehicle->fule = $request->fule_list;
        $vehicle->shape = $request->shape;
        $vehicle->class = $request->class;
        $vehicle->max_capacity = $request->quota;
        $vehicle->start_year = $request->start_year;
        $vehicle->start_month = $request->start_month;
        $vehicle->end_year = $request->end_year;
        $vehicle->end_month = $request->end_month;
        $vehicle->save();
        
        //save vehicle fee data in vehicel_fee table
        $vehicleId =  Vehicle::latest('id')->first()->id;
        $vehicle_fee = new VehicleFee;
        $vehicle_fee->vehicle_id = $vehicleId;
        $vehicle_fee->fee = $request->recycling_fee;
        $vehicle_fee->taxExc_price = $request->excluding_tax;
        $vehicle_fee->taxInc_price = $request->including_tax;
        $vehicle_fee->note = $request->specail_note;
        $vehicle_fee->save();

        //save vehicle equipment data in vehicel_equipment table
        $vehicle_equip = new VehicleEquipment;
        $vehicle_equip->vehicle_id = $vehicleId;
        $vehicle_equip->power_set = $request->has('power_steering');
        $vehicle_equip->power_window = $request->has('power_window');
        $vehicle_equip->air_set = $request->has('air_condition');
        $vehicle_equip->door_set = $request->has('door_lock');
        $vehicle_equip->etc_set = $request->has('etc');
        $vehicle_equip->tacograph_set = $request->has('tacho_graph');
        $vehicle_equip->adblue_set = $request->has('ad_blue');
        $vehicle_equip->air_sus_set = $request->has('air_suspension');
        $vehicle_equip->leaf_sus_set = $request->has('leaf_suspension');
        $vehicle_equip->cruise_set = $request->has('cruise_control');
        $vehicle_equip->hill_set = $request->has('hill_start');
        $vehicle_equip->redtarder_set = $request->has('retarder');
        $vehicle_equip->disc_set = $request->has('disc_brake');
        $vehicle_equip->air_bag_set = $request->has('air_bag');
        $vehicle_equip->abs_set = $request->has('abs');
        $vehicle_equip->asr_set = $request->has('asr');
        $vehicle_equip->camera_set = $request->has('back_camera');
        $vehicle_equip->immobilizer_set = $request->has('immobilizer');
        $vehicle_equip->dvd_set = $request->has('dvd');
        $vehicle_equip->cd_set = $request->has('cd');
        $vehicle_equip->md_set = $request->has('md');
        $vehicle_equip->radio_set = $request->has('radio');
        $vehicle_equip->navigation_set = $request->has('navigation');
        $vehicle_equip->tv_set = $request->has('tv');
        $vehicle_equip->repaire_set = $request->has('repair_history');
        $vehicle_equip->owner_set = $request->has('owner');
        $vehicle_equip->unused_set = $request->has('unused_car');
        $vehicle_equip->save();
    }

    public function edit_store(Request $request){
        $userId = Auth::user()->id;
        $companyId = Company::select('id')->where('user_id', $userId)->first()->id;
        //save vehicle info
        $vehicle_exist = Vehicle::where('company_id', $companyId)->count();
        if($vehicle_exist>0){
            //save vehicle details data in vehicel table
            $vehicle = Vehicle::where('company_id', $companyId)->first();
            $vehicleId = Vehicle::select('id')->where('company_id', $companyId)->first()->id;
            $vehicle->company_id = $companyId;
            $vehicle->car_category = $request->category_name;
            $vehicle->car_name = $request->vehicle_type;
            $vehicle->area = $request->area;
            $vehicle->model = $request->model;
            $vehicle->mission = $request->mission;
            $vehicle->loading_capacity = $request->loading_capacity;
            $vehicle->mileage = $request->mileage;
            $vehicle->body_number = $request->body_number;
            $vehicle->engine_model = $request->engine_model;
            $vehicle->displacement = $request->displacement;
            $vehicle->fule = $request->fule_list;
            $vehicle->shape = $request->shape;
            $vehicle->class = $request->class;
            $vehicle->max_capacity = $request->quota;
            $vehicle->start_year = $request->start_year;
            $vehicle->start_month = $request->start_month;
            $vehicle->end_year = $request->end_year;
            $vehicle->end_month = $request->end_month;
            if ($request->has('file')) { 
                $extension = $request->file->extension();
                $imageName = round(microtime(true) * 1000) . '.' . $extension;
                $request->file->move(public_path('uploads/vehicle/require/'), $imageName);
                $filePath = URL::asset('uploads/vehicle/require/'.$imageName);
                $vehicle->require_path = $filePath;
            }
            $vehicle->class = $request->class;
            $vehicle->save();

            //save vehicle fee data in vehicel_fee table
            $vehicle_fee = VehicleFee::where('vehicle_id', $vehicleId)->first();
            $vehicle_fee->vehicle_id = $vehicleId;
            $vehicle_fee->fee = $request->recycling_fee;
            $vehicle_fee->taxExc_price = $request->excluding_tax;
            $vehicle_fee->taxInc_price = $request->including_tax;
            $vehicle_fee->note = $request->specail_note;
            $vehicle_fee->save();

            //save vehicle equipment data in vehicel_equipment table
            $vehicle_equip = VehicleEquipment::where('vehicle_id', $vehicleId)->first();
            $vehicle_equip->vehicle_id = $vehicleId;
            $vehicle_equip->power_set = $request->has('power_steering');
            $vehicle_equip->power_window = $request->has('power_window');
            $vehicle_equip->air_set = $request->has('air_condition');
            $vehicle_equip->door_set = $request->has('door_lock');
            $vehicle_equip->etc_set = $request->has('etc');
            $vehicle_equip->tacograph_set = $request->has('tacho_graph');
            $vehicle_equip->adblue_set = $request->has('ad_blue');
            $vehicle_equip->air_sus_set = $request->has('air_suspension');
            $vehicle_equip->leaf_sus_set = $request->has('leaf_suspension');
            $vehicle_equip->cruise_set = $request->has('cruise_control');
            $vehicle_equip->hill_set = $request->has('hill_start');
            $vehicle_equip->redtarder_set = $request->has('retarder');
            $vehicle_equip->disc_set = $request->has('disc_brake');
            $vehicle_equip->air_bag_set = $request->has('air_bag');
            $vehicle_equip->abs_set = $request->has('abs');
            $vehicle_equip->asr_set = $request->has('asr');
            $vehicle_equip->camera_set = $request->has('back_camera');
            $vehicle_equip->immobilizer_set = $request->has('immobilizer');
            $vehicle_equip->dvd_set = $request->has('dvd');
            $vehicle_equip->cd_set = $request->has('cd');
            $vehicle_equip->md_set = $request->has('md');
            $vehicle_equip->radio_set = $request->has('radio');
            $vehicle_equip->navigation_set = $request->has('navigation');
            $vehicle_equip->tv_set = $request->has('tv');
            $vehicle_equip->repaire_set = $request->has('repair_history');
            $vehicle_equip->owner_set = $request->has('owner');
            $vehicle_equip->unused_set = $request->has('unused_car');
            $vehicle_equip->save();
        } else {
            //save vehicle details data in vehicel table
            $vehicle = new Vehicle;
            //upload image
            $userId = Auth::user()->id;
            $companyId = Company::select('id')->where('user_id', $userId)->first()->id;
            $vehicle_exist = Vehicle::where('company_id', $companyId)->count();
            
            if($vehicle_exist>0){
                $vehicleId = Vehicle::select('id')->where('company_id', $companyId)->first();
            } else {
                $vehicleId = Vehicle::latest('id')->first();
                $vehicleId ++;
            }
            if ($request->has('file')) { 
                $extension = $request->file->extension();
                $imageName = round(microtime(true) * 1000) . '.' . $extension;
                $request->file->move(public_path('uploads/vehicle/require'), $imageName);
            }
            $filePath = URL::asset('uploads/vehicle/require/'.$imageName);
            $vehicle->require_path = $filePath; //end upload image

            $vehicle->company_id = $companyId;
            $vehicle->car_category = $request->category_name;
            $vehicle->car_name = $request->vehicle_type;
            $vehicle->area = $request->area;
            $vehicle->model = $request->model;
            $vehicle->mission = $request->mission;
            $vehicle->loading_capacity = $request->loading_capacity;
            $vehicle->mileage = $request->mileage;
            $vehicle->body_number = $request->body_number;
            $vehicle->engine_model = $request->engine_model;
            $vehicle->displacement = $request->displacement;
            $vehicle->fule = $request->fule_list;
            $vehicle->shape = $request->shape;
            $vehicle->class = $request->class;
            $vehicle->max_capacity = $request->quota;
            $vehicle->start_year = $request->start_year;
            $vehicle->start_month = $request->start_month;
            $vehicle->end_year = $request->end_year;
            $vehicle->end_month = $request->end_month;
            $vehicle->save();
            
            //save vehicle fee data in vehicel_fee table
            $vehicleId =  Vehicle::select('id')->where('company_id', $companyId)->first()->id;
            $vehicle_fee = new VehicleFee;
            $vehicle_fee->vehicle_id = $vehicleId;
            $vehicle_fee->fee = $request->recycling_fee;
            $vehicle_fee->taxExc_price = $request->excluding_tax;
            $vehicle_fee->taxInc_price = $request->including_tax;
            $vehicle_fee->note = $request->specail_note;
            $vehicle_fee->save();

            //save vehicle equipment data in vehicel_equipment table
            $vehicle_equip = new VehicleEquipment;
            $vehicle_equip->vehicle_id = $vehicleId;
            $vehicle_equip->power_set = $request->has('power_steering');
            $vehicle_equip->power_window = $request->has('power_window');
            $vehicle_equip->air_set = $request->has('air_condition');
            $vehicle_equip->door_set = $request->has('door_lock');
            $vehicle_equip->etc_set = $request->has('etc');
            $vehicle_equip->tacograph_set = $request->has('tacho_graph');
            $vehicle_equip->adblue_set = $request->has('ad_blue');
            $vehicle_equip->air_sus_set = $request->has('air_suspension');
            $vehicle_equip->leaf_sus_set = $request->has('leaf_suspension');
            $vehicle_equip->cruise_set = $request->has('cruise_control');
            $vehicle_equip->hill_set = $request->has('hill_start');
            $vehicle_equip->redtarder_set = $request->has('retarder');
            $vehicle_equip->disc_set = $request->has('disc_brake');
            $vehicle_equip->air_bag_set = $request->has('air_bag');
            $vehicle_equip->abs_set = $request->has('abs');
            $vehicle_equip->asr_set = $request->has('asr');
            $vehicle_equip->camera_set = $request->has('back_camera');
            $vehicle_equip->immobilizer_set = $request->has('immobilizer');
            $vehicle_equip->dvd_set = $request->has('dvd');
            $vehicle_equip->cd_set = $request->has('cd');
            $vehicle_equip->md_set = $request->has('md');
            $vehicle_equip->radio_set = $request->has('radio');
            $vehicle_equip->navigation_set = $request->has('navigation');
            $vehicle_equip->tv_set = $request->has('tv');
            $vehicle_equip->repaire_set = $request->has('repair_history');
            $vehicle_equip->owner_set = $request->has('owner');
            $vehicle_equip->unused_set = $request->has('unused_car');
            $vehicle_equip->save();
        }
        
    }
    public function photoDestroy(Request $request){
        $userId = Auth::user()->id;
        $id = $request->key;
        $fileName = vehicleMedia::where('id', $id)->first()->file_name;
        $vehicleId = vehicleMedia::where('id', $id)->first()->vehicle_id;
        $fileName = ('uploads/vehicle/'.$vehicleId.'/'.$fileName);
        //dd(File::exists(public_path($fileName)));
        if(File::exists(public_path($fileName))){
            File::delete(public_path($fileName));   
        }
        $result = vehicleMedia::where('id', $id)->delete();
        return response()->json(['result' => true, 'deleted' => $result]);
    }
    public function photoStore(Request $request, $vehicleId){
        $userId = Auth::user()->id;
        $companyId = Company::select('id')->where('user_id', $userId)->first()->id;
        if ($request->has('file')) { 
            $path = public_path('uploads/vehicle/'.$vehicleId.'/');
            if (!file_exists($path)) {
                File::makeDirectory($path); //create new folder   
            }
            $extension = $request->file->extension();
            $fileName = request()->file->getClientOriginalName();
            $fileName = prefix_word($fileName, 8);
            //$imageName = time() . '.' . $extension;
            $imgx = Image::make($request->file->getRealPath());
            //image resize and crop
            $imgx->resize(700, null, function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    })->crop(640, 480)->save($path.$vehicleId.'_' . $fileName);
        }
        
        $filePath = URL::asset('uploads/vehicle/'.$vehicleId.'/'.$vehicleId.'_'.$fileName);
        $result = new VehicleMedia;
        $result->vehicle_id = $vehicleId;
        $result->car_path = $filePath;
        $result->file_name = $vehicleId.'_'.$fileName;
        
        $result->save();
        return response()->json(['uploaded' => 'uploads/vehicle/'.$vehicleId.'/'.$vehicleId.'_'.$fileName]);
    }
}
