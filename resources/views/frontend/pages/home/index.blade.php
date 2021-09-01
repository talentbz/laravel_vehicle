@extends('frontend.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('title')
    homepage
@endsection

@section('content')
    <div class="banner-image">
        <img src="{{asset('/images/frontend/home/banner_1.jpg')}}" class="img-fluid" alt="Responsive image">
        <div class="container home-search">
            <div class="row height d-flex justify-content-center align-items-center">
                <div class="col-md-8 col-sm-8 col-xs-12">
                    <p>フリーワードで検索す</p>
                    <div class="search">
                        <form action="">
                            <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="例　三菱　QPG-FS64VZ"> 
                            <button class="btn btn-primary" type="submit">検索</button> 
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- car list per category -->
    <div class="container-fluid home-content">
            <div class="row">
                <div class="car-list">
                    <div class="list-title">
                        <h3>中古トラックを探す</h3>
                        <p>現在の登録台数：<span>325</span>台</p>
                    </div>
                    <div class="category row">
                        <div class="category-title">
                            <i class="fa fa-search"></i>
                            <h3>ボディタイプで探す</h3>
                        </div>
                        @foreach ($body_lists as $key=>$body_list)
                        <div class="col-md-2">
                            <a href="{!! route('bodycategory', ['name' => $body_list['link']]) !!}">
                                <img src="{{asset($body_list['img'])}}" alt="">
                                <p>{{$body_list['name']}}</p>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    

                    <!-- latest car info -->
                    <div class="category row">
                        <div class="category-title">
                            <i class="fa fa-search"></i>
                            <h3>最新情報！</h3>
                        </div>
                        @foreach ($vehicle_infos as $key=>$vehicle_info)
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <div class="card p-1 border shadow-none">
                                    <div class="position-relative">
                                        @if($vehicle_info->car_path)
                                            <img src="{{asset($vehicle_info->car_path)}}" alt="" class="img-thumbnail">
                                        @else
                                            <img class="img-thumbnail" src="{{URL::asset('images/photo.png')}}" alt="" >
                                        @endif
                                    </div>
                                    <div class="p-3">
                                        <ul class="list-inline car-info">
                                            <li class="list-inline-item me-3">
                                                <span class="car-price">{{number_format($vehicle_info->taxInc_price)}}万円</span>
                                                <a href="#" class="badge bg-danger font-size-12 ">リースOK</a>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <p>{{$vehicle_info->car_category}}</p>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <p>{{$vehicle_info->model}}</p>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <p>{{$vehicle_info->shape}}</p>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <p><span>{{number_format($vehicle_info->mileage)}}</span>km</p>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <p>{{$vehicle_info->start_year}} {{$vehicle_info->start_month}}</p>
                                            </li>
                                            <li class="list-inline-item me-3">
                                                <p>{{$vehicle_info->note}}</p>
                                            </li>
                                        </ul>
                                        <div>
                                            <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
    </div> <!-- content -->
    @section('script')
    <script src="{{ URL::asset('/assets/frontend/pages/homepage/index.js') }}"></script>
    @endsection
@endsection
