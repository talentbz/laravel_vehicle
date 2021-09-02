@extends('frontend.layouts.index')

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
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
                        <p>現在の登録台数：<span>{{$vehicle_infos->count()}}</span>台</p>
                    </div>
                    <div class="category row">
                        <div class="category-title">
                            <i class="fa fa-search"></i>
                            <h3>ボディタイプで探す</h3>
                        </div>
                        @foreach ($body_lists as $key=>$body_list)
                        <div class="col-md-2 car-list-info">
                            <a href="{!! route('bodycategory', ['name' => $body_list['link']]) !!}">
                                <img src="{{asset($body_list['img'])}}" alt="">
                                <p>{{$body_list['name']}}</p>
                            </a>
                        </div>
                        @endforeach
                        <div class="read-more">
                            <a href="#" class="btn btn-primary" type="submit">リース</a>
                        </div>
                    </div>
                    
                    <!-- detail search -->
                    <div class="category row">
                        <div class="category-title">
                            <i class="fa fa-search"></i>
                            <h3>絞込み検索</h3>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <!-- car shape  -->
                                    <div class="col-md-3">
                                        <div class="templating-select row">
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <label for="" class="pt-2">形状</label>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <select class="select2 form-control">
                                                    @foreach($bulletin_categories as $bulletin_categorie)
                                                        <option value="{{$bulletin_categorie}}">{{$bulletin_categorie}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- year -->
                                    <div class="col-md-3">
                                        <div class="templating-select row">
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <label for="" class="pt-2">年式</label>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <select class="select2 form-control">
                                                    @foreach($bulletin_categories as $bulletin_categorie)
                                                        <option value="{{$bulletin_categorie}}">{{$bulletin_categorie}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="templating-select row">
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <label for="" class="pt-2">~</label>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <select class="select2 form-control">
                                                    @foreach($bulletin_categories as $bulletin_categorie)
                                                        <option value="{{$bulletin_categorie}}">{{$bulletin_categorie}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- size -->
                                    <div class="col-md-3">
                                        <div class="templating-select row">
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <label for="" class="pt-2">大きさ</label>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <select class="select2 form-control">
                                                    @foreach($bulletin_categories as $bulletin_categorie)
                                                        <option value="{{$bulletin_categorie}}">{{$bulletin_categorie}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div  class="col-md-12 mt-5">
                                <div class="row">
                                    <!-- millege -->
                                    <div class="col-md-3">
                                        <div class="templating-select row">
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <label for="" class="pt-2">走行距離</label>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <select class="select2 form-control">
                                                    @foreach($bulletin_categories as $bulletin_categorie)
                                                        <option value="{{$bulletin_categorie}}">{{$bulletin_categorie}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="templating-select row">
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <label for="" class="pt-2">~</label>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <select class="select2 form-control">
                                                    @foreach($bulletin_categories as $bulletin_categorie)
                                                        <option value="{{$bulletin_categorie}}">{{$bulletin_categorie}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- location -->
                                    <div class="col-md-3">
                                        <div class="templating-select row">
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <label for="" class="pt-2">地域</label>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <select class="select2 form-control">
                                                    @foreach($bulletin_categories as $bulletin_categorie)
                                                        <option value="{{$bulletin_categorie}}">{{$bulletin_categorie}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="read-more detail-search">
                            <a href="#" class="btn btn-primary" type="submit">もっと見る</a>
                        </div>
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
                                    <div class="position-relative car-list-image">
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
                                            <!-- <a href="javascript: void(0);" class="text-primary">Read more <i class="mdi mdi-arrow-right"></i></a> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="read-more">
                            <a href="#" class="btn btn-primary" type="submit">もっと見る</a>
                        </div>
                    </div>
                
                    <!-- bulletin board -->
                    <div class="category row">
                        <div class="category-title row">
                            <div class="col-md-10">
                                <i class="fa fa-search"></i>
                                <h3>掲示板情報</h3>
                            </div>
                            <div class="col-md-2">
                                <div class="templating-select">
                                    <select class="select2 form-control" name="category">
                                        @foreach($bulletin_categories as $bulletin_categorie)
                                            <option value="{{$bulletin_categorie}}">{{$bulletin_categorie}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap">
                                <thead>
                                
                                </thead>
                                <tbody>
                                    @foreach ($bulletin_infos as $key=>$bulletin_info)
                                        <tr>
                                            <td>{{$bulletin_info->deadline_date}}</td>
                                            <td>{{$bulletin_info->category}}</td>
                                            <td>{{$bulletin_info->title}}</td>
                                            <td>
                                                <p class="mb-0">{{$bulletin_info->content}}</p>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="read-more">
                            <a href="#" class="btn btn-primary" type="submit">もっと見る</a>
                        </div>
                    </div>
                </div>

            </div>
    </div> <!-- content -->
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/homepage/index.js') }}"></script>
    @endsection
@endsection
