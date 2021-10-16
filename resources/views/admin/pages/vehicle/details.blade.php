@extends('admin.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/vehicle/style.css') }}">
@endsection
@section('title')
    vehicle list
@endsection

@section('content')
@if(empty($vehilce_details))
    <script>window.location = "{{route('dashboard')}}";</script>
@else
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!-- vehicle slider section -->
                <!-- <h4 class="card-title">削除</h4> -->
                <div class="slick-wrapper">
                    <div class="product">
                        <div class="product-images">
                            <div class="slider">
                                @foreach($vehicle_medias as $vehicle_media)
                                    <div>
                                        <img src="{{$vehicle_media->car_path}}" >
                                    </div>
                                @endforeach
                            </div>
                            <div class="slider-thumbnails">
                                @foreach($vehicle_medias as $vehicle_media)
                                    <div>
                                        <img src="{{$vehicle_media->car_path}}" >
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <!-- details section -->
                <h4 class="card-title vehicle-list">詳細情報</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="table-light" scope="row">登録番号</th>
                                <td >{{prefix_word($vehilce_details->id, 3)}}</td>
                                <td class="table-light" scope="row">地域(保管場所)</th>
                                <td >{{$vehilce_details->area}}</td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">メーカー</th>
                                <td >{{$vehilce_details->car_category}}</td>
                                <td class="table-light" scope="row">車名</th>
                                <td >{{$vehilce_details->car_name}}</td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">年式</th>
                                <td >{{$vehilce_details->start_year.$vehilce_details->start_month}}</td>
                                <td class="table-light" scope="row">乗車定員</th>
                                <td >{{$vehilce_details->max_capacity}}</td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">型式</th>
                                <td >{{$vehilce_details->model}}</td>
                                <td class="table-light" scope="row">車体番号</th>
                                <td >{{$vehilce_details->body_number}}</td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">エンジン型式</th>
                                <td >{{$vehilce_details->engine_model}}</td>
                                <td class="table-light" scope="row">排気量</th>
                                <td >{{$vehilce_details->displacement."L"}}</td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">燃料</th>
                                <td >{{$vehilce_details->fule}}</td>
                                <td class="table-light" scope="row">ミッション</th>
                                <td >{{$vehilce_details->mission}}</td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">形状</th>
                                <td >{{$vehilce_details->shape}}</td>
                                <td class="table-light" scope="row">クラス</th>
                                <td >{{$vehilce_details->class}}</td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">最大積載量</th>
                                <td >{{$vehilce_details->loading_capacity." Kg"}}</td>
                                <td class="table-light" scope="row">走行距離</th>
                                <td >{{$vehilce_details->mileage." Km"}}</td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">車検有効期限</th>
                                @if(is_null($vehilce_details->end_year))
                                    <td >無し</td>
                                @else
                                    <td >有り</td>
                                @endif
                                <td class="table-light" scope="row">車検有効期限有り</th>
                                <td >{{$vehilce_details->end_year.$vehilce_details->end_month}}</td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">リサイクル料金</th>
                                <td >{{number_format($vehilce_fee->fee?$vehilce_fee->fee:'0').' 円'}}</td>
                                <td class="table-light"></th>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="table-light" scope="row">販売価格(税抜)</th>
                                <td >{{number_format($vehilce_fee->taxExc_price).' 万円'}}</td>
                                <td class="table-light" scope="row">販売価格(税込)</th>
                                <td >{{number_format($vehilce_fee->taxInc_price).' 万円'}}</td>
                                <!-- <td class="table-light" scope="row">特記</th>
                                <td >{{$vehilce_fee->note}}</td> -->
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            
                        </thead>
                        <tbody>
                            <td class="table-light">説明</td>
                            <td>{{$vehilce_fee->note}}</td>
                        </tbody>
                    </table>
                </div>
                <h4 class="card-title vehicle-list">装備</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="power_steering" {{$vehicle_equipment->power_set == 1? 'checked':''}} disabled />
                                    <p class="equip-list">パワーステアリング</p>
                                </td>
                                <td >
                                    <input type="checkbox" class="form-check-input equip-check" name="power_window" {{$vehicle_equipment->power_window == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">パワーウィンドウ</p>
                                </td>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="air_condition" {{$vehicle_equipment->air_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">エアコン</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="door_lock" {{$vehicle_equipment->door_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">集中ドアロック</p>
                                </td>
                                <td >
                                    <input type="checkbox" class="form-check-input equip-check" name="etc" {{$vehicle_equipment->etc_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">ETC</p>
                                </td>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="tacho_graph"{{$vehicle_equipment->tacograph_set == 1? 'checked':''}}  disabled/>
                                    <p class="equip-list">タコグラフ</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="ad_blue" {{$vehicle_equipment->adblue_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">AdBlue</p>
                                </td>
                                <td >
                                    
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="air_suspension" {{$vehicle_equipment->air_sus_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">エアサスペンション</p>
                                </td>
                                <td >
                                    <input type="checkbox" class="form-check-input equip-check" name="leaf_suspension" {{$vehicle_equipment->leaf_sus_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">リーフサスペンション</p>
                                </td>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="retarder" {{$vehicle_equipment->redtarder_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">リターダ</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="cruise_control" {{$vehicle_equipment->cruise_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">クルーズコントロール</p>
                                </td>
                                <td >
                                    <input type="checkbox" class="form-check-input equip-check" name="hill_start" {{$vehicle_equipment->adblue_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">坂道発進補助</p>
                                </td>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="lane_keep" {{$vehicle_equipment->lane_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">レーンキープアシスト</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="disc_brake" {{$vehicle_equipment->disc_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">ディスクブレーキ</p>
                                </td>
                                <td >
                                
                                </td>
                                <td>
                                
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="air_bag" {{$vehicle_equipment->air_bag_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">エアバッグ</p>
                                </td>
                                <td >
                                    <input type="checkbox" class="form-check-input equip-check" name="abs" {{$vehicle_equipment->abs_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">ABS</p>
                                </td>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="asr" {{$vehicle_equipment->asr_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">ASR</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="back_camera" {{$vehicle_equipment->camera_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">バックカメラ</p>
                                </td>
                                <td >
                                    <input type="checkbox" class="form-check-input equip-check" name="immobilizer" {{$vehicle_equipment->immobilizer_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">イモビライザー</p>
                                </td>
                                <td>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="dvd" {{$vehicle_equipment->dvd_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">DVD再生</p>
                                </td>
                                <td >
                                    <input type="checkbox" class="form-check-input equip-check" name="cd" {{$vehicle_equipment->cd_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">CD再生</p>
                                </td>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="md" {{$vehicle_equipment->md_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">MD再生</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="radio" {{$vehicle_equipment->radio_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">ラジオ</p>
                                </td>
                                <td >
                                    <input type="checkbox" class="form-check-input equip-check" name="navigation" {{$vehicle_equipment->navigation_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">ナビ</p>
                                </td>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="tv" {{$vehicle_equipment->tv_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">TV</p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="repair_history" {{$vehicle_equipment->repaire_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">修理歴</p>
                                </td>
                                <td >
                                    <input type="checkbox" class="form-check-input equip-check" name="owner" {{$vehicle_equipment->owner_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">ワンオーナー</p>
                                </td>
                                <td>
                                    <input type="checkbox" class="form-check-input equip-check" name="unused_car" {{$vehicle_equipment->unused_set == 1? 'checked':''}} disabled/>
                                    <p class="equip-list">未使用車</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="vehicle_edit">
                    <a href="{{URL::previous()}}">
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="fas fa-long-arrow-alt-left"></i> 戻る</button>
                    </a>
                    @if(Auth::user()->role == 2)
                    <a href="{!! route('vehicle.edit', ['id' => $vehilce_details->id]) !!}">
                        <button type="button" class="btn btn-outline-primary waves-effect waves-light"><i class="far fa-edit"></i> 修正</button>
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->
    @section('script')
    <script src="{{ URL::asset('/assets/libs/slick/slick.min.js') }}"></script>
    <script>
        $(document).ready(function(){
            $('.slider-thumbnails').slick({
                infinite: false,
                slidesToShow: 5,
                slidesToScroll: 1,
                asNavFor: '.slider',
                focusOnSelect: true
            });            
            
            $('.slider').slick({
                infinite: false,
                asNavFor: '.slider-thumbnails',
            });

        });
        
    </script>
    @endsection
@endif    
@endsection
