@extends('frontend.layouts.index')

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/membership/dealer.css') }}">
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
    </div>


    <div class="category row">
        <div class="category-title">
            <i class="fa fa-search"></i>
            <h3>掲載申込みフォーム　運送会社様用<span>※掲載は無料です</span></h3>
        </div>
        <!-- contact form -->
        <div class="container pt-5" >

            <!-- Alert User -->
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="custom-validation" method="post" action="{{ route('contact.save') }}" enctype="multipart/form-data">
                            @csrf
                            <h5>トラッカージャパンへの掲載お申し込みはこちらのフォームからお願いいたします。</h5>
                            <h3 class="mt-5"> 【基本情報】<h6>※掲載は無料です</h6></h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    </thead> 
                                    <tbody>
                                        <!-- checkbox -->
                                        <tr>
                                            <td class="table-light" scope="row">事業形態<span>※</span></td>
                                            <td >
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="organ_name" id="exampleRadios1"  checked>
                                                    <label class="form-check-label" for="exampleRadios1">
                                                        法人
                                                    </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="personal_name" id="exampleRadios2">
                                                    <label class="form-check-label" for="exampleRadios2">
                                                        個人
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- register name -->
                                        <tr>
                                            <td class="table-light" scope="row">法人名/個人名<span>※</span></td>
                                            <td >
                                                <input type="text" class="form-control" required  name="register_name" />
                                            </td>
                                        </tr>
                                        <!-- Furigana name -->
                                        <tr>
                                            <td class="table-light" scope="row">法人名/個人名ふりがな<span>※</span></td>
                                            <td >
                                                <input type="text" class="form-control" required  name="register_furigana" />   
                                            </td>
                                        </tr>
                                        <!-- agency name -->
                                        <tr>
                                            <td class="table-light" scope="row">代表者名<span>※</td>
                                            <td ><input type="text" class="form-control" required  name="agency_name" /></td>
                                        </tr>
                                        <!-- agency firagana -->
                                        <tr>
                                            <td class="table-light" scope="row">代表者名ふりがな<span>※</span></td>
                                            <td >
                                                <input type="text" class="form-control" required  name="agency_firagana" />
                                            </td>
                                        </tr>
                                        <!-- person name -->
                                        <tr>
                                            <td class="table-light" scope="row">担当者名</td>
                                            <td >
                                                <input type="text" class="form-control"  name="person_name" />
                                            </td>
                                        </tr>
                                        <!-- person firagana name -->
                                        <tr>
                                            <td class="table-light" scope="row">担当者名ふりがな</td>
                                            <td ><input type="text" class="form-control" name="person_firagana" /></td>
                                        </tr>
                                        <!-- address -->
                                        <tr>
                                            <td class="table-light" scope="row">住所<span>※</span></td>
                                            <td >
                                                <div class="postal-code">
                                                    <label for="">〒</label>
                                                    <input type="text" class="form-control" data-parsley-length="[7,7]">
                                                </div>
                                                <div class="address">
                                                    <select class="select2 form-control" name="state">
                                                        @foreach($areas as $area)
                                                            <option value='{{$area}}'>{{$area}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="address">
                                                    <input type="text" class="form-control" required  name="city" placeholder="市区郡・地名・番地等" />
                                                </div>
                                                <div class="address">
                                                    <input type="text" class="form-control" required  name="apartment" placeholder="建物、マンション名・部屋番号等"/>
                                                </div>
                                            </td>
                                        </tr>
                                        <!-- telephone -->
                                        <tr>
                                            <td class="table-light" scope="row">電話番号<span>※</span></td>
                                            <td >
                                                <input data-parsley-type="number" type="text" class="form-control" required name="phone"/>
                                            </td>
                                        </tr>
                                        <!-- fax -->
                                        <tr>
                                            <td class="table-light" scope="row">FAX番号<span>※</span></td>
                                            <td >
                                                <input data-parsley-type="number" type="text" class="form-control" name="fax"/>
                                            </td>
                                        </tr>
                                        <!-- email -->
                                        <tr>
                                            <td class="table-light" scope="row">E-mail<span>※</span></td>
                                            <td >
                                                <input parsley-type="email" type="text" class="form-control"  name="email"/>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <h3 class="mt-3">【会社情報】</h3>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead></thead>
                                    <tbody>
                                        <tr>
                                            <td class="table-light" scope="row">URL</td>
                                            <td><input parsley-type="url" type="url" class="form-control" name="site_url"></td>
                                        </tr>
                                        <tr>
                                            <td class="table-light" scope="row">営業時間</td>
                                            <td>
                                                <div class="start-time">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" data-provide="timepicker" name="start_time">
                                                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                                    </div>
                                                </div>
                                                <div class="end-time">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" data-provide="timepicker" name="end_time">
                                                        <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="table-light" scope="row">定休日</td>
                                            <td><input type="text" class="form-control" placeholder="土日祝"  name="weekend_date" /></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="form-post mt-3">
                                <input type="submit" name="send" value="確認画面" class="btn btn-outline-danger">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/homepage/index.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/parsleyjs/parsleyjs.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/bootstrap-timepicker/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/form-validation.init.js') }}"></script>
    @endsection
@endsection