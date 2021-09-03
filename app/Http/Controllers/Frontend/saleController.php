<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Vehicle;
use App\Models\VehicleFee;
use App\Models\VehicleMedia;
use App\Models\VehicleEquipment;

class saleController extends Controller
{
    public function index(Request $request)
    {
        $vehicle_infos = Vehicle::leftJoin('vehicle_equipment', 'vehicle.id', '=', 'vehicle_equipment.vehicle_id')
                                ->leftJoin('vehicle_media', 'vehicle.id', '=', 'vehicle_media.vehicle_id')
                                ->leftJoin('vehicle_fee', 'vehicle.id', '=', 'vehicle_fee.vehicle_id')
                                ->groupBy('vehicle.id')
                                ->orderBy('vehicle.created_at', 'desc')
                                //->take(8)
                                ->get();  
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
        $classes = [
            '大型',
            '中型',
            '小型',
            'トレーラー',
            'バス',
            'その他',
        ];
        return view('frontend.pages.sale.index', [
            'years'=>$years,
            'shapes'=>$shapes,
            'areas'=>$areas,
            'classes'=>$classes,
            'vehicle_infos'=>$vehicle_infos,
        ]);
    }

    public function searchResult(Request $request)
    {
        
        //vehicle information
        $vehicle_infos = Vehicle::leftJoin('vehicle_equipment', 'vehicle.id', '=', 'vehicle_equipment.vehicle_id')
                                ->leftJoin('vehicle_media', 'vehicle.id', '=', 'vehicle_media.vehicle_id')
                                ->leftJoin('vehicle_fee', 'vehicle.id', '=', 'vehicle_fee.vehicle_id')
                                //get string date to int
                                ->leftjoin(DB::raw('(SELECT vehicle.id, CONVERT(SUBSTR(start_year,-6,4), SIGNED) AS year FROM vehicle) AS date_c '), 'date_c.id', '=', 'vehicle.id' )
                                ->groupBy('vehicle.id')
                                ->orderBy('vehicle.created_at', 'desc'); 
        //static variable array
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
        $classes = [
            '大型',
            '中型',
            '小型',
            'トレーラー',
            'バス',
            'その他',
        ];
        $body_shape = $request->shape;
        $to_year = (int)substr($request->to_year, -8, 4);
        $from_year = (int)substr($request->from_year, -8, 4);
        $size = $request->size;
        $to_millege = (int)($request->to_millege);
        $from_millege = (int)($request->from_millege);
        $location = $request->location;
        
        //car category
        $isuze = $request->isuze; 
        $hino = $request->hino;   
        $fuso = $request->fuso;   
        $ud = $request->ud;       
        $toyoda = $request->toyoda; 
        $mazda = $request->mazda; 
        $others = $request->others;
        if($isuze) $isuze ="いすゞ";
        if($hino) $hino = "日野";
        if($fuso) $fuso = "三菱ふそう";
        if($ud) $ud = "UDトラックス";
        if($toyoda) $toyoda = "トヨタ";
        if($mazda) $mazda = "マツダ";
        if($others) $others = "その他";  

        if ($body_shape){
            $vehicle_infos = $vehicle_infos->where('shape', 'LIKE', "%{$body_shape}%");
        }
        if ($from_year){
            $vehicle_infos = $vehicle_infos->where('start_year', '<=', "%{$from_year}%");
        }
        if ($to_year){
            $vehicle_infos = $vehicle_infos->where('start_year', '>=', "%{$to_year}%");
        }           
        if ($from_millege){
            $vehicle_infos = $vehicle_infos->where('mileage', '<=', "%{$from_millege}%");
        }
        if ($to_millege){
            $vehicle_infos = $vehicle_infos->where('mileage', '>=', "%{$to_millege}%");
        }       
        if ($size){
            $vehicle_infos = $vehicle_infos->where('class', 'LIKE', "%{$size}%");
        }   
        // if ($location){
        //     $vehicle_infos = $vehicle_infos->where('area', 'LIKE', "%{$location}%");
        // } 
        if($isuze || $hino || $fuso || $ud || $toyoda || $mazda || $others){
            $vehicle_infos = $vehicle_infos->where(function($query) use($isuze, $hino, $fuso, $ud, $toyoda, $mazda, $others){
                                                    if($isuze){
                                                        $query->orWhere('car_category', 'LIKE', "%{$isuze}%");
                                                    }          
                                                    if($hino){
                                                        $query->orWhere('car_category', 'LIKE', "%{$hino}%");
                                                    }       
                                                    if($fuso){
                                                        $query->orWhere('car_category', 'LIKE', "%{$fuso}%");
                                                    }  
                                                    if($ud){
                                                        $query->orWhere('car_category', 'LIKE', "%{$ud}%");
                                                    }  
                                                    if($toyoda){
                                                        $query->orWhere('car_category', 'LIKE', "%{$toyoda}%");
                                                    } 
                                                    if($mazda){
                                                        $query->orWhere('car_category', 'LIKE', "%{$mazda}%");
                                                    }  
                                                    if($others){
                                                        $query->orWhere('car_category', 'LIKE', "%{$others}%");
                                                    }});

        }  


        //general search
        $general_search = $request->general_search;
        
        if($general_search){
            $general_search = preg_split('/\s+/', $general_search, -1, PREG_SPLIT_NO_EMPTY); 
            
            $vehicle_infos = $vehicle_infos->where(function ($q) use ($general_search) {
                foreach ($general_search as $value) {
                    $q->orWhere('car_category', 'LIKE', "%{$value}%");
                    $q->orWhere('car_name', 'LIKE', "%{$value}%");
                }
            });
        }
                               
        $vehicle_infos = $vehicle_infos->get(); 
        return view('frontend.pages.sale.search', [
            'years'=>$years,
            'shapes'=>$shapes,
            'areas'=>$areas,
            'classes'=>$classes,
            'vehicle_infos'=>$vehicle_infos,
        ]);
    }
}
