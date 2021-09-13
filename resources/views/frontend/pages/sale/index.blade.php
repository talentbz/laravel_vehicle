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
    sale
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
    <!-- car list per category -->
    <div class="container-fluid home-content">
            <div class="row">
                <div class="car-list">
                    <!-- detail search -->
                    <div class="category row">
                        <div class="category-title">
                            <i class="fa fa-search"></i>
                            <h3>絞込み検索</h3>
                        </div>
                        <form action="{{route('sale.search')}}" method="post" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <!-- manufacture -->
                                        <div class="col-md-4">
                                            <div class="templating-select row">
                                                <div class="col-md-4 select-label">
                                                    <label for="" class="pt-2">メーカー</label>
                                                </div>
                                                <div class="col-md-8 select-box">
                                                    <select class="select2 form-control" name="manufacture">
                                                        <option value=" いすゞ"> いすゞ</option>
                                                        <option value=" 日野"> 日野</option>
                                                        <option value=" 三菱ふそう">三菱ふそう</option>
                                                        <option value="UDトラックス">UDトラックス</option>
                                                        <option value="トヨタ">トヨタ</option>
                                                        <option value="マツダ">マツダ</option>
                                                        <option value="その他">その他</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- size -->
                                        <div class="col-md-4">
                                            <div class="templating-select row">
                                                <div class="col-md-4 select-label">
                                                    <label for="" class="pt-2">大きさ</label>
                                                </div>
                                                <div class="col-md-8 select-box">
                                                    <select class="select2 form-control" name="size">
                                                        @foreach($classes as $class)
                                                            <option value="{{$class}}">{{$class}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- location -->
                                        <div class="col-md-4">
                                            <div class="templating-select row">
                                                <div class="col-md-4 select-label">
                                                    <label for="" class="pt-2">地域</label>
                                                </div>
                                                <div class="col-md-8 select-box">
                                                    <select class="select2 form-control" name="location">
                                                        @foreach($areas as $area)
                                                            <option value="{{$area}}">{{$area}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 mt-5">
                                    <div class="row">
                                        <!-- car shape  -->
                                        <div class="col-md-4">
                                            <div class="templating-select row">
                                                <div class="col-md-4 select-label">
                                                    <label for="" class="pt-2">形状</label>
                                                </div>
                                                <div class="col-md-8 select-box">
                                                    <select class="select2 form-control" name="shape">
                                                        @foreach($shapes as $shape)
                                                            <option value="{{$shape}}">{{$shape}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- year -->
                                        <div class="col-md-8">
                                            <div class="templating-year row">
                                                <div class="col-md-4 select-label">
                                                    <label for="" class="pt-2">年式</label>
                                                </div>
                                                <div class="col-md-8 templating-year-select">
                                                    <select class="select2 form-control" name="from_year">
                                                        @foreach($years as $year)
                                                            <option value="{{$year}}">{{$year}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="templating-year row">
                                                <div class="col-md-4 select-label">
                                                    <label for="" class="pt-2 select-label-mark">~</label>
                                                </div>
                                                <div class="col-md-8 templating-year-select">
                                                    <select class="select2 form-control" name="to_year">
                                                        @foreach($years as $year)
                                                            <option value="{{$year}}">{{$year}}</option>
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
                                        <div class="col-md-4">
                                            <div class="templating-select  row">
                                                <div class="col-md-4 select-label">
                                                    <label for="" class="pt-2">走行距離</label>
                                                </div>
                                                <div class="col-md-8 select-box">
                                                    <input type="number" class="form-control" name="to_millege"/>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="templating-select row">
                                                <div class="col-md-4 select-label">
                                                    <label for="" class="pt-2 select-label-mark">~</label>
                                                </div>
                                                <div class="col-md-8 select-box">
                                                    <input type="number" class="form-control" name="from_millege"/>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="col-md-4"></div>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="read-more detail-search">
                                <input class="btn btn-warning" type="submit" value="もっと見る" />
                            </div>
                        </form>
                    </div>
                    <!-- latest car info -->
                    <div class="category row">
                        <div class="category-title">
                            <i class="fa fa-search"></i>
                            <h3>最新情報！</h3>
                        </div>

                        <div class="carlist-page row">
                            @include('frontend.pages.sale.carlist')
                        </div>
                        <!-- <div class="read-more">
                            <a href="#" class="btn btn-primary" type="submit">もっと見る</a>
                        </div> -->
                        
                        
                    </div>
                </div>
            </div>
    </div> <!-- content -->
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
    <script src="{{ URL::asset('/assets/frontend/pages/search/index.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/home/index.js') }}"></script>
    @endsection
@endsection
