@extends('frontend.layouts.index')

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/datatables/datatables.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
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
        <div class="container-fluid home-content">
                <div class="row">
                    <div class="car-list">
                        <div class="category row">
                            <div class="category-title">
                                <i class="fas fa-building"></i>
                                <h3>会員店舗紹介</h3>
                            </div>
                            <div class="table-responsive">
                            <table id="datatable" class="table align-middle table-nowrap">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($company_infos as $key=>$company_info)
                                            <tr>
                                                <td>
                                                    @if($company_info->path)
                                                        <a href="{!! route('companyIntroduce.details', ['id' => $company_info->cd_id ? $company_info->cd_id:'#']) !!}"><img class="" src="{{$company_info->path}}" alt="" width="100"></a>
                                                    @else
                                                        <a href="{!! route('companyIntroduce.details', ['id' => $company_info->cd_id ? $company_info->cd_id:'#']) !!}"><img class="" src="{{URL::asset('images/photo.png')}}" alt="" width="100"></a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <p class="company-name">{{$company_info->company_name}}</p>
                                                    <span class="company-location-label">所在地：</span>
                                                    <p class="company-location-name">{{$company_info->location}}</p>
                                                </td>
                                                <td>
                                                    @if($company_info->phone)
                                                        <a href="tel:{{$company_info->phone}}" class="btn btn-danger" data-nsfw-filter-status="swf">電話： {{$company_info->phone}}</a>
                                                    @endif
                                                    <a href="{!! route('companyIntroduce.details', ['id' => $company_info->cd_id ? $company_info->cd_id:'#']) !!}" class="btn btn-outline-danger" data-nsfw-filter-status="swf">店舗詳細情報 <i class="fas fa-angle-right"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    <script src="{{ URL::asset('/assets/libs/datatables/datatables.min.js') }}"></script>
    <!-- Datatable init js -->
    <script src="{{ URL::asset('/assets/js/pages/datatables.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/company/index.js') }}"></script>
    @endsection
@endsection
