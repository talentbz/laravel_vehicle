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
                    <!-- category search -->
                    @include('frontend.pages.home.category')
                    
                    <!-- detail search -->
                    @include('frontend.pages.home.search')
                    
                    <!-- latest car info -->
                    <div class="category row">
                        <div class="category-title">
                            <i class="fas fa-truck-moving"></i>
                            <h3>最新情報！</h3>
                        </div>
                            
                        <div class="carlist-page row">
                            @include('frontend.pages.home.carlist')
                        </div>
                        <!-- <div class="read-more">
                            <a href="#" class="btn btn-primary" type="submit">もっと見る</a>
                        </div> -->
                    </div>
                    
                    <!-- bulletin board -->
                    @include('frontend.pages.home.bulletin')
                </div>

            </div>
    </div> <!-- content -->
    @section('script')
    <script src="{{ URL::asset('/assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/pagination/jquery.twbsPagination.js') }}"></script>
    <script src="{{ URL::asset('/assets/frontend/pages/homepage/index.js') }}"></script>
    @endsection
@endsection
