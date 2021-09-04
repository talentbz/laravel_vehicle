@extends('frontend.layouts.index')

@section('css')
    <link href="{{ URL::asset('/assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/libs/pagination/pagination.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/bulletin/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/assets/frontend/pages/homepage/style.css') }}">
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
    <div class="container-fluid home-content">
            <div class="row">
                <div class="car-list">
                    <div class="category row">
                        <div class="category-title">
                            <i class="fas fa-sticky-note"></i>
                            <h3>掲示板情報</h3>
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
        </div>
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pagination/pagination.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/search/index.js') }}"></script>
    @endsection
@endsection
