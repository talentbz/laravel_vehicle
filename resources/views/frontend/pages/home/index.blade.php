@extends('frontend.layouts.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/datepicker/datepicker.min.css') }}">
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
                        <form action="{{route('sale.search')}}" method="post" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                            <i class="fa fa-search"></i> <input type="text" class="form-control" placeholder="例　三菱　QPG-FS64VZ" name="general_search"> 
                            <button class="btn btn-primary" type="submit">検索</button> 
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-adver">
        <div class="container">
            <div class="row mt-3 mb-3 adver-top">
                <a href="{{route('membership')}}">
                    <h1>掲載店募集<i class="fas fa-angle-double-right"></i></h1>
                    <p>中古トラック、ダンプなどをトラッカージャパンに掲載しませんか？</p>
                </a>
            </div>
            <div class="row adver-bottom">
                <div class="wrecker-service">
                    <h1>レッカーサービス</h1>
                    <a href="{{route('membership.dealer')}}">
                        <img src="{{asset('/images/frontend/home/icon/wrecker.png')}}" alt="">
                        <span>全国対応・迅速・格安・安全</span>
                    </a>
                    
                </div>
                <div class="painting-service">
                    <h1>板金塗装サービス</h1>
                    <a href="{{route('membership.shipping')}}">
                        <img src="{{asset('/images/frontend/home/icon/painting.png')}}" alt="">
                        <span>迅速・格安・丁寧・安心</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="category">
        <!-- car list per category -->
        <div class="container-fluid home-content">
                <div class="row">
                    <div class="car-list">
                        <!-- category search -->
                        @include('frontend.pages.home.category')
                        
                        <!-- detail search -->
                        @include('frontend.pages.home.search')

                        <!-- forklift search -->
                        
                        
                        <!-- latest car info -->
                        <div class="category">
                            <div class="category-title">
                                <i class="fas fa-truck-moving"></i>
                                <h3>最新情報！</h3>
                                
                                <div class="sort-filter">
                                    <select class="select2 form-control" id="filter-select" name="filter" value="{{$filter}}" data-placeholder="すべて">
                                        <option></option>
                                        <option value="row_price"> 価格が安い</option>
                                        <option value="high_price"> 価格が高い</option>
                                        <option value="old_model_date">年式が古い</option>
                                        <option value="new_model_date">年式が新しい</option>
                                        <option value="short_mileage">走行距離が短い</option>
                                        <option value="long_mileage">走行距離が長い</option>
                                    </select>
                                </div>
                            </div>
                                
                            <div class="carlist-page row">
                                @include('frontend.pages.home.carlist')
                            </div>
                            <!-- <div class="read-more">
                                <a href="#" class="btn btn-primary" type="submit">もっと見る</a>
                            </div> -->
                        </div>
                        
                        <!-- bulletin board -->
                        <div class="category row">
                            <div class="category-title">
                                <i class="fas fa-sticky-note"></i>
                                <h3>掲示板情報</h3>
                                <div class="sort-filter">
                                    <select class="select2 form-control" id="table-filter"   data-placeholder="最新情報">
                                        <option></option>
                                        <option value="すべて"> すべて</option> 
                                        <option value="求人"> 求人</option>
                                        <option value="仕事求む"> 仕事求む</option>
                                        <option value="仕事依頼">仕事依頼</option>
                                        <option value="車両探し">車両探し</option>
                                        <option value="その他">その他</option>
                                    </select>
                                </div>
                            </div>
                            @include('frontend.pages.home.bulletin')
                    </div>

                </div>
        </div> <!-- content -->
    </div>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/spectrum-colorpicker/spectrum-colorpicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-touchspin/bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datepicker/datepicker.min.js') }}"></script>

    <!-- form advanced init -->
    <script src="{{ URL::asset('/assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/homepage/index.js') }}"></script>

    @endsection
@endsection
