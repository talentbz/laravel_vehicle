@extends('frontend.layouts.index')

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/membership/style.css') }}">
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
                    <p>フフリーワードで検索する</p>
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
    <!-- <div class="banner-adver">
        <div class="container">
            <div class="row mt-5 mb-5 adver-top">
                <h1>掲載店募集<i class="fas fa-angle-double-right"></i></h1>
                <p>中古トラック、ダンプなどをトラッカージャパンに掲載しませんか？</p>
            </div>
            <div class="row">
                <div class="wrecker-service">
                    <h1>レッカーサービス</h1>
                    <a href="#">
                        <img src="{{asset('/images/frontend/home/icon/wrecker.png')}}" alt="">
                        <span>全国対応・迅速・格安・安全</span>
                    </a>
                    
                </div>
                <div class="painting-service">
                    <h1>板金塗装サービス</h1>
                    <a href="#">
                        <img src="{{asset('/images/frontend/home/icon/painting.png')}}" alt="">
                        <span>迅速・格安・丁寧・安心</span>
                    </a>
                </div>
            </div>
        </div>
    </div> -->
    <!-- car list per category -->
    <div class="container-fluid home-content">
            <div class="row">
                <div class="car-list">
                    <div class="category row">
                        <div class="category-title">
                            <i class="fas fa-cash-register"></i>
                            <h3>まずは会員登録から</h3>
                        </div>

                        <div class="membership">
                            <div class="container">
                                <div class="row">
                                    <div class="membership-wrapper">
                                        <h1>運送会社様</h1>
                                        <a href="{{route('membership.dealer')}}">
                                            <h3>詳細はこちら</h3>
                                            <span>運送会社の方のは無料でご利用いただけます。</span>
                                        </a>
                                        
                                    </div>
                                    <div class="membership-wrapper">
                                        <h1>販売店様</h1>
                                        <a href="{{route('membership.shipping')}}">
                                            <h3>詳細はこちら</h3>
                                            <span>中古車販売店、ディーラーの方のご利用には月会費が必要となります(11,000円/月)</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
    </div> <!-- content -->
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pagination/jquery.twbsPagination.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/homepage/index.js') }}"></script>
    @endsection
@endsection
