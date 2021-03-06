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
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/company/style.css') }}">
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
                        <p>フリーワードで検索する</p>
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
        <div class="container-fluid home-content">
                <div class="row">
                    <div class="car-list">
                        <div class="category row">
                            <div class="category-title">
                                <h3>キヌウラ貿易株式会社(ここに会社名が入ります)</h3>
                            </div>
                            <div class="table-responsive">
                            <table id="datatable" class="table align-middle table-nowrap">
                                    <tbody>
                                       <tr>
                                           <th class="text-nowrap">会社名</th>
                                           <td>
                                               {{$company_infos->company_name}}
                                           </td>
                                       </tr>
                                       <tr>
                                           <th class="text-nowrap">担当者</th>
                                           <td>
                                               {{$company_infos->member}}
                                           </td>
                                       </tr>
                                       <tr>
                                           <th class="text-nowrap">所在地</th>
                                           <td>
                                               {{$company_infos->location}}
                                           </td>
                                       </tr>
                                       <tr>
                                           <th class="text-nowrap">電話番号</th>
                                           <td>
                                               <a href="tel:$company_infos->phone" class="btn btn-danger">電話： {{$company_infos->phone}}</a>
                                           </td>
                                       </tr>
                                       <tr>
                                           <th class="text-nowrap">E-mail</th>
                                           <td>
                                               <a href="mailto: {{$company_infos->email}}">{{$company_infos->email}}</a>
                                           </td>
                                       </tr>
                                       <tr>
                                           <th class="text-nowrap">ホームページ</th>
                                           <td>
                                               <a href="{{$company_infos->site_url}}">{{$company_infos->site_url}}</a>
                                           </td>
                                       </tr>
                                       <tr>
                                           <th class="text-nowrap">会社概要</th>
                                           <td>
                                               {!! $company_infos->description !!}
                                           </td>
                                       </tr>
                                       <tr>
                                           <th class="text-nowrap">会社写真</th>
                                           <td>
                                               @if($company_infos->company_name)
                                                 <img class="img-thumbnail" src="{{$company_infos->path}}" alt="" width="100">
                                               @endif
                                           </td>
                                       </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- latest car info -->
                        <div class="category">
                            <div class="category-title">
                                <i class="fa fa-search"></i>
                                <h3>在庫車両</h3>
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
                                @include('frontend.pages.company.carlist')
                            </div>
                            <!-- <div class="read-more">
                                <a href="#" class="btn btn-primary" type="submit">もっと見る</a>
                            </div> -->
                            
                            
                        </div>
                    </div>
                </div>
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
    <script src="{{ URL::asset('/assets/frontend/pages/company/index.js') }}"></script>
    @endsection
@endsection
