@extends('frontend.layouts.index')

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/pagination/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/car/style.css') }}">
    <!-- admin plateform -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/libs/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/admin/pages/vehicle/style.css') }}">
@endsection
@section('title')
    sale
@endsection

@section('content')
    <div class="container-fluid">
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
                        <h4 class="card-title">詳細情報</h4>
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
                                        <td >{{number_format($vehilce_fee->fee).' 円'}}</td>
                                        <td class="table-light"></th>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="table-light" scope="row">販売価格(税抜)</th>
                                        <td >{{$vehilce_fee->taxExc_price.' 万円'}}</td>
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
                        <div class="container add-details">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">お問合せ先:</label>
                                    <p>{{$user_info->company_name}}</p>
                                </div>
                                <div class="col-md-6">
                                    <label for="">担当者:</label>
                                    <p>{{$user_info->member}}</p>
                                </div>
                                <div class="col-md-6">
                                    <!-- <label for="">会員番号:</label>
                                    <p>{{$user_info->comapny_name}}</p> -->
                                </div>
                                <div class="col-md-6">
                                    <label for="">問合せ番号:</label>
                                    <p>{{$user_info->user_id}}{{prefix_word($vehilce_details->id, 3)}}</p>
                                </div>
                                <div class="col-md-6"></div>
                                <div class="col-md-6 mt-3">
                                    <a class="btn btn-outline-info" href="mailto: {{$user_info->email}}">メールで問合せする</a>
                                    <a class="btn btn-outline-danger" href="tel:{{$user_info->phone}}">電話で問合せする</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->

        </div> <!-- end row -->
    </div>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pagination/pagination.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/search/index.js') }}"></script>
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
@endsection
